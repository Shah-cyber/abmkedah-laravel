<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToyyibpayController extends Controller
{
    public function createBill()
    {
        $option = array(
            'userSecretKey'=> config('toyyibpay.key'),
            'categoryCode'=> config('toyyibpay.category'),
            'billName'=>'Car Rental WXX123',
            'billDescription'=>'Car Rental WXX123 On Sunday',
            'billPriceSetting'=>0,
            'billPayorInfo'=>1,
            'billAmount'=>100,
            'billReturnUrl'=>'http://bizapp.my',
            'billCallbackUrl'=>'http://bizapp.my/paystatus',
            'billExternalReferenceNo' => 'AFR341DFI',
            'billTo'=>'John Doe',
            'billEmail'=>'jd@gmail.com',
            'billPhone'=>'0194342411',
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>'0',
            'billContentEmail'=>'Thank you for purchasing our product!',
            'billChargeToCustomer'=>1,
            'billExpiryDate'=>'17-12-2020 17:00:00',
            'billExpiryDays'=>3
          );  

    }

    public function paymentStatus()
    {

    }

    public function callback()
    {

    }
}
