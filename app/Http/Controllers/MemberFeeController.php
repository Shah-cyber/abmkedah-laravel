<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use App\Models\Joinevent;
use App\Models\AbmEvent;
use App\Models\Application;
use App\Models\PaymentReceipt;
use App\Models\PaymentAllocation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class MemberFeeController extends Controller
{
    public function index()
    {
        $currentYear = date('Y');
        $payments = collect();

        $loginId = Auth::id();
        $member = Member::where('login_id', $loginId)->first();

        if (!$member) {
            return view('member.fee', [
                'payments' => new LengthAwarePaginator([], 0, 10),
                'incompletePayments' => 0
            ]);
        }

        // Membership Fee
        $membershipFee = PaymentAllocation::where('payment_type', 'one_time_fee')->first();

        if ($membershipFee) {
            if ($member->registration_status == 1) {
                $paymentReceipt = PaymentReceipt::where('member_id', $member->member_id)
                    ->where('payment_allocation_id', $membershipFee->payment_allocation_id)
                    ->orderByDesc('created_at')
                    ->first();

                if ($paymentReceipt) {
                    $payments->push([
                        'payment_name' => $paymentReceipt->payment_name ?? $membershipFee->payment_name,
                        'total_fee' => $paymentReceipt->payment_fee ?? $membershipFee->amount,
                        'payment_date' => $paymentReceipt->payment_date,
                        'status' => $paymentReceipt->payment_status,
                        'receipt_id' =>  $paymentReceipt->payment_receipt_id,
                        'is_current_year' => true,
                        'payment_allocation_id' => $membershipFee->payment_allocation_id,
                        'member_id' => $member->member_id,
                        'payment_type' => 'membership'
                    ]);
                } else {
                    $payments->push([
                        'payment_name' => $membershipFee->payment_name,
                        'total_fee' => $membershipFee->amount,
                        'payment_date' => null,
                        'status' => 'Pending',
                        'receipt_id' => null,
                        'is_current_year' => true,
                        'payment_allocation_id' => $membershipFee->payment_allocation_id,
                        'member_id' => $member->member_id,
                        'payment_type' => 'membership'
                    ]);
                }
            } else {
                $payments->push([
                    'payment_name' => $membershipFee->payment_name ?? 'Registration & Annual Fee',
                    'total_fee' => $membershipFee->amount,
                    'payment_date' => null,
                    'status' => 'Pending',
                    'receipt_id' => null,
                    'is_current_year' => true,
                    'payment_allocation_id' => $membershipFee->payment_allocation_id,
                    'member_id' => $member->member_id,
                    'payment_type' => 'membership'
                ]);
            }
        }

        $joinedEvents = Joinevent::where('member_id', $member->member_id)
            ->with('event')
            ->get();

        foreach ($joinedEvents as $joinEvent) {
            $event = $joinEvent->event;

            if (!$event || $event->event_price <= 0) {
                continue; // skip free events
            }

            // Get receipts for this member & this event
            $receipts = PaymentReceipt::where('member_id', $member->member_id)
                ->where('event_id', $event->event_id)
                ->whereIn('payment_status', ['completed', 'Reject', 'Pending'])
                ->orderByRaw("FIELD(payment_status, 'completed', 'Reject', 'Pending')") // prioritize 'completed'
                ->orderByDesc('created_at')
                ->get();

            $receipt = $receipts->first();

            if ($receipt) {
                $payments->push([
                    'payment_name' => $event->event_name,
                    'total_fee' => $receipt->payment_fee,
                    'payment_date' => $receipt->payment_date,
                    'status' => strtolower($receipt->payment_status),
                    'receipt_id' => $receipt->payment_receipt_id,
                    'is_current_year' => ($event->event_session == $currentYear),
                    'event_id' => $event->event_id
                ]);
            }
        }

        // Unpaid Events (no receipt + paid events only)
        $unpaidEvents = Joinevent::where('joinevent.member_id', $member->member_id)
            ->whereDoesntHave('eventPaymentReceipt', function ($query) use ($member) {
                $query->where('member_id', $member->member_id)
                      ->whereIn('payment_status', ['Pending', 'Reject', 'completed']);
            })
            ->join('abmevent', 'joinevent.event_id', '=', 'abmevent.event_id')
            ->where('abmevent.event_price', '>', 0)
            ->with('event')
            ->get(['joinevent.*']);

        // Log unpaid events to laravel.log
        Log::info('Unpaid Events:', ['unpaid_events' => $unpaidEvents->toArray()]);

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

        // 1. Get all event_ids that this member has joined
        $joinedEventIds = Joinevent::where('member_id', $member->member_id)->pluck('event_id');

        // 2. Get orphaned receipts (not from membership, not in joined events)
        $orphanedEventReceipts = PaymentReceipt::where('member_id', $member->member_id)
            ->whereNull('payment_allocation_id')
            ->whereNotIn('event_id', $joinedEventIds)
            ->whereIn('payment_status', ['Reject', 'Pending', 'completed'])
            ->get();

        // 3. Push into the $payments array
        foreach ($orphanedEventReceipts as $receipt) {
            $event = AbmEvent::find($receipt->event_id); // use your event model

            if ($event) {
                $payments->push([
                    'payment_name' => $event->event_name,
                    'total_fee' => $receipt->payment_fee,
                    'payment_date' => $receipt->payment_date,
                    'status' => strtolower($receipt->payment_status),
                    'receipt_id' => $receipt->payment_receipt_id,
                    'is_current_year' => ($event->event_session == $currentYear),
                    'event_id' => $event->event_id
                ]);
            }
        }

        // Sort & Paginate
        $payments = $payments->sortBy([
            ['is_current_year', 'desc'],
            ['payment_date', 'desc']
        ]);

        $incompletePayments = $payments->whereIn('status', ['Pending', 'Reject'])->count();

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