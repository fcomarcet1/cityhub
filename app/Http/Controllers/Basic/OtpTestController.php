<?php

namespace App\Http\Controllers\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use Mail;
use Session;

class OtpTestController extends Controller
{
    public function sendOtp(){
    	return view('user.otp');
    }

    public function postsendOtp(Request $request){

    	$otp=rand(10000,90000);
    	Session::put('otp',$otp);
    	Mail::to($request->email)->send(new ContactUs($otp));
    	return redirect()->route('verifyOtp');
    }

    public function verifyOtp(){

    	$otp=Session::get('otp');
    	return view('user.verifyOtp')->with('otp',$otp);
    }
}
