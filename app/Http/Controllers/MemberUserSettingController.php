<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Login;

class MemberUserSettingController extends Controller
{
    public function show()
    {
        $member = auth()->user()->member; // Assuming the user is authenticated and has a member relationship
        return view('member.setting-personal-information', compact('member'));
    }

    public function update(Request $request)
    {
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
        $member->update($request->all());

        return response()->json(['success' => 'Member information updated successfully.']);
        
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
}
