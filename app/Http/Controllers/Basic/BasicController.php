<?php

namespace App\Http\Controllers\Basic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactUs;

class BasicController extends Controller
{
    //contact us

    public function contact(){

    	return view('user.contact');
    }


    public function contact_mail(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ]);

    	$details=array(
    		'name' =>$request->name,
    		'email'=>$request->email,
    		'phone'=>$request->phone,
    		'subject'=>$request->subject,
    		'message'=>$request->message 
    	);

    	Mail::to('asshekhar206@gmail.com')
    		->cc('lucifier15121995@gmail.com')
    		->send(new ContactUs($details));
    	return redirect()->back();

    }

}
