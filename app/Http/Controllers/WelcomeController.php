<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WelcomeController extends Controller
{
    public function welcome(){

    	$services=DB::table('services')->get();
    	return view('home')->with('services',$services);
    }
}
