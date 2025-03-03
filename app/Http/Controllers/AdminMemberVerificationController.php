<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Login;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendUserApprovedEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminMemberVerificationController extends Controller
{
    public function approve(Request $request, $applicationId)
    {
        DB::beginTransaction();
    
        try {
            // Find the application
            $application = Application::findOrFail($applicationId);
    
            // Check if already approved
            if ($application->applicant_status === 'approve') {
                return response()->json(['message' => 'This application is already approved.'], 400);
            }
    
            // Update applicant status
            $application->update(['applicant_status' => 'approve']); 
    
            // Create new member record
            $member = Member::create([
                'application_id' => $application->application_id,
                'name' => $application->login->username,
                'login_id' => $application->login_id,
            ]);
    
            // Update login table with member_id
            $login = $application->login;
            $login->update(['member_id' => $member->member_id]);
    
            // Dispatch the email job
            SendUserApprovedEmail::dispatch($login);
    
            DB::commit();
    
            // Return response immediately after approval
            return response()->json([
                'message' => 'The user has been approved. An email notification will be sent shortly.',
                'member_id' => $member->member_id,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'An error occurred while approving the user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //reject
    /**
 * Reject a user application.
 */
    public function reject(Request $request, $applicationId)
    {
        try {
            // Find the application by ID
            $application = Application::findOrFail($applicationId);

            // Check if the application is already rejected
            if ($application->applicant_status === 'reject') {
                return response()->json([
                    'message' => 'This application is already rejected.'
                ], 400);
            }

            // Update the applicant_status to 'reject'
            $application->update([
                'applicant_status' => 'reject',
            ]);

            return response()->json([
                'message' => 'The application has been rejected.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while rejecting the application.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        // Fetch data from login and application tables with pagination, ordered by latest first
        $applications = Application::with('login')
            ->select('application_id', 'login_id', 'applicant_status')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.member-verification-list', compact('applications'));
    }


    public function view($id)
    {
        // Fetch specific application details
        $application = Application::with('login')->findOrFail($id);

        return view('admin.member-verification-view', compact('application'));
    }


}
