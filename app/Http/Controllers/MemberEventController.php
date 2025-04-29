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

   
}
