<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Service\Services;
use App\Service\Services\ServicesFormFields;
use Validator;

class AdminController extends Controller
{
    //admin dashboard
	
    public function dashboard(){
    	return view('admin.dashboard');
    }

    public function addService(Request $request){

    	$this->validate($request,[
    		'img_path'=>'required|unique:services',
    		'title'=>'required|unique:services',
    	]);

    	$service=new Services([
    		'img_path'=>$request->img_path,
    		'title'=>$request->title
    	]);

    	$service->save();

    	//creating databasse for the service


    	Schema::create($service->title, function (Blueprint $table) {
            $table->increments('id');
            $table->string('Issue/Product');
            $table->string('Rate');
            $table->timestamps();
        });

        return redirect()->back()->with('message','service added successfully');
	}

	public function addFormFields(Request $request){

		$this->validate($request,[
			'service'=>'required|unique:servicesform_fields',
			'banner_image'=>'required',
			'banner_heading'=>'required',
			'banner_paragraph'=>'required',
			'question1'=>'required',
			'question2'=>'required',
			'question3'=>'required'
		]);

		$fields=new ServicesFormFields([
			'service'=>$request->service,
			'banner_image'=>$request->banner_image,
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
		return redirect()->back();
	}
}
