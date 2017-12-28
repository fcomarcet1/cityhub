<?php

namespace App\Http\Controllers\Join;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Service\Join\Clients;
use DB;
use Validator;
use Auth;

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

    	// Auth::login($client->email);

    	if($client->profession=='Bakery'){

    		Schema::create('as1', function (Blueprint $table) {
		    	$table->increments('id');
		    	$table->string('dish');
		    	$table->string('quantity');
		    	$table->string('price');
		});

    	}

    	return redirect()->route('join.client')->with('message','You have successfully been registered,now add items to your menu & start getting orders');

    }

    public function signin(){

    }
}
