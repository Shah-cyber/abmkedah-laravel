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

        // Fetch payment history
        $paymentHistory = PaymentReceipt::where('member_id', $memberDetails->member_id)->get();
        $totalPayments = $paymentHistory->sum('payment_fee');

        // Get the current month's start and end dates
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Initialize arrays for all weeks of the current month
        $weeks = [];
        $currentDate = $startOfMonth->copy();
        while ($currentDate <= $endOfMonth) {
            $weekNumber = $currentDate->weekOfMonth;
            $weeks[$weekNumber] = 0;
            $currentDate->addDay();
        }

        // Fetch total participation data by week
        $totalParticipationData = Joinevent::selectRaw('WEEK(created_at) as week, COUNT(*) as count')
            ->where('member_id', $memberDetails->member_id)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('week')
            ->get()
            ->mapWithKeys(function ($item) use ($startOfMonth) {
                $weekNumber = Carbon::parse($startOfMonth)->setISODate(now()->year, $item->week)->weekOfMonth;
                return [$weekNumber => $item->count];
            })
            ->toArray();

        // Merge with initialized weeks
        $totalParticipationData = array_replace($weeks, $totalParticipationData);
        ksort($totalParticipationData);

        // Fetch merit points data by week
        $meritPointsData = AllocatedMerit::selectRaw('WEEK(created_at) as week, SUM(merit_point) as total_merit')
            ->where('member_id', $memberDetails->member_id)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('week')
            ->get()
            ->mapWithKeys(function ($item) use ($startOfMonth) {
                $weekNumber = Carbon::parse($startOfMonth)->setISODate(now()->year, $item->week)->weekOfMonth;
                return [$weekNumber => $item->total_merit];
            })
            ->toArray();

        // Merge with initialized weeks
        $meritPointsData = array_replace($weeks, $meritPointsData);
        ksort($meritPointsData);

        // Get week labels
        $weekLabels = array_map(function($weekNum) {
            return 'Week ' . $weekNum;
        }, array_keys($weeks));

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
            'weekLabels',
            'paymentHistory',
            'totalPayments'
        ));
    }
}
