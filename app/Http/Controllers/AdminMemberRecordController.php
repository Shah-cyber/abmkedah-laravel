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
use Yajra\DataTables\Facades\DataTables;
use Laravolt\Avatar\Facade as Avatar;

class AdminMemberRecordController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            try {
                $members = Member::query()
                    ->select([
                        'member.member_id',
                        'member.name',
                        'member.member_status',
                        'login.email'
                    ])
                    ->leftJoin('login', 'member.login_id', '=', 'login.login_id')
                    ->where(function($query) {
                        $query->where('login.acc_status', 'active')
                              ->orWhereNull('login.acc_status');
                    });

                return DataTables::of($members)
                    ->addIndexColumn()
                    ->addColumn('name_with_avatar', function ($member) {
                        // Cache avatar for 24 hours with member's name as key
                        $avatarKey = 'avatar.' . md5($member->name);
                        $avatar = cache()->remember($avatarKey, 86400, function() use ($member) {
                            return Avatar::create($member->name)->toSvg();
                        });
                        
                        return '<div class="flex items-center space-x-3">' .
                               '<div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center">' . 
                               $avatar . 
                               '</div>' .
                               '<span>' . $member->name . '</span>' .
                               '</div>';
                    })
                    ->addColumn('email', function ($member) {
                        return $member->email ?? 'N/A';
                    })
                    ->addColumn('achievement', function ($member) {
                        return '<a href="' . route('admin.member.record.report', $member->member_id) . '" 
                                class="text-blue-500 hover:underline cursor-pointer">Report</a>';
                    })
                    ->addColumn('action', function ($member) {
                        return '<div class="action-buttons">' .
                               '<a href="' . route('admin.member.record.view', $member->member_id) . '" 
                                   class="action-button bg-green-500 hover:bg-green-600 text-white rounded-md">View</a>' .
                               '<a href="' . route('admin.member.record.edit', $member->member_id) . '" 
                                   class="action-button bg-gray-500 hover:bg-gray-600 text-white rounded-md">Update</a>' .
                               '<a onclick="deleteMember(' . $member->member_id . ')" 
                                   class="action-button bg-red-500 hover:bg-red-600 text-white rounded-md cursor-pointer">Delete</a>' .
                               '</div>';
                    })
                    ->rawColumns(['name_with_avatar', 'achievement', 'action'])
                    ->make(true);
            } catch (\Exception $e) {
                return response()->json([
                    'error' => true,
                    'message' => 'An error occurred while loading the member records: ' . $e->getMessage()
                ], 500);
            }
        }

        return view('admin.member-record-list');
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
            return DB::transaction(function() use ($request, $id) {
                $member = Member::with('application')->findOrFail($id);
            
            // Update member information
                $member->fill([
                    'name' => $request->input('full-name'),
                    'ic_number' => $request->input('ic-number'),
                    'age' => $request->input('age'),
                    'race' => $request->input('race'),
                    'religion' => $request->input('religion'),
                    'gender' => $request->input('gender'),
                    'phone_number' => $request->input('phone-number'),
                    'birthplace' => $request->input('birth-place'),
                    'birthdate' => $request->input('birth-date'),
                    'address' => $request->input('address'),
                    'member_status' => $request->input('user-status')
                ]);

            // Handle file upload if provided
                if ($request->hasFile('proof-file') && $member->application) {
                    $file = $request->file('proof-file');
                    $filePath = $file->storeAs(
                        'proof_letters', 
                        'proof_' . $member->member_id . '_' . time() . '.' . $file->extension(),
                        'public'
                    );
                    
                    // Delete old file if exists
                    if ($member->application->prove_letter) {
                        Storage::disk('public')->delete($member->application->prove_letter);
                    }
                    
                    $member->application->prove_letter = $filePath;
                    $member->application->save();
            }

            $member->save();

                // Clear avatar cache when name is updated
                cache()->forget('avatar.' . md5($member->getOriginal('name')));

                return redirect()
                    ->route('admin.member.record.index')
                ->with('success', 'Member information updated successfully!');
            });

        } catch (\Exception $e) {
            report($e); // Log the error
            return redirect()
                ->back()
                ->with('error', 'Error updating member information. Please try again.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $member = Member::with('login')->findOrFail($id);
            
            DB::transaction(function() use ($member) {
                if ($member->login) {
                    // Only update acc_status in login table
                    $member->login->update([
                        'acc_status' => 'deactivated'
                    ]);
                }
            });

            return response()->json([
                'success' => true,
                'message' => 'Member account deactivated successfully! Login preserved for reporting.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deactivating member: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk deactivate members
     */
    public function bulkDeactivate(Request $request)
    {
        try {
            $memberIds = $request->input('ids');
            if (empty($memberIds)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No members selected for deactivation.'
                ], 400);
            }

            DB::transaction(function() use ($memberIds) {
                $members = Member::with('login')
                    ->whereIn('member_id', $memberIds)
                    ->get();

                foreach ($members as $member) {
                    if ($member->login) {
                        $member->login->update([
                            'acc_status' => 'deactivated'
                        ]);
                    }
                }
            });

            return response()->json([
                'success' => true,
                'message' => count($memberIds) . ' members deactivated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deactivating members: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk destroy members
     */
    public function bulkDestroy(Request $request)
    {
        try {
            $memberIds = $request->input('ids');
            if (empty($memberIds)) {
                return response()->json([
                    'success' => false,
                    'message' => 'No members selected for deletion.'
                ], 400);
            }

            DB::transaction(function() use ($memberIds) {
                $members = Member::with('login')
                    ->whereIn('member_id', $memberIds)
                    ->get();

                foreach ($members as $member) {
                    if ($member->login) {
                        $member->login->delete();
                    }
                    $member->delete();
                }
            });

            return response()->json([
                'success' => true,
                'message' => count($memberIds) . ' members deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting members: ' . $e->getMessage()
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
