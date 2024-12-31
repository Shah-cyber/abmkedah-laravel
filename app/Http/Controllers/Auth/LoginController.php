<?php
namespace App\Http\Controllers\Auth;

use App\Models\Admin;
use App\Models\Login;
use App\Models\Member;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
   

    public function showRegistrationForm()
    {
        return view('non-member.registration'); // Show the registration view
    }

   
    
    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|regex:/^[a-zA-Z0-9_]+$/',
        'email' => 'required|email|unique:login,email',
        'password' => 'required|min:6|confirmed',
        'prove_letter' => 'required|file|mimes:pdf|max:2048',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    DB::beginTransaction();

    try {
        // Save the file
        $filePath = $request->file('prove_letter')->store('prove_letter_files', 'public');

        // Create the login record
        $login = Login::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'acc_status' => 'active',
        ]);

        // Create the application record
        $application = Application::create([
            'prove_letter' => $filePath,
            'applicant_status' => 'pending',
            'date_application' => now(),
            'login_id' => $login->login_id,
        ]);

        // Link the application ID back to the login
        $login->application_id = $application->application_id;
        $login->save();

        DB::commit();

        return response()->json([
            'success' => 'Registration successful!',
            'message' => 'Your application is being processed. Once approved, you will be able to log in to your account.',
        ], 201);

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Registration Error: ' . $e->getMessage());
        return response()->json(['message' => 'An unexpected error occurred. Please try again later.'], 500);
    }
}
 

//login 
public function login(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Find the login record by email
    $login = Login::where('email', $request->email)->first();

    if (!$login || !password_verify($request->password, $login->password)) {
        return response()->json(['message' => 'Invalid email or password.', 'status' => 'error'], 401);
    }

    // Check if the account is active
    if ($login->acc_status !== 'active') {
        return response()->json(['message' => 'Your account is not active.', 'status' => 'error'], 403);
    }

    // Check the application status
    $application = $login->application;
    if (!$application || $application->applicant_status !== 'approve') {
        return response()->json(['message' => 'Your application is not approved yet.', 'status' => 'error'], 403);
    }

    // Login the login
    Auth::login($login);

    // Determine login type and redirect
    if ($login->admin_id) {
        return response()->json([
            'message' => 'Login successful! Redirecting to admin dashboard...',
            'redirect' => route('admin.dashboard'),
            'status' => 'success',
        ]);
    } elseif ($login->member_id) {
        return response()->json([
            'message' => 'Login successful! Redirecting to member dashboard...',
            'redirect' => route('member.dashboard'),
            'status' => 'success',
        ]);
    } else {
        return response()->json(['message' => 'User type not recognized.', 'status' => 'error'], 403);
    }
}


public function logout(Request $request)
{
    Auth::logout(); // Log the user out

    return redirect('/')->with('success', 'You have been logged out successfully.'); // Redirect to the home page with a success message
}



    
    
}