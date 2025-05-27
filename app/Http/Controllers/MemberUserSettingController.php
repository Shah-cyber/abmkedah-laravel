<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MemberUserSettingController extends Controller
{
    public function show()
    {
        $member = auth()->user()->member; // Assuming the user is authenticated and has a member relationship
        return view('member.setting-personal-information', compact('member'));
    }

   
    public function update(Request $request)
    {
        // Log the incoming request data for debugging
        Log::info('Update request received:', $request->all());
    
        $request->validate([
            'full_name' => 'required|string|max:255',
            'IC_Number' => 'required|string|max:255',
            'age' => 'required|integer',
            'race' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'phone_num' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'Address' => 'required|string|max:255',
        ]);
    
        $member = auth()->user()->member; // Assuming the user is authenticated and has a member relationship
        
        // Check if the member object is retrieved correctly
        if (!$member) {
            Log::error('Member not found for user: ' . auth()->id());
            return response()->json(['error' => 'Member not found.'], 404);
        }
    
        // Attempt to update and check if it's successful
        $updateSuccess = $member->update([
            'name' => $request->full_name,
            'ic_number' => $request->IC_Number,
            'age' => $request->age,
            'race' => $request->race,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'phone_number' => $request->phone_num,
            'birthplace' => $request->birth_place,
            'birthdate' => $request->birth_date,
            'address' => $request->Address,
        ]);
    
        if ($updateSuccess) {
            Log::info('Member updated successfully for user ID: ' . auth()->id(), $member->toArray());
            return response()->json(['success' => 'Member information updated successfully.']);
        } else {
            Log::error('Member update failed for user ID: ' . auth()->id());
            return response()->json(['error' => 'Failed to update member information.'], 500);
        }
    }
    

    public function showAccountSettings()
    {
        $member = auth()->user()->member; // Get the authenticated member
        return view('member.setting-account', compact('member'));
    }

    public function updateAccountDetails(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6', // Password is optional for update
        ]);

        $member = auth()->user()->member; // Get the authenticated member
        $login = $member->login; // Get the associated login record

        // Update the login details
        $login->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $login->password, // Hash password if provided
        ]);

        return response()->json(['success' => 'Account details updated successfully.']);
    }

    public function deactivateAccount()
    {
        try {
            $member = auth()->user()->member;
            $login = $member->login;

            // Update account status to deactivate
            $login->update([
                'acc_status' => 'deactivate'
            ]);

            // Log out the user
            auth()->logout();

            return response()->json([
                'success' => true,
                'message' => 'Your account has been deactivated successfully.',
                'redirect' => route('login')
            ]);
        } catch (\Exception $e) {
            Log::error('Error deactivating account: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to deactivate account. Please try again.'
            ], 500);
        }
    }
}
