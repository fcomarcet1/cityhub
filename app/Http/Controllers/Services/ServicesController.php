<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Services\CabService;
use App\Http\Controllers\PaymentController;
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

        $services=DB::table('services')->where('id',$id)->get();
        // $service=$services->title;
        $details=DB::table('services_form_fields')->where('id',$id)->get();
        return view('services.service')->with('details',$details);
    }



    public function service_checkout(Request $request){

        $total=Session::get('total');
        return view('user.service-checkout')->with('total',$total);
    }

    public function postservice_checkout(Request $request){

        $pay=(new PaymentController)->pay($request);
        return $pay;

    }
}
