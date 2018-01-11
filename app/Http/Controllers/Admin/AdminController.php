<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Service\Services;
use App\Service\Services\ServicesFormFields;
use Validator;
use DB;
use App\Service\Services\Options;

class AdminController extends Controller
{
    //admin dashboard
	
    public function dashboard(){
    	return view('admin.dashboard');
    }

    public function Service(Request $request){

    	$task = $request->task;

    	//check for task 

    	if($task=='addService'){
    	$this->validate($request,[
    		'img_path'=>'required|unique:services',
    		'title'=>'required|unique:services',
    	]);

    	$filename = $request->img_path->getClientOriginalName();	
    	$request->img_path->storeAs('public/upload',$filename);


    	$service=new Services([
    		'img_path'=>$filename,
    		'title'=>$request->title
    	]);

    	$service->save();

    	return redirect()->back()->with('message','service added successfully');
    	}

    	elseif ($task=='addFormFields') {
    		$this->validate($request,[
				'service'=>'required|unique:services_form_fields',
				'banner_image'=>'required',
				'banner_heading'=>'required',
				'banner_paragraph'=>'required',
				'question1'=>'required',
				'question2'=>'required',
				'question3'=>'required'
			]);

			$filename = $request->banner_image->getClientOriginalName();	
    		$request->banner_image->storeAs('public/upload',$filename);

			$fields=new ServicesFormFields([
				'service'=>$request->service,
				'banner_image'=>$filename,
				'banner_heading'=>$request->banner_heading,
				'banner_paragraph'=>$request->banner_paragraph,
				'question1'=>$request->question1,
				'question2'=>$request->question2,
				'question3'=>$request->question3,
				'question4'=>$request->question4,
				'question5'=>$request->question5,
				'question6'=>$request->question6,
				'question7'=>$request->question7
			]);

			$fields->save();

			return redirect()->back()->with('message','service details and form updated');
    	}

    	elseif ($task=='addOptions') {
	    		$this->validate($request,[
				'service'=>'required',
				'question_no'=>'required',
				'option'=>'required',
			]);

			$options=new Options([
				'service'=>$request->service,
				'question_no'=>$request->question_no,
				'option'=>$request->option
			]);

			$options->save();
			return redirect()->back()->with('message','service form fields opptions updated');
    	}
	}

	

	public function sendSms(Request $request){

		$this->validate($request,[
			'phone'=>'required|min:10|max:10',
			'message'=>'required'
		]);


		$mobileNo=$request->phone;
		$message = urlencode($request->message);
		$authKey = "191084AFZYypDVdP5a4c64c0";
		$senderId = "CTYHUB";
		$route = "4";
		$postData = array(
		    'authkey' => $authKey,
		    'mobiles' => $mobileNo,
		    'message' => $message,
		    'sender' => $senderId,
		    'route' => $route,
		    'country'=>'91'
		);
		$url="https://control.msg91.com/api/sendhttp.php";
		$ch = curl_init();
		    curl_setopt_array($ch, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$output = curl_exec($ch);
		 if(curl_errno($ch))
		{
		    echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		echo '<script>alert("Message sent Successfully")</script>';
		return redirect()->back();

	}
}
