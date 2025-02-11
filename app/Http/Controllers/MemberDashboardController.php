<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Login;
use App\Models\Member;
use App\Models\AbmEvent;
use App\Models\Joinevent;
use Illuminate\Http\Request;
use App\Models\AllocatedMerit;
use App\Models\PaymentReceipt;
use App\Models\PaymentAllocation;

class MemberDashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated login user
        $login = auth()->user();

        // Ensure the user is authenticated
        if (!$login) {
            return redirect()->route('login')->with('error', 'You must be logged in to access the dashboard.');
        }

        // Fetch the associated member details
        $memberDetails = $login->member;

        // If no member details found, handle it gracefully
        if (!$memberDetails) {
            return redirect()->route('home')->with('error', 'Member details not found.');
        }

        // Fetch upcoming and past events
        $upcomingEvents = AbmEvent::where('event_date', '>', now())->get();
        $pastEvents = AbmEvent::where('event_date', '<=', now())->get();

        // Fetch events the member has joined
        $joinedEvents = Joinevent::where('member_id', $memberDetails->member_id)->with('event')->get();

        // Fetch event statistics
        $totalMembers = Member::count();
        $activeMembers = Member::whereHas('login', function ($query) {
            $query->where('acc_status', 'active');
        })->count();
        $totalEvents = AbmEvent::count();
        $ongoingEvents = AbmEvent::where('event_status', 'running')->count();
        $draftEvents = AbmEvent::where('event_status', 'draft')->count();
        $endedEvents = AbmEvent::where('event_status', 'ended')->count();

        // ========== Event Participation Data ========== //

        // Fetch payment history
        $paymentHistory = PaymentReceipt::where('member_id', $memberDetails->member_id)->get();
        $totalPayments = $paymentHistory->sum('amount'); // Assuming 'amount' is a field in the payment_receipt table

       // Fetch total participation data grouped by week of the month
    $totalParticipationData = Joinevent::selectRaw('WEEK(created_at, 1) - WEEK(DATE_SUB(created_at, INTERVAL DAYOFMONTH(created_at)-1 DAY), 1) + 1 as week, COUNT(DISTINCT event_id) as count')
    ->where('member_id', $memberDetails->member_id)
    ->groupBy('week')
    ->orderBy('week')
    ->get();

     // Fetch merit points data grouped by week of the month
     $meritPointsData = AllocatedMerit::selectRaw('WEEK(created_at, 1) - WEEK(DATE_SUB(created_at, INTERVAL DAYOFMONTH(created_at)-1 DAY), 1) + 1 as week, SUM(merit_point) as total_merit')
     ->where('member_id', $memberDetails->member_id)
     ->whereMonth('created_at', now()->month) // Filter for the current month
     ->groupBy('week')
     ->orderBy('week')
     ->get();
      

// Pass the updated data to the view
    return view('member.dashboard', compact(
    'memberDetails',
    'upcomingEvents',
    'pastEvents',
    'joinedEvents',
    'totalMembers',
    'activeMembers',
    'totalEvents',
    'ongoingEvents',
    'draftEvents',
    'endedEvents',
    'totalParticipationData',
        'meritPointsData',
    //'totalMeritsAwarded',
   // 'topMembers',
    'paymentHistory',
    'totalPayments',
    // 'predefinedMonthlyLabels', // ✅ Use predefined labels to avoid format errors
    // 'monthlyMeritPoints',
    // 'predefinedDailyLabels',
    // 'dailyDataset',
    // 'predefinedWeeklyLabels',
    // 'weeklyDataset',
    // 'predefinedMonthlyLabels',
    // 'monthlyDataset'
    ));

    }
}
