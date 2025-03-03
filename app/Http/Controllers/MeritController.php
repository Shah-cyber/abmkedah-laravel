<?php

namespace App\Http\Controllers; 

use App\Models\Admin;
use App\Models\Merit;
use App\Models\AbmEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeritController extends Controller
{
    public function index()
    {
        // Retrieve all merit records with related events and admins, paginated
        $merits = Merit::with('event', 'admin')->paginate(10); // 10 records per page
        return view('admin.merit-list', compact('merits'));
    }
 
     // Show form for creating a new merit
     public function create()
     {
         // Retrieve all events that do not have any associated merit points
         $events = AbmEvent::whereDoesntHave('merits')->get(); // Adjust the relationship name if necessary
         $admins = Admin::all(); // Retrieve all admins for the dropdown
         return view('admin.merit-add', compact('events', 'admins'));
     }
 
     // Store a newly created merit in storage
     public function store(Request $request)
     {
         // Validate the request
         $request->validate([
             'event_id' => 'required|exists:abmevent,event_id',
             'merit_point' => 'required|numeric|min:0',
             'admin_id' => 'required|exists:admin,admin_id', // Assuming you have admin_id in the form
         ]);
 
         // Create the merit record with the current date as allocation_date
         Merit::create([
             'event_id' => $request->event_id,
             'merit_point' => $request->merit_point,
             'admin_id' => $request->admin_id,
             'allocation_date' => now(), // Automatically set to the current date and time
         ]);
  
         return redirect()->route('merit.list')->with('success', 'Merit added successfully!');
     }
 
     // Show form for editing a merit
        public function edit($id)
        {
            $merit = Merit::findOrFail($id);
            $events = AbmEvent::all(); // Retrieve all events for the dropdown
            $admins = Admin::with('login')->get(); // Eager load the login relationship to get usernames

            return view('admin.merit-update', compact('merit', 'events', 'admins'));
        }
 
        public function update(Request $request, $id)
        {
            // Attempt to find the merit record
            $merit = Merit::find($id);
        
            // Check if the merit record exists
            if (!$merit) {
                return redirect()->route('merit.list')->with('error', 'Merit record not found.');
            }
        
            // Check if the logged-in admin is the one assigned to this merit
            if (auth()->user()->admin_id !== $merit->admin_id) {
                return redirect()->route('merit.list')->with('error', 'You are not authorized to update this merit.');
            }
        
            // Validate the request
            $request->validate([
                'event_id' => 'required|exists:abmevent,event_id',
                'merit_point' => 'required|numeric|min:0',
                'admin_id' => 'required|exists:admin,admin_id',
            ]);
        
            // Update the merit record
            $merit->update($request->only(['event_id', 'merit_point', 'admin_id']));
        
            return redirect()->route('merit.list')->with('success', 'Merit updated successfully!');
        }
     
    // Delete a merit
     public function destroy($id)
    {
        $merit = Merit::findOrFail($id);
        $merit->delete();

        return redirect()->route('merit.list')->with('success', 'Merit deleted successfully!');
    }

}
