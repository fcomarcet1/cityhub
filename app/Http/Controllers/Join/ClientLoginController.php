<?php

namespace App\Http\Controllers\Join;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Service\Join\Clients;

class ClientLoginController extends Controller
{

	public function __construct()
	{
		$this->middleware('guest:client')->except(['clientlogout']);
	}

    public function signinform()
    {
    	return view('join.clientlogin');
    }

    public function signin(Request $request)
    {
    	//validate form data
    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required'
    	]);

    	//attempt login
    	if (Auth::guard('client')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {
    		//if successfull redirect to dashboard
    		return redirect()->intended(route('client.dashboard'));
    	}
		
		//if unsuccessfull redirect to login page with error	
		return redirect()->back()->withInput($request->only('email','remember'))->withErrors(['email'=>'email or password is invalid']);;    			
    }

    public function clientlogout()
    {
        Auth::guard('client')->logout();

        return redirect('/');
    }

    public function sendOtp(Request $request){

        // $response = array();
        // $userId = Auth::guard('client')->user()->id;

        return 'hello';

        // $users = Clients::where('id', $userId)->first();

        // if ( isset($users['mobile']) && $users['mobile'] =="" ) {
        //     $response['error'] = 1;
        //     $response['message'] = 'Invalid mobile number';
        //     $response['loggedIn'] = 1;
        // } else {

        //     $otp = rand(100000, 999999);
        //     $MSG91 = new MSG91();

        //     $msg91Response = $MSG91->sendSMS($otp,$users['mobile']);

        //     if($msg91Response['error']){
        //         $response['error'] = 1;
        //         $response['message'] = $msg91Response['message'];
        //         $response['loggedIn'] = 1;
        //     }else{

        //         Session::put('OTP', $otp);

        //         $response['error'] = 0;
        //         $response['message'] = 'Your OTP is created.';
        //         $response['OTP'] = $otp;
        //         $response['loggedIn'] = 1;
        //     }
        // }
        // echo json_encode($response);
    }
}
