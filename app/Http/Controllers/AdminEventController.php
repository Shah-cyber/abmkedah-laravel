<?php

namespace App\Http\Controllers;

use App\Models\Merit;
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
            try {
                // Attempt to delete the event
                $event = AbmEvent::findOrFail($id);
                $event->delete();

                return response()->json(['success' => true, 'message' => 'Event deleted successfully!']);
            } catch (\Illuminate\Database\QueryException $e) {
                // Check if the error is due to foreign key constraint
                if ($e->getCode() == 23000) {
                    return response()->json(['success' => false, 'message' => 'Must delete the merit points first before deleting the event.'], 400);
                }
                return response()->json(['success' => false, 'message' => 'An error occurred while deleting the event.'], 500);
            }
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

        //allocate merit point to member that join the event.
        public function allocateMerit(Request $request)
        {
            try {
                // Validate request
                $request->validate([
                    'event_id' => 'required|exists:abmevent,event_id',
                    'member_ids' => 'required|array',
                    'member_ids.*' => 'exists:member,member_id'
                ]);

                // Retrieve event
                $eventId = $request->event_id;
                $event = AbmEvent::findOrFail($eventId);

                // Get the merit points for this event from the merit table
                $merit = Merit::where('event_id', $eventId)->first();
                if (!$merit) {
                    throw new \Exception('No merit points defined for this event');
                }

                // Keep track of successful allocations
                $allocatedCount = 0;

                // Allocate merit points to each selected member
                foreach ($request->member_ids as $memberId) {
                    // Check if merit was already allocated
                    $existingAllocation = AllocatedMerit::where([
                        'member_id' => $memberId,
                        'event_id' => $eventId
                    ])->first();

                    if (!$existingAllocation) {
                        AllocatedMerit::create([
                            'admin_id' => auth()->id(),
                            'member_id' => $memberId,
                            'event_id' => $eventId,
                            'merit_id' => $merit->merit_id,
                            'merit_point' => $merit->merit_point,
                            'allocation_date' => now(),
                        ]);
                        $allocatedCount++;
                    }
                }

                if ($allocatedCount === 0) {
                    throw new \Exception('No members were allocated merit points. They might already have merit points allocated.');
                }

                return response()->json([
                    'success' => true,
                    'message' => "Merit points ({$merit->merit_point} points) allocated successfully to {$allocatedCount} member(s)."
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $e->errors()
                ], 422);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage(),
                    'code' => $e->getCode() // Include error code for better debugging
                ], 500);
            }
        }


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
        
        public function search(Request $request)
        {
            $search = $request->query('search'); // Get the search term from the query string

            $events = AbmEvent::where('event_name', 'like', '%' . $search . '%')
                            ->paginate(4); // Paginate the results

            return view('admin.event-list-table', compact('events')); // Return a partial view with the search results
        }
        
        


        

        
}
