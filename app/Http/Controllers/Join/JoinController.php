<?php

namespace App\Http\Controllers\Join;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Service\Join\Clients;
use App\Mail\ClientRegistrationSuccessful;
use App\Http\Controllers\Sms\ClientRegisterSmsController;
use DB;
use Validator;
use Auth;
use Mail;

class JoinController extends Controller
{
    public function index(){

    	$professions=DB::table('services')->get();
    	return view('join.join')->with('professions',$professions);
    }

    public function signup(Request $request){

    	$this->validate($request,[
    		'name'=>'required',
    		'phone'=>'required|min:10|max:10|unique:clients',
    		'profession'=>'required',
    		'email'=>'required|unique:clients',
    		'password'=>'required'
    	]);

    	$client =new Clients([
    		'name'=>$request->input('name'),
    		'phone'=>$request->input('phone'),
    		'profession'=>$request->input('profession'),
    		'email'=>$request->input('email'),
    		'password'=>bcrypt($request->input('password'))
    	]);

        

    	$client->save();

        Mail::to($client->email)->send(new ClientRegistrationSuccessful($client));  //send mail

        // return (new ClientRegisterSmsController)->clientWelcomesms($request);    //send sms

    	return redirect()->route('join.client')->with('message','You have successfully been registered,now you can login using your email and password');

    }

    public function signin(){

    }
}
