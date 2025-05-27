<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Member;
use App\Models\AbmEvent;
use App\Models\PaymentReceipt;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('*', function ($view) {
            $recentMembers = Member::with('login')
                ->latest()
                ->take(5)
                ->get()
                ->map(function($member) {
                    return [
                        'type' => 'registration',
                        'date' => Carbon::parse($member->created_at),
                        'details' => "New member registration: {$member->member_name}",
                        'status' => $member->login->acc_status ?? 'pending'
                    ];
                });
            
            $recentEvents = AbmEvent::latest()
                ->take(5)
                ->get()
                ->map(function($event) {
                    return [
                        'type' => 'event',
                        'date' => Carbon::parse($event->created_at),
                        'details' => "New event created: {$event->event_name}",
                        'status' => $event->event_status
                    ];
                });
            
            $recentPayments = PaymentReceipt::with('member')
                ->latest()
                ->take(5)
                ->get()
                ->map(function($payment) {
                    return [
                        'type' => 'payment',
                        'date' => Carbon::parse($payment->payment_date),
                        'details' => "Payment received: RM{$payment->payment_fee} from {$payment->member->member_name}",
                        'status' => $payment->payment_status
                    ];
                });

            $recentActivities = $recentMembers->concat($recentEvents)
                ->concat($recentPayments)
                ->sortByDesc('date')
                ->take(10)
                ->values();

            $view->with('recentActivities', $recentActivities);
        });
    }
} 