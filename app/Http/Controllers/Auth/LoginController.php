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
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;



class LoginController extends Controller
{
    // The AuthenticatesUsers trait is not defined, so we will remove it.

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
                'acc_status' => 'pending',
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

    // Login the login with remember me functionality
    $remember = $request->has('remember') && $request->remember == 'on';
    Auth::login($login, $remember);

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


public function showLoginForm()
{
    return redirect()->route('non-member.home');
}

public function showForgotPasswordForm()
{
    return view('auth.forgot-password');
}

public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:login,email',
    ]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => now()
    ]);

    // Record the reset request in history
    DB::table('password_reset_history')->insert([
        'email' => $request->email,
        'reset_token' => $token,
        'requested_at' => now(),
        'completed_at' => null,
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
        'success' => false,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    try {
        // Include the email in the reset link
        $resetLink = route('password.reset', [
            'token' => $token,
            'email' => $request->email
        ]);

        Mail::send('emails.forgot-password', ['token' => $token, 'resetLink' => $resetLink], function($message) use($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Password reset link has been sent to your email.'
        ]);
    } catch (\Exception $e) {
        Log::error('Password Reset Email Error: ' . $e->getMessage());
        return response()->json([
            'status' => 'error',
            'message' => 'Could not send reset password link. Please try again later.'
        ], 500);
    }
}

public function showResetPasswordForm($token)
{
    return view('auth.reset-password', ['token' => $token]);
}

public function resetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:login,email',
        'password' => 'required|min:6|confirmed',
        'token' => 'required'
    ]);

    $updatePassword = DB::table('password_resets')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

    if (!$updatePassword) {
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid token!'
        ], 400);
    }

    $user = Login::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    // Update password reset history
    DB::table('password_reset_history')
        ->where('reset_token', $request->token)
        ->update([
            'completed_at' => now(),
            'success' => true,
            'updated_at' => now()
        ]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Your password has been changed!'
    ]);
}
    
    
}