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

   
   


}
