<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use App\Models\Application;
use App\Models\AbmEvent;
use App\Models\Joinevent;
use App\Models\AllocatedMerit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class AdminMemberRecordController extends Controller
{
    public function index()
    {
        $members = Member::with(['login', 'application'])
            ->select('member.*')
            ->join('login', 'member.login_id', '=', 'login.login_id')
            ->paginate(10);

        return view('admin.member-record-list', compact('members'));
    }

    public function view($id)
    {
        $member = Member::with(['login', 'application'])
            ->where('member.member_id', $id)
            ->firstOrFail();

        return view('admin.member-record-view', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::with(['login', 'application'])
            ->where('member.member_id', $id)
            ->firstOrFail();

        return view('admin.member-record-update', compact('member'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'full-name' => 'required|string|max:255',
            'ic-number' => 'required|string|max:20',
            'age' => 'required|integer',
            'race' => 'required|string|max:50',
            'religion' => 'required|string|max:50',
            'gender' => 'required|string|max:20',
            'phone-number' => 'required|string|max:20',
            'birth-place' => 'required|string|max:255',
            'birth-date' => 'required|date',
            'address' => 'required|string',
            'user-status' => 'required|string',
            'proof-file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $member = Member::findOrFail($id);
            
            // Update member information
            $member->name = $request->input('full-name');
            $member->ic_number = $request->input('ic-number');
            $member->age = $request->input('age');
            $member->race = $request->input('race');
            $member->religion = $request->input('religion');
            $member->gender = $request->input('gender');
            $member->phone_number = $request->input('phone-number');
            $member->birthplace = $request->input('birth-place');
            $member->birthdate = $request->input('birth-date');
            $member->address = $request->input('address');
            $member->member_status = $request->input('user-status');

            // Handle file upload if provided
            if ($request->hasFile('proof-file')) {
                // Get the application record
                $application = Application::where('login_id', $member->login_id)->first();
                
                if ($application) {
                    // Delete old file if exists
                    if ($application->prove_letter) {
                        Storage::disk('public')->delete($application->prove_letter);
                    }
                    
                    // Store new file
                    $filePath = $request->file('proof-file')->store('proof_letters', 'public');
                    $application->prove_letter = $filePath;
                    $application->save();
                }
            }

            $member->save();

            return redirect()->route('admin.member.record.index')
                ->with('success', 'Member information updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating member information: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $member = Member::findOrFail($id);
            // Start a database transaction
            DB::beginTransaction();

            // Get related records
            $login = $member->login;
            $application = $member->application;

            // 1. First, update login table to remove foreign key references
            if ($login) {
                $login->update([
                    'member_id' => null,
                    'application_id' => null
                ]);
            }

            // 2. Delete member record
            $member->delete();

            // 3. Delete application and its file
            if ($application) {
                if ($application->prove_letter) {
                    Storage::disk('public')->delete($application->prove_letter);
                }
                $application->delete();
            }

            // 4. Finally delete login
            if ($login) {
                $login->delete();
            }

            // Commit the transaction
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Member deleted successfully!'
            ]);

        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error deleting member: ' . $e->getMessage()
            ], 500);
        }
    }

    public function report($id)
{
    // Get member information
    $member = Member::findOrFail($id);

    // Get available sessions (years)
    $sessions = AbmEvent::select(DB::raw('YEAR(event_session) as year'))
        ->distinct()
        ->orderBy('year', 'desc')
        ->pluck('year');

    // Get member's achievements
    $achievements = DB::table('joinevent')
    ->join('abmevent', 'joinevent.event_id', '=', 'abmevent.event_id')
    ->leftJoin('allocated_merit', function($join) use ($id) {
        $join->on('joinevent.event_id', '=', 'allocated_merit.event_id')
            ->where('allocated_merit.member_id', '=', $id);
    })
    ->where('joinevent.member_id', $id)
    ->select(
        'abmevent.event_name',
        'allocated_merit.merit_point'
    )
    ->paginate(10);

    return view('admin.member-record-report', compact('member', 'sessions', 'achievements'));
}

public function getMeritBySession(Request $request, $id)
{
    $year = $request->session;
    
    $totalMerit = AllocatedMerit::join('abmevent', 'allocated_merit.event_id', '=', 'abmevent.event_id')
        ->where('allocated_merit.member_id', $id)
        ->whereYear('abmevent.event_session', $year)
        ->sum('allocated_merit.merit_point');

    return response()->json([
        'success' => true,
        'total_merit' => number_format($totalMerit, 2)
    ]);
}
}
