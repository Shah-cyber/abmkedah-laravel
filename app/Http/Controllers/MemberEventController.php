<?php

namespace App\Http\Controllers;

use App\Models\AbmEvent;
use App\Models\Joinevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MemberEventController extends Controller
{
    public function index()
    {
        $events = AbmEvent::where('event_date', '>=', now())
                         ->where('event_status', 'running')
                         ->orderBy('event_date', 'asc')
                         ->paginate(8);
        
        return view('member.event-list', compact('events'));
    }

    public function show($id)
    {
        $event = AbmEvent::findOrFail($id);
        return view('member.event-registration', compact('event'));
    }

    public function showRegistration($id)
    {
        $event = AbmEvent::findOrFail($id);
        return view('member.event-registration', compact('event'));
    }

    public function register(Request $request, $id)
    {
        try {
            // Add validation with detailed error messages
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'ic_number' => 'required|string|max:20',
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

            $event = AbmEvent::findOrFail($id);
            $member = auth()->user()->member;

            // Check if there are available slots
            if ($event->total_participation <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, this event is fully booked.'
                ], 422);
            }

            // Check if member already registered
            $existingRegistration = Joinevent::where([
                'event_id' => $id,
                'member_id' => $member->member_id
            ])->first();

            if ($existingRegistration) {
                return response()->json([
                    'success' => false,
                    'message' => 'You have already registered for this event.'
                ]);
            }

            // Create new registration
            Joinevent::create([
                'event_id' => $id,
                'member_id' => $member->member_id,
                'registration_date' => now()
            ]);

            // Reduce the total participation by 1
            $event->decrement('total_participation');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Successfully registered for the event!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your registration.',
                'debug' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}
