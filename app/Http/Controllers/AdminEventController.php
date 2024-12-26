<?php

namespace App\Http\Controllers;

use App\Models\AbmEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEventController extends Controller
{
    public function index()
    {
        
            // Paginate events with 10 records per page
            $events = AbmEvent::paginate(10);
    
            // Pass the paginated events to the Blade template
            return view('admin.event-list', compact('events'));
        
    }
}
