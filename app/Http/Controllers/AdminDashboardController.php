<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\AbmEvent;
use App\Models\AllocatedMerit;
use App\Models\Application;
use App\Models\PaymentReceipt;
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
        $totalRevenue = PaymentReceipt::where('payment_status', 'completed')->sum('payment_fee');

        // Get payment statistics for chart
        $paymentData = PaymentReceipt::selectRaw('
            SUM(CASE WHEN payment_status = "completed" THEN payment_fee ELSE 0 END) as completed,
            SUM(CASE WHEN payment_status = "pending" THEN payment_fee ELSE 0 END) as pending
        ')->first();

        // Add these to your index method
        $selectedYear = request()->get('year') ?? date('Y');
        $months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        // Modify the monthly revenue query
        $monthlyRevenue = PaymentReceipt::selectRaw('
            YEAR(payment_date) as year,
            MONTH(payment_date) as month_num,
            DATE_FORMAT(payment_date, "%M") as month_name,
            SUM(payment_fee) as total
        ')
        ->where('payment_status', 'completed')
        ->when($selectedYear, function($query) use ($selectedYear) {
            $query->whereYear('payment_date', $selectedYear);
        })
        ->groupBy('year', 'month_num', 'month_name')
        ->orderBy('year')
        ->orderBy('month_num')
        ->get();

        // Get available years for filter
        $availableYears = PaymentReceipt::selectRaw('YEAR(payment_date) as year')
            ->groupBy('year')
            ->orderBy('year', 'DESC')
            ->pluck('year');

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
            'draftEvents',
            'endedEvents',
            'totalRevenue',
            'paymentData',
            'monthlyRevenue',
            'pendingApplications',
            'monthlyLabels',
            'monthlyEventCounts',
            'availableYears',
            'selectedYear',
            'months'
        ));

        // System Health Monitoring
        // $systemHealth = [
        //     'database_size' => $this->getDatabaseSize(),
        //     'total_members' => $this->getTotalRecords('member'),
        //     'total_events' => $this->getTotalRecords('abmevent'),
        //     'storage_usage' => $this->getStorageUsage(),
        //     'last_backup' => $this->getLastBackupDate(),
        //     'system_status' => $this->getSystemStatus(),
        // ];

        // return view('admin.dashboard', compact(
        //     // ... your existing variables ...
        //     'systemHealth'
        // ));
    }

    
}