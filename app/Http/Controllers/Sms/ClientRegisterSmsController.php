<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientRegisterSmsController extends Controller
{
    

    public function clientWelcomesms(Request $request){

    	$mobileNo=$request->phone;
		$message = urlencode($request->name);
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
		// echo '<script>alert("Message sent Successfully")</script>';
		return redirect()->back()->with('message','You have successfully been registered,now you can login using your email and password');
    }
}
