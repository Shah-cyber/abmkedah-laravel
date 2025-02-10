<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Member;
use App\Models\Login;
use Illuminate\Support\Facades\DB;

class AdminUserSettingController extends Controller
{
    public function index()
    {
        // Get all admin users with their login details
        $adminUsers = Admin::join('login', function($join) {
            $join->on('admin.admin_id', '=', 'login.admin_id');
        })
        ->select('admin.admin_id', 
                'admin.role as user_role', 
                'login.username',
                'login.email',
                'login.acc_status',
                DB::raw("'admin' as user_type"))
        ->get();

        // Get all member users with their login details
        $memberUsers = Member::join('login', function($join) {
            $join->on('member.member_id', '=', 'login.member_id');
        })
        ->select('member.member_id',
                'member.member_status as user_role',
                'login.username',
                'login.email',
                'login.acc_status',
                DB::raw("'member' as user_type"))
        ->get();

        // Combine and sort all users
        $allUsers = $adminUsers->concat($memberUsers)
            ->sortBy('username')
            ->values();

        // Paginate the results
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $pagedData = $allUsers->forPage($currentPage, $perPage);
        
        $users = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $allUsers->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()]
        );

        return view('admin.setting-user-list', compact('users'));
    }

   

    

    public function edit($id)
    {
        try {
            // Find the user in login table
            $login = Login::where(function($query) use ($id) {
                $query->where('admin_id', $id)
                    ->orWhere('member_id', $id);
            })->first();
 
            if (!$login) {
                return redirect()->route('admin.setting.users')
                    ->with('error', 'User not found');
            }

            // Determine if user is admin or member
            $userType = $login->admin_id ? 'admin' : 'member';
            $userData = null;

            if ($userType === 'admin') {
                $userData = Admin::find($login->admin_id);
            } else {
                $userData = Member::find($login->member_id);
            }

            return view('admin.setting-user-update', compact('login', 'userData', 'userType'));
        } catch (\Exception $e) {
            return redirect()->route('admin.setting.users')
                ->with('error', 'Error loading user: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'nullable|min:6',
                'acc_status' => 'required|in:active,deactivate',
                'role' => 'required',
                'user_type' => 'required|in:admin,member'
            ]);

            // Update login table
            $login = Login::where(function($query) use ($id) {
                $query->where('admin_id', $id)
                    ->orWhere('member_id', $id);
            })->first();

            if (!$login) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found'
                ], 404);
            }

            $login->username = $validated['username'];
            $login->email = $validated['email'];
            if ($validated['password']) {
                $login->password = bcrypt($validated['password']);
            }
            $login->acc_status = $validated['acc_status'];
            $login->save();

            // Update role if user is admin
            if ($validated['user_type'] === 'admin') {
                $admin = Admin::find($id);
                if ($admin) {
                    $admin->role = $validated['role'];
                    $admin->save();
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating user: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add()
    {
        return view('admin.setting-user-add');
    }

    // Add admin
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'username' => 'required|string|max:255|unique:login,username',
                'email' => 'required|email|unique:login,email',
                'password' => 'required|min:6',
                'phone_number' => 'required|string|max:15',
                'select-status' => 'required|in:active,deactivate',
                'select-role' => 'required|in:super-admin,sub-admin',
            ]);

            // Get the currently logged-in admin
            $currentAdmin = auth()->user();

            // Check if the current admin is allowed to assign the requested role
            if ($currentAdmin->role === 'sub-admin' && $validated['select-role'] === 'super-admin') {
                return response()->json([
                    'success' => false,
                    'message' => 'Sub-admins cannot create super-admins.'
                ], 403);
            }

            // Start transaction
            DB::beginTransaction();

            try {
                // Create the admin record to get the admin_id
                $admin = new Admin();
                $admin->role = $validated['select-role'];
                $admin->phone_number = $validated['phone_number'];
                $admin->save();

                // Now create the login record with the admin_id
                $login = new Login();
                $login->username = $validated['username'];
                $login->email = $validated['email'];
                $login->password = bcrypt($validated['password']);
                $login->acc_status = $validated['select-status'];
                $login->admin_id = $admin->admin_id; // Use the admin_id from the newly created admin record
                $login->save();

                // If everything is successful, commit the transaction
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Admin added successfully!'
                ]);

            } catch (\Exception $e) {
                // If there's an error, rollback the transaction
                DB::rollBack();
                throw $e;
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding admin: ' . $e->getMessage()
            ], 500);
        }
    }

}
