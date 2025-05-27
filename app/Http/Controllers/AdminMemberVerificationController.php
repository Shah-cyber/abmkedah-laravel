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
use Illuminate\Support\Facades\Log;

class AdminMemberVerificationController extends Controller
{
    public function approve($applicationId)
    {
        DB::beginTransaction();
    
        try {
            Log::info('Starting approval process for application: ' . $applicationId);
            
            // Find the application
            $application = Application::findOrFail($applicationId);
            
            Log::info('Found application', ['status' => $application->applicant_status]);
    
            // Check if already approved
            if ($application->applicant_status === 'approve') {
                DB::rollBack();
                return response()->json(['message' => 'This application is already approved.'], 400);
            }
    
            // Update applicant status
            $application->applicant_status = 'approve';
            $application->save();
            
            Log::info('Updated application status to approve');
    
            // Create new member record
            $member = Member::create([
                'application_id' => $application->application_id,
                'name' => $application->login->username,
                'login_id' => $application->login_id,
            ]);
            
            Log::info('Created member record', ['member_id' => $member->member_id]);
    
            // Update login table with member_id
            $login = $application->login;
            $login->member_id = $member->member_id;
            $login->acc_status = 'active';
            $login->save();
            
            Log::info('Updated login record');
    
            // Dispatch the email job
            SendUserApprovedEmail::dispatch($login);
            
            Log::info('Dispatched approval email');
    
            DB::commit();
            
            Log::info('Approval process completed successfully');
    
            return response()->json([
                'message' => 'The user has been approved successfully.',
                'member_id' => $member->member_id,
            ]);
            
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in approval process', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'message' => 'An error occurred while approving the user.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    //reject
    /**
 * Reject a user application.
 */
    public function reject($applicationId)
    {
        try {
            Log::info('Starting rejection process for application: ' . $applicationId);
            
            // Find the application
            $application = Application::findOrFail($applicationId);

            Log::info('Found application', ['status' => $application->applicant_status]);

            // Check if already rejected
            if ($application->applicant_status === 'reject') {
                return response()->json(['message' => 'This application is already rejected.'], 400);
            }

            // Update the application status
            $application->applicant_status = 'reject';
            $application->save();
            
            Log::info('Updated application status to reject');

            return response()->json([
                'message' => 'The application has been rejected successfully.'
            ]);

        } catch (\Exception $e) {
            Log::error('Error in rejection process', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'message' => 'An error occurred while rejecting the application.',
                'error' => $e->getMessage()
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
