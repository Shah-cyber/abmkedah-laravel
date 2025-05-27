<?php

namespace App\Http\Controllers;

use App\Models\AbmEvent;
use App\Models\Joinevent;
use App\Models\Merit;
use App\Models\AllocatedMerit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class MemberEventController extends Controller
{
    // public function index()
    // {
    //     $memberId = auth()->user()->member_id;
    //     $currentDateTime = Carbon::now();
        
    //     $events = AbmEvent::whereDate('event_date', '>=', Carbon::today())
    //                      ->where('event_status', 'running')
    //                      ->where(function($query) use ($currentDateTime) {
    //                          $query->where('event_date', '>', $currentDateTime->format('Y-m-d'))
    //                                ->orWhere(function($q) use ($currentDateTime) {
    //                                    $q->whereDate('event_date', $currentDateTime->format('Y-m-d'))
    //                                      ->where('event_end_time', '>', $currentDateTime->format('H:i:s'));
    //                                });
    //                      })
    //                      ->whereNotExists(function($query) use ($memberId) {
    //                          $query->select(DB::raw(1))
    //                                ->from('joinevent')
    //                                ->whereRaw('joinevent.event_id = abmevent.event_id')
    //                                ->where(function($subquery) use ($memberId) {
    //                                    $subquery->where('joinevent.member_id', $memberId)
    //                                            ->orWhere('joinevent.has_attended', 1);
    //                                });
    //                      })
    //                      ->orderBy('event_date', 'asc')
    //                      ->paginate(8);
        
    //     return view('member.event-list', compact('events'));
    // }
   

    // public function registeredEvents()
    // {
    //     $user = auth()->user();
        
    //     if (!$user) {
    //         return redirect()->route('login')
    //             ->with('error', 'Please login to view registered events.');
    //     }

    //     $member = Member::where('login_id', $user->login_id)->first();
        
    //     if (!$member) {
    //         Log::error('Member not found for user', ['login_id' => $user->login_id]);
    //         return redirect()->route('member.dashboard')
    //             ->with('error', 'Member profile not found. Please contact support.');
    //     }

    //     $registeredEvents = Joinevent::with(['event' => function($query) {
    //             $query->orderBy('event_date', 'asc');
    //         }])
    //         ->where('member_id', $member->member_id)
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(8);

    //     return view('member.event-registered-list', compact('registeredEvents'));
    // }

    // public function show($id)
    // {
    //     $event = AbmEvent::findOrFail($id);
    //     $user = Auth::user();
    //     $member = Member::where('login_id', $user->login_id)->first();

    //     // Check if the user is registered for the event
    //     $isRegistered = Joinevent::where('event_id', $id)
    //                              ->where('member_id', $member->member_id)
    //                              ->exists();

    //     // Pass the event and registration status to the view
    //     return view('member.event-registration', compact('event', 'isRegistered'));
    // }

    public function index(Request $request)
    {
        $today = Carbon::today();
        $search = $request->input('search');

        $eventsQuery = AbmEvent::whereDate('event_date', '>=', $today)
                         ->where('event_status', 'running');
        
        // Apply search filter if search term is provided
        if ($search) {
            $eventsQuery->where(function($query) use ($search) {
                $query->where('event_name', 'like', "%{$search}%")
                      ->orWhere('event_category', 'like', "%{$search}%")
                      ->orWhere('event_location', 'like', "%{$search}%")
                      ->orWhere('event_description', 'like', "%{$search}%");
            });
        }
        
        $events = $eventsQuery->orderBy('event_date', 'asc')
                         ->paginate(8);
                         
        return view('member.event-list', compact('events', 'search'));
    }

    public function show($id)
    {
        $event = AbmEvent::findOrFail($id);
        $user = Auth::user();
        $member = Member::where('login_id', $user->login_id)->first();

        // Check if the user is registered for the event
        $isRegistered = Joinevent::where('event_id', $id)
                                 ->where('member_id', $member->member_id)
                                 ->exists();

        // Pass the event and registration status to the view
        return view('member.event-registration', compact('event', 'isRegistered'));
    }



  


    public function showRegistration($id)
    {
        $event = AbmEvent::findOrFail($id);
        $user = Auth::user();
        $member = Member::where('login_id', $user->login_id)->first();
        // Check if the user is registered for the event
        $isRegistered = Joinevent::where('event_id', $id)
                                 ->where('member_id', $member->member_id)
                                 ->exists();

        // Pass the event and registration status to the view
        return view('member.event-registration', compact('event', 'isRegistered'));
    }

    
public function showAttendance()
{
    $memberId = Auth::user()->member_id;

    $attendanceEvents = DB::table('joinevent as je')
        ->join('abmevent as e', 'je.event_id', '=', 'e.event_id')
        ->select(
            'e.event_name',
            'e.event_id',
            'e.event_date',
            'e.event_start_time',
            'e.event_end_time',
            'je.join_event_id',
            'je.has_attended',
            'e.event_status as status'
        )
        ->where('je.member_id', $memberId)
        ->orderByDesc('e.event_date')
        ->get();

    return view('member.attendance-event', compact('attendanceEvents'));
}

public function submitAttendance(Request $request): \Illuminate\Http\JsonResponse
{
    $request->validate([
        'join_event_id' => 'required|exists:joinevent,join_event_id',
        'confirm_attendance' => 'required'
    ]);

    try {
        DB::beginTransaction();

        $joinEvent = JoinEvent::findOrFail($request->join_event_id);

        // Update attendance
        $joinEvent->has_attended = 1;
        $joinEvent->save();

        // Check for related merit
        $merit = Merit::where('event_id', $joinEvent->event_id)->first();

        if ($merit) {
            AllocatedMerit::create([
                'admin_id' => null,
                'member_id' => $joinEvent->member_id,
                'event_id' => $joinEvent->event_id,
                'merit_id' => $merit->merit_id,
                'merit_point' => $merit->merit_point,
                'allocation_date' => Carbon::now()
            ]);
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Attendance submitted successfully.',
            'redirect_url' => route('member.attendance') // pass back the route here
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error in submitAttendance: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Failed to submit attendance. Please try again later.'
        ], 500);
    }
}


   
}
