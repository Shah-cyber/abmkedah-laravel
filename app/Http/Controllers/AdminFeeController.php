<?php

namespace App\Http\Controllers;

use App\Models\AbmEvent;
use App\Models\Joinevent;
use Illuminate\Http\Request;
use App\Models\PaymentReceipt;
use App\Models\PaymentAllocation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminFeeController extends Controller
{
    //function for fee payment list
    public function index()
    {
        // Retrieve events with their fees, paginated by 10
        $events = AbmEvent::select('event_id', 'event_name', 'event_price')
                         ->orderBy('event_id', 'asc')
                         ->paginate(10);

        return view('admin.fee-payment-list', compact('events'));
    }

    public function report($id)
    {
        // Get specific event details
        $event = AbmEvent::findOrFail($id);
        
        // Get participants based on whether the event has a fee
        if ($event->event_price > 0) {
            // For paid events, get participants with completed payments
            $participants = Joinevent::where('joinevent.event_id', $id)
                ->join('payment_receipt', function ($join) {
                    $join->on('joinevent.member_id', '=', 'payment_receipt.member_id')
                        ->orOn('joinevent.nonmember_id', '=', 'payment_receipt.nonmember_id');
                })
                ->where('payment_receipt.payment_status', 'completed')
                ->where('payment_receipt.event_id', $id)
                ->with(['member', 'nonmember'])
                ->select('joinevent.*', 
                        DB::raw("DATE_FORMAT(payment_receipt.payment_date, '%d/%m/%Y') as payment_date"), 
                        'payment_receipt.payment_time')
                ->paginate(10);
        } else {
            // For free events, get all participants with created_at timestamp
            $participants = Joinevent::where('event_id', $id)
                ->with(['member', 'nonmember'])
                ->select('*', 
                    DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as join_date"),
                    DB::raw('TIME(created_at) as join_time'))
                ->paginate(10);
        }

        // Calculate total collection for events with fees
        $totalCollection = 0;
        if ($event->event_price > 0) {
            $completedPayments = PaymentReceipt::where('event_id', $id)
                ->where('payment_status', 'completed')
                ->count();
            $totalCollection = $completedPayments * $event->event_price;
        }

        return view('admin.fee-payment-report', compact('event', 'participants', 'totalCollection'));
    }
    //function for fee payment list
    public function feeCollectionList()
    {
        $payments = PaymentAllocation::select('payment_allocation_id', 'payment_allocation_name', 'amount')
                        ->orderBy('payment_allocation_id', 'asc')
                        ->paginate(10);

        return view('admin.fee-collection-list', compact('payments'));
    }

    //function for fee collection list

    //function for fee collection add
    public function feeCollectionAdd()
    {
        return view('admin.fee-collection-add');
    }

    public function feeCollectionStore(Request $request)
    {
        try {
            $validated = $request->validate([
                'payment_allocation_name' => 'required|string|max:50',
                'amount' => 'required|numeric|min:0',
                'allocation_date' => 'required|date'
            ]);

            $payment = new PaymentAllocation();
            $payment->payment_allocation_name = $validated['payment_allocation_name'];
            $payment->amount = $validated['amount'];
            $payment->allocation_date = $validated['allocation_date'];
            $payment->admin_id = auth()->id(); // Assuming you're using authentication
            $payment->session = 1; // You might want to adjust this based on your needs
            $payment->save();

            return response()->json([
                'success' => true,
                'message' => 'Fee collection added successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding fee collection: ' . $e->getMessage()
            ], 500);
        }
    }

    //function for fee collection update
    public function feeCollectionEdit($id)
    {
        try {
            $payment = PaymentAllocation::findOrFail($id);
            return view('admin.fee-collection-update', compact('payment'));
        } catch (\Exception $e) {
            return redirect()->route('admin.fee-collection.list')
                ->with('error', 'Payment not found.');
        }
    }

    public function feeCollectionUpdate(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'payment_allocation_name' => 'required|string|max:50',
                'amount' => 'required|numeric|min:0',
                'allocation_date' => 'required|date'
            ]);

            $payment = PaymentAllocation::findOrFail($id);
            $payment->payment_allocation_name = $validated['payment_allocation_name'];
            $payment->amount = $validated['amount'];
            $payment->allocation_date = $validated['allocation_date'];
            $payment->save();

            return response()->json([
                'success' => true,
                'message' => 'Fee collection updated successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating fee collection: ' . $e->getMessage()
            ], 500);
        }
    }

    //function for fee collection delete
    public function feeCollectionDelete($id)
    {
        try {
            $payment = PaymentAllocation::findOrFail($id);
            
            // Check if the payment can be deleted (add any necessary business logic)
            // For example, check if it's not referenced elsewhere
            
            $payment->delete();

            return response()->json([
                'success' => true,
                'message' => 'Fee collection deleted successfully!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting fee collection: ' . $e->getMessage()
            ], 500);
        }
    }

    //function for fee collection report
    public function feeCollectionReport($id)
    {
        try {
            // Get payment allocation details
            $payment = PaymentAllocation::findOrFail($id);

            // Get payment receipts for this allocation
            $paymentReceipts = PaymentReceipt::where('payment_allocation_id', $id)
                ->with(['member', 'nonmember'])
                ->orderBy('payment_date', 'desc')
                ->orderBy('payment_time', 'desc')
                ->paginate(10);

            // Calculate payment summaries
            $completePayments = PaymentReceipt::where('payment_allocation_id', $id)
                ->where('payment_status', 'completed')
                ->sum('payment_fee');

            $incompletePayments = PaymentReceipt::where('payment_allocation_id', $id)
                ->where('payment_status', 'pending')
                ->sum('payment_fee');

            $totalCollection = $completePayments + $incompletePayments;

            return view('admin.fee-collection-report', compact(
                'payment',
                'paymentReceipts',
                'completePayments',
                'incompletePayments',
                'totalCollection'
            ));

        } catch (\Exception $e) {
            return redirect()->route('admin.fee-collection.list')
                ->with('error', 'Error loading report: ' . $e->getMessage());
        }
    }
}
