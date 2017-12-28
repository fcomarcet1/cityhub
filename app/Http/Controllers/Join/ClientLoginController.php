<?php

namespace App\Http\Controllers\Join;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
}
