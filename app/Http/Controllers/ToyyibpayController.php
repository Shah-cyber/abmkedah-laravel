<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\PaymentReceipt;

class ToyyibpayController extends Controller
{



    public function payMembershipFee(Request $request)
    {
        $user = Auth::user();
        $member = Member::where('login_id', $user->login_id)->first();

        if (!$member) {
            \Log::error("ToyyibPay Error: Member not found for user {$user->login_id}");
            return back()->with('error', 'Member not found.');
        }

        $paymentAllocationId = $request->payment_allocation_id;
        $paymentName = $request->payment_name; // Get payment name from the form
        $paymentFee = $request->input('total_fee'); // Use total_fee from the form
        $amount = $paymentFee * 100;           // Convert to cents for ToyyibPay API
        $billDescription = 'Membership Fee Payment for Registration and Annual Fee';
        $billTo = $member->name;  // Get the member's name
        $billEmail = $user->email ?? 'noemail@example.com';
        $billPhone = $user->phone_number ?? "999999"; // Replace with actual if available

        $externalRefNo = 'MEMBER-' . $member->member_id . '-' . time();
        $callbackUrl = url('/toyyibpay/callback');
        $returnUrl = url('/member/fee');

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
        \Log::info("ToyyibPay API Response Status: " . $response->status());
        \Log::info("ToyyibPay API Response Body: " . $response->body());

        $result = $response->json();

        if ($response->successful()) {
            if (isset($result[0]['BillCode'])) {
                $billCode = $result[0]['BillCode'];
                return redirect("https://dev.toyyibpay.com/{$billCode}"); // Redirect to sandbox URL
            }
        }

        // Log the error if the bill creation failed
        \Log::error("ToyyibPay Error: Failed to create bill. Response: " . json_encode($result));
        return back()->with('error', 'Failed to create ToyyibPay bill.');
    }



    public function paymentCallback(Request $request)
    {
        \Log::info('ToyyibPay Callback hit', $request->all());
        $billCode = $request->input('billCode');
        $status = $request->input('billpaymentStatus'); // '1' = success
        $externalRef = $request->input('billExternalReferenceNo'); // Example: MEMBER-51-1714378123
        $transactionId = $request->input('billpaymentInvoiceNo');
        $paymentName = $request->input('payment_name'); // Retrieve the payment name from the callback
        $paymentFee = $request->input('payment_fee');   // Retrieve the payment fee from the callback
        $paymentAllocationId = $request->input('payment_allocation_id'); // Retrieve payment allocation ID

        if ($status == 1 && $externalRef && str_starts_with($externalRef, 'MEMBER-')) {
            $parts = explode('-', $externalRef);
            if (count($parts) >= 2) {
                $memberId = $parts[1];

                $member = Member::find($memberId);
                if ($member) {
                    // 1. Update member status
                    $member->registration_status = 1;
                    $member->save();

                    // 2. Create payment receipt
                    PaymentReceipt::create([
                        'payment_name' => $paymentName, // Use payment_name from the callback
                        'payment_fee' => $paymentFee,   // Use payment_fee from the callback
                        'payment_time' => now()->format('H:i:s'),
                        'payment_date' => now()->format('Y-m-d'),
                        'member_id' => $member->member_id,
                        'payment_status' => 'Paid',
                        'transaction_id' => $transactionId,
                        'payment_allocation_id' => $paymentAllocationId, // Use payment allocation ID from the callback
                    ]);

                    \Log::info("ToyyibPay Callback: Member ID {$memberId} registration_status updated and receipt stored.");
                } else {
                    \Log::error("ToyyibPay Error: Member not found for ID {$memberId} during callback.");
                }
            } else {
                \Log::error("ToyyibPay Error: Invalid external reference format. ExternalRef: {$externalRef}");
            }
        } else {
            \Log::error("ToyyibPay Error: Payment callback failed. Status: {$status}, ExternalRef: {$externalRef}");
        }

        return response()->json(['message' => 'Callback processed.'], 200);
    }
}
