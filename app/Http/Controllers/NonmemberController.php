<?php

namespace App\Http\Controllers;

use App\Models\AbmEvent;
use App\Models\Joinevent;
use App\Models\Nonmember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NonmemberController extends Controller
{
    public function index()
    {
        $events = AbmEvent::where('event_date', '>=', now())
                         ->where('event_status', 'running')
                         ->orderBy('event_date', 'asc')
                         ->take(3)
                         ->get();
                         
        return view('non-member.home', compact('events'));
    }

    public function fetchEvents(Request $request)
    {
        $selectedMonth = $request->month ?? now()->month;
        $selectedYear = $request->year ?? now()->year;

        $events = AbmEvent::whereYear('event_date', $selectedYear)
                        ->whereMonth('event_date', $selectedMonth)
                        ->where('event_status', 'running')
                        ->orderBy('event_date', 'asc')
                        ->get()
                        ->map(function ($event) {
                            return [
                                'event_id' => $event->event_id,
                                'event_name' => $event->event_name,
                                'event_location' => $event->event_location,
                                'event_date' => $event->event_date,
                                'event_start_time' => $event->event_start_time ? \Carbon\Carbon::parse($event->event_start_time)->format('H:i:s') : null,
                            ];
                        });

        return response()->json(['events' => $events]);
    }



    public function showEventDetails($id)
    {
        $event = AbmEvent::findOrFail($id);
        return view('non-member.event-details', compact('event'));
    }

    // public function registerEvent(Request $request, $eventId)
    // {
    //     try {
    //         // Add validation with detailed error messages
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'ic_number' => 'required|string|max:20',
    //             'email' => 'required|email|max:255',
    //             'phone_number' => 'required|string|max:20',
    //         ]);

    //         if ($validator->fails()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Validation failed',
    //                 'errors' => $validator->errors()
    //             ], 422);
    //         }

    //         DB::beginTransaction();

    //         $event = AbmEvent::findOrFail($eventId);

    //         // Check if there are available slots
    //         if ($event->total_participation <= 0) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Sorry, this event is fully booked.'
    //             ], 422);
    //         }
            
    //         // Check for existing registration
    //         $existingRegistration = Joinevent::whereHas('nonmember', function($query) use ($request) {
    //             $query->where('ic_number', $request->ic_number);
    //         })->where('event_id', $eventId)->first();

    //         if ($existingRegistration) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'This IC number has already been registered for this event.'
    //             ], 422);
    //         }

    //         // Create or get nonmember
    //         $nonmember = Nonmember::firstOrCreate(
    //             ['ic_number' => $request->ic_number],
    //             [
    //                 'name' => $request->name,
    //                 'email' => $request->email,
    //                 'phone_number' => $request->phone_number,
    //             ]
    //         );

    //         // Reduce the total participation by 1
    //         $event->decrement('total_participation');

    //         // Check if event requires payment
    //         if ($event->event_price > 0) {
    //             $paymentResponse = $this->processPayment($event, $nonmember);
    //             DB::commit();
    //             return $paymentResponse;
    //         }

    //         // For free events
    //         $joinevent = Joinevent::create([
    //             'event_id' => $eventId,
    //             'nonmember_id' => $nonmember->nonmember_id,
    //             'registration_date' => now()
    //         ]);

    //         DB::commit();

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Registration successful!'
    //         ]);

    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         // Log the error for debugging
    //         // Log::error('Event registration error: ' . $e->getMessage());
    //         // Log::error($e->getTraceAsString());
            
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Registration failed. Please try again.',
    //             'debug' => config('app.debug') ? $e->getMessage() : null
    //         ], 500);
    //     }
    // }
    public function registerNonMember(Request $request, $eventId)
    {
        try {
            // Validate request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'ic_number' => 'required|string|max:20', // Removed unique constraint
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:20',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
    
            DB::beginTransaction();
    
            // Retrieve event details
            $event = AbmEvent::findOrFail($eventId);
    
            // Check if slots are available
            if ($event->total_participation <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, this event is fully booked.'
                ], 422);
            }
    
            // Check if the user is already registered for the event by email
            $existingRegistration = Joinevent::whereHas('nonmember', function ($query) use ($request) {
                $query->where('email', $request->email);
            })->where('event_id', $eventId)->first();
    
            if ($existingRegistration) {
                return response()->json([
                    'success' => false,
                    'message' => 'This email is already registered for this event.'
                ], 422);
            }
    
            // Store non-member details (create or update)
            $nonmember = Nonmember::updateOrCreate(
                ['ic_number' => $request->ic_number],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                ]
            );
    
            // Reduce available slots
            $event->decrement('total_participation');
    
            // Register the non-member for the event
            Joinevent::create([
                'event_id' => $eventId,
                'nonmember_id' => $nonmember->nonmember_id,
                'registration_date' => now()
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'Successfully registered for the event!'
            ]);
    
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Registration failed. Please try again.',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }


}
