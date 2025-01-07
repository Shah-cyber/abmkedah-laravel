<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\AbmEvent;
use App\Models\AllocatedMerit;
use App\Models\Application;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total Members
        $totalMembers = Member::count();
        $activeMembers = Member::whereHas('login', function($query) {
            $query->where('acc_status', 'active');
        })->count();

        // Events Statistics
        $totalEvents = AbmEvent::count();
        $upcomingEvents = AbmEvent::where('event_date', '>', now())
            ->where('event_status', 'running')
            ->count();
        
        // Event Status Counts for Pie Chart
        $ongoingEvents = AbmEvent::where('event_status', 'running')->count();
        $draftEvents = AbmEvent::where('event_status', 'draft')->count();
        $endedEvents = AbmEvent::where('event_status', 'ended')->count();

        // Merit Statistics
        $totalMeritsAwarded = AllocatedMerit::sum('merit_point');
        $topMembers = Member::select('member.*')
            ->leftJoin('allocated_merit', 'member.member_id', '=', 'allocated_merit.member_id')
            ->selectRaw('SUM(allocated_merit.merit_point) as total_merit')
            ->groupBy(
                'member.member_id',
                'member.name',
                'member.member_status',
                'member.phone_number',
                'member.ic_number',
                'member.application_id'
            )
            ->orderByRaw('SUM(allocated_merit.merit_point) DESC')
            ->take(5)
            ->get();

        // Monthly Events Data
        $monthlyData = AbmEvent::selectRaw('DATE_FORMAT(event_date, "%Y-%m") as month, COUNT(*) as count')
            ->whereDate('event_date', '>=', now()->subMonths(6))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthlyLabels = $monthlyData->pluck('month')->map(function($month) {
            return Carbon::createFromFormat('Y-m', $month)->format('M Y');
        });

        $monthlyEventCounts = $monthlyData->pluck('count');

        // Pending Applications
        $pendingApplications = Application::where('applicant_status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalMembers',
            'activeMembers',
            'totalEvents',
            'upcomingEvents',
            'ongoingEvents',
            'draftEvents',    // Added this
            'endedEvents',    // Added this
            'totalMeritsAwarded',
            'topMembers',
            'pendingApplications',
            'monthlyLabels',
            'monthlyEventCounts'
        ));

        // System Health Monitoring
        $systemHealth = [
            'database_size' => $this->getDatabaseSize(),
            'total_members' => $this->getTotalRecords('member'),
            'total_events' => $this->getTotalRecords('abmevent'),
            'storage_usage' => $this->getStorageUsage(),
            'last_backup' => $this->getLastBackupDate(),
            'system_status' => $this->getSystemStatus(),
        ];

        return view('admin.dashboard', compact(
            // ... your existing variables ...
            'systemHealth'
        ));
    }

    
}