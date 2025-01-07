<?php

namespace App\Http\Controllers;

use App\Models\AbmEvent;
use App\Models\Joinevent;
use Illuminate\Http\Request;
use App\Models\AllocatedMerit;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
        //retrive data from db 
        public function index()
        {
            
                // Paginate events with 10 records per page
                $events = AbmEvent::paginate(4);
        
                // Pass the paginated events to the Blade template
                return view('admin.event-list', compact('events'));
            
        }

        //function to insert event data
        public function store(Request $request)
        {
            // Validate the request
            $request->validate([
                'event-name' => 'required|string|max:255',
                'description' => 'required|string',
                'event-banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'total-participant' => 'required|integer',
                'category' => 'required|string',
                'event-status' => 'required|string',
                'event-session' => 'required|string',
                'location' => 'required|string',
                'start-time' => 'required',
                'end-time' => 'required',
                'event-date' => 'required|date',
                'amount' => 'required|numeric',
            ]);

            // Handle file upload
            $bannerPath = null;
            if ($request->hasFile('event-banner')) {
                // Store the file in the 'event_banner' directory
                $bannerPath = $request->file('event-banner')->store('event_banner', 'public');
            }

            // Create a new event
            AbmEvent::create([
                'event_name' => $request->input('event-name'),
                'banner' => $bannerPath, // Store the path in the database
                'event_description' => $request->input('description'),
                'total_participation' => $request->input('total-participant'),
                'event_category' => $request->input('category'),
                'event_status' => $request->input('event-status'),
                'event_date' => $request->input('event-date'),
                'event_session' => $request->input('event-session'),
                'event_start_time' => $request->input('start-time'),
                'event_end_time' => $request->input('end-time'),
                'event_location' => $request->input('location'),
                'event_price' => $request->input('amount'),
            ]);

            // Return success message with SweetAlert2
            return redirect()->route('event.record.index')->with('success', 'Event added successfully!');
        }

        public function edit($id)
        {
            $event = AbmEvent::findOrFail($id);
            return view('admin.event-update', compact('event'));
        }

        public function update(Request $request, $id)
        {
            // Validate the request
            $request->validate([
                'event-name' => 'required|string|max:255',
                'description' => 'required|string',
                'event-banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'total-participant' => 'required|integer',
                'category' => 'required|string',
                'event-status' => 'required|string',
                'event-session' => 'required|string',
                'location' => 'required|string',
                'start-time' => 'required',
                'end-time' => 'required',
                'event-date' => 'required|date',
                'amount' => 'required|numeric',
            ]);

            // Find the event
            $event = AbmEvent::findOrFail($id);

            // Track if any changes are made
            $changesMade = false;

            // Handle file upload for event-banner
            if ($request->hasFile('event-banner')) {
                // Delete the old banner if it exists
                if ($event->banner) {
                    Storage::disk('public')->delete($event->banner);
                }

                // Store the new banner
                $bannerPath = $request->file('event-banner')->store('event_banner', 'public');
                $event->banner = $bannerPath;
                $changesMade = true; // Mark that a change was made
            }

            // Update the event fields if they have changed
            $fields = [
                'event_name' => 'event-name',
                'event_description' => 'description',
                'total_participation' => 'total-participant',
                'event_category' => 'category',
                'event_status' => 'event-status',
                'event_date' => 'event-date',
                'event_session' => 'event-session',
                'event_start_time' => 'start-time',
                'event_end_time' => 'end-time',
                'event_location' => 'location',
                'event_price' => 'amount',
            ];

            foreach ($fields as $dbField => $formField) {
                $newValue = $request->input($formField);
                if ($event->$dbField != $newValue) { // Check if the value has changed
                    $event->$dbField = $newValue;
                    $changesMade = true; // Mark that a change was made
                }
            }

            // Save the event only if changes were made
            if ($changesMade) {
                $event->save();
                return redirect()->route('event.record.index')->with('success', 'Event updated successfully!');
            }

            // If no changes were made, redirect with a neutral message
            return redirect()->route('event.record.index')->with('info', 'No changes were made to the event.');
        }


        //delete event
        public function destroy($id)
        {
            $event = AbmEvent::findOrFail($id);
            $event->delete();

            return redirect()->route('event.record.index')->with('success', 'Event deleted successfully!');
        }

        public function report($eventId)
        {
            // Retrieve the event details
            $event = AbmEvent::findOrFail($eventId);
        
            // Retrieve participants who joined the event, including their details
            $participants = Joinevent::with(['member', 'nonmember']) // Load both relationships
                ->where('event_id', $eventId)
                ->get();
        
            // Count the number of participants
            $totalParticipants = $participants->count();
        
            return view('admin.event-report', compact('event', 'participants', 'totalParticipants'));
        }

        // public function allocateMerit(Request $request)
        // {
        //     $request->validate([
        //         'selected_ids' => 'required|array', // Expecting an array of selected IDs
        //         'selected_ids.*' => 'exists:member,member_id', // Validate each selected ID
        //     ]);
        
        //     foreach ($request->selected_ids as $id) { 
        //         AllocatedMerit::create([
        //             'member_id' => $id, // Assuming you are allocating merit to members
        //             'event_id' => $request->event_id, // Pass the event ID if needed
        //             'admin_id' => auth()->user()->id, // Assuming the admin is logged in
        //             'merit_point' => 1.00, // Set the merit point as needed
        //             'allocation_date' => now(), // Set the allocation date to now
        //         ]);
        //     }
        
        //     return redirect()->route('event.record.index')->with('success', 'Merit allocated successfully!');
        // }


        public function showParticipants()
        {
            // Retrieve all participants who are members, including their event and member details
            $participants = Joinevent::with(['member', 'member.login', 'event'])
                ->whereNotNull('member_id') // Ensure only members are retrieved
                ->paginate(10); // Paginate with 10 records per page
        
            // Count the number of participants
            $totalParticipants = Joinevent::whereNotNull('member_id')->count();
        
            // Pass the participants and total count to the view
            return view('admin.event-volunteer', compact('participants', 'totalParticipants'));
        }
        
        
        
        


        

        
}
