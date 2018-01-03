<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PaymentController extends Controller
{
    //instamojo pay
    public function pay(Request $request){

    	$this->validate($request,[
            'name'=>'required',
            'phone_no'=>'required',
            'pincode'=>'required',
            'locality'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required'
        ]);

        $user=Auth::user()->email;

    	$ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:e37769f9e3bba7fa325ff429f74551aa",
                          "X-Auth-Token:02d7b7dde0ba279cd4f818f810a72704"));
        $payload = Array(
            'purpose' => 'order',
            'amount' => '1000',
            'phone' => $request->phone_no,
            'buyer_name' => $request->name,
            'redirect_url' => 'http://18.217.70.42/redirect/',
            'send_email' => false,
            'webhook' => 'http://18.217.70.42/webhook/',
            'send_sms' => false,
            'email' => $user,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        // echo $response;
        $data=json_decode($response,true);
        return redirect($data['payment_request']['longurl']);
    }
}
