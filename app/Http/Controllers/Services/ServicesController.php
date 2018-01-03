<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Services\CabService;
use App\Http\Controllers\PaymentController;
use App\Service\Services\ServicesRequests;
use App\Service\Services;
use Session;
use Auth;
use DB;

class ServicesController extends Controller
{
    //cab
    public function cab(){

        $url='../images/slide1.jpeg';
    	return view('services.cab')->with('url',$url);
    }

    public function bookcab(Request $request)
    {

    	$booking = new CabService([
    		'purpose'=>$request->purpose,
    		'duration'=>$request->duration,
    		'cab_type'=>$request->cab_type,
    		'date'=>$request->somedate

    	]);

        Auth::user()->services()->save($booking);

        
        if($booking->cab_type=="Honda City(Sedan) @Rs2000/1day"){
            $total=2000*$booking->duration;
        }
        elseif ($booking->cab_type=="Scorpio(SUV)@Rs1500/1day") {
            $total=1500*$booking->duration;
        }
        elseif ($booking->cab_type=="Indica(Hatchback)@Rs1000/1day") {
            $total=1000*$booking->duration;
        }
        return redirect()->route('service-checkout')
                         ->with('total',$total);
        return redirect()->back()->with('message','Request Submitted');
    }


    // services view
    public function service($id){

        $services=DB::table('services')->where('id',$id)->pluck('title');
        $questions=DB::table('services_form_fields')->where('service',$services)->get();
        $option1=DB::table('options')->where('service',$services)
                                     ->where('question_no','question1')
                                     ->get(); 
        $option2=DB::table('options')->where('service',$services)
                                     ->where('question_no','question2')
                                     ->get(); 
        $option3=DB::table('options')->where('service',$services)
                                     ->where('question_no','question3')
                                     ->get(); 
        $option4=DB::table('options')->where('service',$services)
                                     ->where('question_no','question4')
                                     ->get(); 
        $option5=DB::table('options')->where('service',$services)
                                     ->where('question_no','question5')
                                     ->get();
        $option6=DB::table('options')->where('service',$services)
                                     ->where('question_no','question6')
                                     ->get();
        $option7=DB::table('options')->where('service',$services)
                                     ->where('question_no','question7')
                                     ->get();

        $total=230;                             
        Session::put(['total'=>$total,'id'=>$id]);                                                                                                                                                     
        return view('services.service')->with('questions',$questions)
                                       ->with('option1',$option1)
                                       ->with('option2',$option2)
                                       ->with('option3',$option3)
                                       ->with('option4',$option4)
                                       ->with('option5',$option5)
                                       ->with('option6',$option6)
                                       ->with('option7',$option7)
                                       ->with('id',$id);
        
    }


    public function request_service(Request $request,$id){

        $q1=$request->ans1;
        $q2=$request->ans2;
        $q3=$request->ans3;
        $q4=$request->ans4;
        $q5=$request->ans5;
        $q6=$request->ans6;
        $q7=$request->ans7;
        $date=$request->somedate;

        $payble=Session::get('total');
        $service_ans=collect([$q1,$q2,$q3,$q4,$q5,$q6,$q7,$date,$payble]);
        Session::put('answers',$service_ans);
        return redirect()->route('service-checkout');
        
    }



    public function service_checkout(Request $request){

        $total=Session::get('total');
        return view('user.service-checkout')->with('total',$total);
    }

    public function postservice_checkout(Request $request){

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

        $amt=Session::get('total');

        if(!Session::has('answers'))
        {
            return redirect('/')->with('message','session has expired');
        }

        $answers=Session::get('answers');

        $id=Session::get('id');

        $order=new ServicesRequests;
        $order->service=Services::find($id)->title;
        $order->answers=serialize($answers);
        $order->name=$request->name;
        $order->phone_no=$request->phone_no;
        $order->pincode=$request->pincode;
        $order->locality=$request->locality;
        $order->address=$request->address;
        $order->city=$request->city;
        $order->state=$request->state;
        $order->landmark=$request->landmark;
        $order->alternate_no=$request->alternate_no;

        Auth::user()->service()->save($order);
        Session::forget('answers');

        $pay=(new PaymentController)->pay($request);
        return $pay;

    }
}
