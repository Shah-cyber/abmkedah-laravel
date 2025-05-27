<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Member;
use App\Models\AbmEvent;
use App\Models\Joinevent;
use App\Models\Nonmember;
use Illuminate\Http\Request;
use App\Models\PaymentReceipt;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ToyyibpayController extends Controller
{



    public function payMembershipFee(Request $request)
    {
        $user = Auth::user();
        $member = Member::where('login_id', $user->login_id)->first();
        $login = Login::where('login_id', $user->login_id)->first();

        if (!$member) {
            Log::error("ToyyibPay Error: Member not found for user {$user->login_id}");
            return back()->with('error', 'Member not found.');
        }

        $paymentAllocationId = $request->payment_allocation_id;
        $paymentName = $request->payment_name; // Get payment name from the form
        $paymentFee = $request->input('total_fee'); // Use total_fee from the form
        $amount = $paymentFee * 100;           // Convert to cents for ToyyibPay API
        $billDescription = 'Membership Fee Payment for Registration and Annual Fee';
        $billTo = $member->name;  // Get the member's name
        $billEmail = $login->email ?? 'noemail@example.com';
        $billPhone = $member->phone_number ?? "999999"; // Replace with actual if available

        $externalRefNo = 'MEMBER-' . $member->member_id . '-' . time();
        $callbackUrl = url('/toyyibpay/callback');
        $returnUrl = route('toyyibpay.return');



        session([
            'payment_name' => $paymentName,
            'payment_fee' => $paymentFee,
            'payment_allocation_id' => $paymentAllocationId
        ]);

        // Change to the sandbox URL for testing
        $response = Http::asForm()->post('https://dev.toyyibpay.com/index.php/api/createBill', [
            'userSecretKey' => 'm5vgntk0-zrvy-gqk3-xu7a-f8kmlu6m2u1v',
            'categoryCode' => '6ubtvgza',
            'billName' => $paymentName,   // Use payment_name from the form
            'billDescription' => $billDescription,
            'billPriceSetting' => 1,
            'billPayorInfo' => 1,
            'billAmount' => $amount, // In cents
            'billReturnUrl' => $returnUrl,
            'billCallbackUrl' => $callbackUrl,
            'billExternalReferenceNo' => $externalRefNo,
            'billTo' => $billTo,  // Now correctly populated with the member's name
            'billEmail' => $billEmail,
            'billPhone' => $billPhone,
            'billPaymentChannel' => 0,
        ]);

        // Log the status code and response body for full insight
        Log::info("ToyyibPay API Response Status: " . $response->status());
        Log::info("ToyyibPay API Response Body: " . $response->body());

        $result = $response->json();

        if ($response->successful()) {
            if (isset($result[0]['BillCode'])) {
                $billCode = $result[0]['BillCode'];
                return redirect("https://dev.toyyibpay.com/{$billCode}"); // Redirect to sandbox URL
            }
        }

        // Log the error if the bill creation failed
        Log::error("ToyyibPay Error: Failed to create bill. Response: " . json_encode($result));
        return back()->with('error', 'Failed to create ToyyibPay bill.');
    }



    public function handleReturnUrl(Request $request)
    {
        $statusId = $request->input('status_id');
        $externalRef = $request->input('order_id'); // e.g., MEMBER-41-...
        $transactionId = $request->input('transaction_id');
        $billCode = $request->input('billcode');


        Log::info("Handling return URL for payment.", [
            'status_id' => $statusId,
            'external_ref' => $externalRef,
            'transaction_id' => $transactionId,
            'bill_code' => $billCode
        ]);

        // Optional: if you passed payment_name, etc. as hidden inputs originally, reattach here
        $paymentName = session('payment_name');
        $paymentFee = session('payment_fee');
        $paymentAllocationId = session('payment_allocation_id');

        Log::info("Payment session data: ", [
            'payment_name' => session('payment_name'),
            'payment_fee' => session('payment_fee'),
            'payment_allocation_id' => session('payment_allocation_id')
        ]);

        if ($statusId == 1 && str_starts_with($externalRef, 'MEMBER-')) {
            $parts = explode('-', $externalRef);
            if (count($parts) >= 2) {
                $memberId = $parts[1];
                $member = Member::find($memberId);
                if ($member) {
                    $member->registration_status = 1;
                    $member->save();

                    PaymentReceipt::create([
                        'payment_name' => $paymentName,
                        'payment_fee' => $paymentFee,
                        'payment_time' => now()->format('H:i:s'),
                        'payment_date' => now()->format('Y-m-d'),
                        'member_id' => $member->member_id,
                        'payment_status' => 'completed',
                        'transaction_id' => $transactionId,
                        'payment_allocation_id' => $paymentAllocationId,
                    ]);

                    return redirect()->route('member.fee')->with('success', 'Payment successful.');
                }
            }
        }

        return redirect()->route('member.fee')->with('error', 'Payment failed or invalid.');
    }

    public function joinEvent(Request $request): JsonResponse
    {
        $eventId = $request->input('event_id');
        $eventName = $request->input('event_name');
        $eventPrice = floatval($request->input('event_price'));

        $user = Auth::user();
        $isNonmember = !$user; // if not authenticated, it's a nonmember
        $email = $request->input('email');

        // Check if the event is full
        $event = AbmEvent::find($eventId);
        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found.'
            ]);
        }

        // Check if the event has reached capacity
        if ($event->total_participation <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'We apologize, but this event has reached its maximum capacity. Please check our other upcoming events.'
            ]);
        }

        // If it's a nonmember and the nonmember does not exist, create a new one
        if ($isNonmember) {

                    // Log incoming request data for debugging
        Log::info('Join Event Request:', ['event_id' => $eventId, 'email' => $email, 'isNonmember' => $isNonmember]);

        // Check if the nonmember has already joined the event
        $verificationResult = (new Nonmember())->verifyIfJoinedEvent($email, $eventId);

        // Log verification result
        Log::info('Verification Result:', ['verification_result' => $verificationResult]);

        if ($verificationResult !== true) {
            Log::info('Verification failed: Nonmember has already joined event.');
            return response()->json($verificationResult);
        }


            // Step 1: Register new nonmember
            Log::info('Registering new nonmember.');
            $nonmember = Nonmember::firstOrCreate(
                ['email' => $request->input('email')],
                [
                    'name' => $request->input('name'),
                    'ic_number' => $request->input('ic_number'),
                    'phone_number' => $request->input('phone_number'),
                ]
            );

            // Step 2: Check if the event is free or paid
            if ($eventPrice <= 0) {
                // Free event logic
                Log::info('Event is free, registering nonmember.');
                Joinevent::create([
                    'event_id' => $eventId,
                    'nonmember_id' => $nonmember->nonmember_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                AbmEvent::where('event_id', $eventId)->decrement('total_participation');

                return response()->json([
                    'success' => true,
                    'message' => 'You successfully joined free event.'
                ]);
            } else {
                // Paid event logic - redirect to ToyyibPay
                Log::info('Event is paid, redirecting to ToyyibPay.');
                $amount = $eventPrice * 100;
                $externalRefNo = 'EVENT-' . $eventId . '-NONMEMBER-' . $nonmember->nonmember_id . '-' . time();
                $callbackUrl = url('/toyyibpay/callback');
                $returnUrl = route('toyyibpay.event.return');

                session([
                    'payment_name' => $eventName,
                    'payment_fee' => $eventPrice,
                    'payment_allocation_id' => null,
                    'event_id' => $eventId,
                    'nonmember_id' => $nonmember->nonmember_id,
                    'member_id' => null, // ensure member_id is null for nonmembers
                    'nonmember_name' => $nonmember->name,
                    'nonmember_ic' => $nonmember->ic_number,
                    'nonmember_email' => $nonmember->email,
                    'nonmember_phone' => $nonmember->phone_number,
                ]);

                $response = Http::asForm()->post('https://dev.toyyibpay.com/index.php/api/createBill', [
                    'userSecretKey' => 'm5vgntk0-zrvy-gqk3-xu7a-f8kmlu6m2u1v',
                    'categoryCode' => '6ubtvgza',
                    'billName' => $eventName,
                    'billDescription' => "Event Fee for $eventName",
                    'billPriceSetting' => 1,
                    'billPayorInfo' => 1,
                    'billAmount' => $amount,
                    'billReturnUrl' => $returnUrl,
                    'billCallbackUrl' => $callbackUrl,
                    'billExternalReferenceNo' => $externalRefNo,
                    'billTo' => $nonmember->name,
                    'billEmail' => $nonmember->email,
                    'billPhone' => $nonmember->phone_number,
                    'billPaymentChannel' => 0,
                ]);

                if ($response->successful()) {
                    $result = $response->json();
                    if (isset($result[0]['BillCode'])) {
                        return response()->json([
                            'success' => true,
                            'redirect_url' => "https://dev.toyyibpay.com/{$result[0]['BillCode']}"
                        ]);
                    }
                }

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to initiate payment.'
                ]);
            }
        } else {
            // Original member flow
            Log::info('Processing member flow.');
            $user = Auth::user();
            $member = Member::where('login_id', $user->login_id)->first();
            $login = Login::where('login_id', $user->login_id)->first();

            if (!$member) {
                return response()->json(['success' => false, 'message' => 'Member not found.'], 404);
            }

            $existing = Joinevent::where('event_id', $eventId)
                                 ->where('member_id', $member->member_id)
                                 ->first();

            if ($existing) {
                return response()->json(['success' => false, 'message' => 'Already joined.']);
            }

            if ($eventPrice > 0) {
                $amount = $eventPrice * 100;
                $externalRefNo = 'EVENT-' . $eventId . '-' . $member->member_id . '-' . time();
                $callbackUrl = url('/toyyibpay/callback');
                $returnUrl = route('toyyibpay.event.return');

                session([
                    'payment_name' => $eventName,
                    'payment_fee' => $eventPrice,
                    'payment_allocation_id' => null,
                    'event_id' => $eventId,
                    'member_id' => $member->member_id,
                    'nonmember_id' => null, // ensure nonmember_id is null for members
                ]);

                $response = Http::asForm()->post('https://dev.toyyibpay.com/index.php/api/createBill', [
                    'userSecretKey' => 'm5vgntk0-zrvy-gqk3-xu7a-f8kmlu6m2u1v',
                    'categoryCode' => '6ubtvgza',
                    'billName' => $eventName,
                    'billDescription' => "Event Fee for $eventName",
                    'billPriceSetting' => 1,
                    'billPayorInfo' => 1,
                    'billAmount' => $amount,
                    'billReturnUrl' => $returnUrl,
                    'billCallbackUrl' => $callbackUrl,
                    'billExternalReferenceNo' => $externalRefNo,
                    'billTo' => $member->name,
                    'billEmail' => $user->email ?? 'noemail@example.com',
                    'billPhone' => $member->phone_number ?? '999999',
                    'billPaymentChannel' => 0,
                ]);

                if ($response->successful()) {
                    $result = $response->json();
                    if (isset($result[0]['BillCode'])) {
                        return response()->json([
                            'success' => true,
                            'redirect_url' => "https://dev.toyyibpay.com/{$result[0]['BillCode']}"
                        ]);
                    }
                }

                return response()->json(['success' => false, 'message' => 'Failed to initiate payment.']);
            }

            Joinevent::create([
                'event_id' => $eventId,
                'member_id' => $member->member_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            AbmEvent::where('event_id', $eventId)->decrement('total_participation');

            return response()->json([
                'success' => true,
                'message' => 'Member successfully joined free event.'
            ]);
        }
    }


public function handleEventReturnUrl(Request $request)
{
    $statusId = $request->input('status_id');
    $transactionId = $request->input('transaction_id');
    $billCode = $request->input('billcode');

    Log::info("Handling return URL for event.", [
        'status_id' => $statusId,
        'transaction_id' => $transactionId,
        'bill_code' => $billCode
    ]);

    // Session values
    $paymentName = session('payment_name');
    $paymentFee = session('payment_fee');
    $paymentAllocationId = session('payment_allocation_id');
    $eventId = session('event_id');
    $memberId = session('member_id');

    // Only needed for nonmember creation
    $nonmemberName = session('nonmember_name');
    $nonmemberIC = session('nonmember_ic');
    $nonmemberEmail = session('nonmember_email');
    $nonmemberPhone = session('nonmember_phone');

    Log::info("Payment session data: ", [
        'payment_name' => $paymentName,
        'payment_fee' => $paymentFee,
        'payment_allocation_id' => $paymentAllocationId,
        'event_id' => $eventId,
        'member_id' => $memberId,
    ]);

    $event = AbmEvent::find($eventId);

    // Handle successful payment
    if ($statusId == 1 && $event) {
        if (is_null($memberId)) {
            // Create nonmember
            $nonmember = Nonmember::firstOrCreate(
                ['email' => $nonmemberEmail],
                [
                    'name' => $nonmemberName,
                    'ic_number' => $nonmemberIC,
                    'phone_number' => $nonmemberPhone,
                ]
            );


            Joinevent::create([
                'event_id' => $eventId,
                'nonmember_id' => $nonmember->nonmember_id,
                'has_attended' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $event->decrement('total_participation');

            PaymentReceipt::create([
                'payment_name' => $paymentName,
                'payment_fee' => $paymentFee,
                'payment_time' => now()->format('H:i:s'),
                'payment_date' => now()->format('Y-m-d'),
                'nonmember_id' => $nonmember->nonmember_id,
                'payment_status' => 'completed',
                'transaction_id' => $transactionId,
                'payment_allocation_id' => $paymentAllocationId,
                'event_id' => $eventId,
            ]);

            return view('non-member.event-details', [
                'event' => $event,
                'success' => 'Event payment successful.'
            ]);
        } else {
            Joinevent::create([
                'event_id' => $eventId,
                'member_id' => $memberId,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $event->decrement('total_participation');

            PaymentReceipt::create([
                'payment_name' => $paymentName,
                'payment_fee' => $paymentFee,
                'payment_time' => now()->format('H:i:s'),
                'payment_date' => now()->format('Y-m-d'),
                'member_id' => $memberId,
                'payment_status' => 'completed',
                'transaction_id' => $transactionId,
                'payment_allocation_id' => $paymentAllocationId,
                'event_id' => $eventId,
            ]);

            return redirect()->route('member.fee')->with('success', 'Event payment successful.');
        }
    }

    // Handle failed payment
    if (is_null($memberId)) {
        // Create nonmember even on failure (for record-keeping)
        $nonmember = Nonmember::firstOrCreate(
            ['email' => $nonmemberEmail],
            [
                'name' => $nonmemberName,
                'ic_number' => $nonmemberIC,
                'phone_number' => $nonmemberPhone,
            ]
        );


        PaymentReceipt::create([
            'payment_name' => $paymentName,
            'payment_fee' => $paymentFee,
            'payment_time' => now()->format('H:i:s'),
            'payment_date' => now()->format('Y-m-d'),
            'nonmember_id' => $nonmember->nonmember_id,
            'payment_status' => 'Reject',
            'transaction_id' => $transactionId,
            'payment_allocation_id' => $paymentAllocationId,
            'event_id' => $eventId,
        ]);

        return view('non-member.event-details', [
            'event' => $event,
            'error' => 'Payment failed.'
        ]);
    } elseif ($memberId) {
        PaymentReceipt::create([
            'payment_name' => $paymentName,
            'payment_fee' => $paymentFee,
            'payment_time' => now()->format('H:i:s'),
            'payment_date' => now()->format('Y-m-d'),
            'member_id' => $memberId,
            'payment_status' => 'Reject',
            'transaction_id' => $transactionId,
            'payment_allocation_id' => $paymentAllocationId,
            'event_id' => $eventId,
        ]);

        return redirect()->route('member.fee')->with('error', 'Payment failed.');
    }

    // Fallback if neither ID exists
    return redirect('/')->with('error', 'Invalid session. Payment could not be processed.');
}





}
