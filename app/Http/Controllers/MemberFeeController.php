<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use App\Models\Joinevent;
use App\Models\Application;
use App\Models\PaymentReceipt;
use App\Models\PaymentAllocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class MemberFeeController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $payments = collect();

        // Get current logged in user's login_id
        $loginId = Auth::id();

        // Find the member associated with this login_id
        $member = Member::where('login_id', $loginId)->first();

        // If no member or member already paid (registration_status != 0), don't show anything
        if (!$member || $member->registration_status != 0) {
            return view('member.fee', [
                'payments' => new LengthAwarePaginator([], 0, 10),
                'incompletePayments' => 0
            ]);
        }

        // 1. Get ALL membership fee allocations (registration, annual, one-time)
        $allMembershipFees = PaymentAllocation::whereIn('payment_type', ['registration_fee', 'annual_fee', 'one_time_fee'])
            ->orderBy('session', 'desc')
            ->get();




foreach ($allMembershipFees as $fee) {
        // Check if the member has already paid this fee
        $hasPaid = PaymentReceipt::where('member_id', $member->member_id)
            ->where('payment_allocation_id', $fee->payment_allocation_id)
            ->exists();



        if ($hasPaid) {
            // If payment is made, push receipt information
            $receipt = PaymentReceipt::where('member_id', $member->member_id)
                ->where('payment_allocation_id', $fee->payment_allocation_id)
                ->first();

            $payments->push([
                'payment_name' => $fee->payment_allocation_name,
                'total_fee' => $fee->amount,
                'payment_date' => $receipt->payment_date,
                'status' => $receipt->payment_status,
                'receipt_id' => $receipt->payment_receipt_id,
                'is_current_year' => true,
                'payment_allocation_id' => $fee->payment_allocation_id,
                'member_id' => $member->member_id,
                'payment_type' => $fee->payment_type
            ]);
        } else {
            // If payment has not been made, mark as Pending
            $payments->push([
                'payment_name' => $fee->payment_allocation_name,
                'total_fee' => $fee->amount,
                'payment_date' => null,
                'status' => 'Pending',
                'receipt_id' => null,
                'is_current_year' => true,
                'payment_allocation_id' => $fee->payment_allocation_id,
                'member_id' => $member->member_id,
                'payment_type' => $fee->payment_type
            ]);
        }

}






        // 2. Event payments (only if member is found)
        $eventPayments = Joinevent::where('member_id', $member->member_id)
            ->whereHas('paymentReceipt', function ($query) {
                $query->whereIn('payment_status', ['Pending', 'Reject', 'completed']);
            })
            ->with(['event', 'paymentReceipt'])
            ->get();

        foreach ($eventPayments as $joinEvent) {
            if ($joinEvent->event && $joinEvent->paymentReceipt) {
                $payments->push([
                    'payment_name' => $joinEvent->event->event_name,
                    'total_fee' => $joinEvent->paymentReceipt->payment_fee,
                    'payment_date' => $joinEvent->paymentReceipt->payment_date,
                    'status' => $joinEvent->paymentReceipt->payment_status,
                    'receipt_id' => $joinEvent->paymentReceipt->payment_receipt_id,
                    'is_current_year' => ($joinEvent->event->event_session == $currentYear),
                    'event_id' => $joinEvent->event_id
                ]);
            }
        }

        // 3. Unpaid events
        $unpaidEvents = Joinevent::where('member_id', $member->member_id)
            ->whereDoesntHave('paymentReceipt')
            ->with('event')
            ->get();

        foreach ($unpaidEvents as $joinEvent) {
            if ($joinEvent->event) {
                $payments->push([
                    'payment_name' => $joinEvent->event->event_name,
                    'total_fee' => $joinEvent->event->event_price,
                    'payment_date' => null,
                    'status' => 'Pending',
                    'receipt_id' => null,
                    'is_current_year' => ($joinEvent->event->event_session == $currentYear),
                    'event_id' => $joinEvent->event_id
                ]);
            }
        }

        // Sort payments
        $payments = $payments->sortBy([
            ['is_current_year', 'desc'],
            ['payment_date', 'desc']
        ]);



        // Count incomplete payments
        $incompletePayments = $payments->whereIn('status', ['Pending', 'Reject'])->count();

        // Paginate
        $currentPage = request()->get('page', 1);
        $perPage = 10;
        $paginatedPayments = new LengthAwarePaginator(
            $payments->forPage($currentPage, $perPage),
            $payments->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );





        return view('member.fee', [
            'payments' => $paginatedPayments,
            'incompletePayments' => $incompletePayments
        ]);
    }
}
