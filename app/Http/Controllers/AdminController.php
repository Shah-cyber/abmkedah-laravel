<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Login;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    // Show the form to create a new admin
    public function showCreateAdminForm()
    {
        $applications = Application::where('applicant_status', 'pending')->get(); // Retrieve pending applications
        return view('admin.create_admin', compact('applications')); // Pass applications to the view
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:login,email', // Ensure unique email
            'password' => 'required|min:6', // Password must be at least 6 characters
            'role' => 'required|string', // Role must be provided
            'application_id' => 'required|exists:application,application_id', // Ensure the application_id exists
        ]);

        // Create a new login record
        $login = Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
            'admin_id' => null, // Set admin_id to null
            'member_id' => null, // Set member_id to null
            'acc_status' => 'active', // Set account status to active
        ]);

        // Create a new admin record and link it to the login record
        $admin = Admin::create([
            'role' => $request->role,
            'login_id' => $login->login_id, // Link to the newly created login record
        ]);

        // Update the login record to store the application_id
        $login->application_id = $request->application_id; // Set the application_id from the request
        $login->save();

        return redirect()->route('admin.dashboard')->with('success', 'New admin created successfully.');
    }

    
}
