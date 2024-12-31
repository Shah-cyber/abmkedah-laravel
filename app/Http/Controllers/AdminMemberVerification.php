<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Application;
use App\Models\Login;
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminMemberVerification extends Controller
{
        /**
     * Approve a user and make them a member.
     */
    public function approve(Request $request, $applicationId)
    {
        DB::beginTransaction();

        try {
            // Find the application by ID
            $application = Application::findOrFail($applicationId);

            // Check if the application is already approved
            if ($application->applicant_status === 'approve') {
                return response()->json([
                    'message' => 'This application is already approved.'
                ], 400);
            }

            // Update the applicant_status to 'approve'
            $application->update([
                'applicant_status' => 'approve',
            ]);

            // Create a new member record
            $member = Member::create([
                'application_id' => $application->application_id,
                'name' => $application->login->username, // Example: use login's username
                'login_id' => $application->login_id,

                // Add other default fields or leave them null
            ]);

            // Update the member_id in the login table
            $login = $application->login;
            $login->update([
                'member_id' => $member->member_id,
            ]);

            DB::commit();

            return response()->json([
                'message' => 'The user has been approved and is now a member.',
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
        // Fetch data from login and application tables
        $applications = Application::with('login')
            ->select('application_id', 'login_id', 'applicant_status')
            ->get();

        return view('admin.member-verification-list', compact('applications'));
    }

    public function view($id)
    {
        // Fetch specific application details
        $application = Application::with('login')->findOrFail($id);

        return view('admin.member-verification-view', compact('application'));
    }




}
