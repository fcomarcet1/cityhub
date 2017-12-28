<?php

namespace App\Http\Controllers\Food;
use App\Service\Food\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use DB;

class IndexController extends Controller
{
    public function index(){
    	$restaurants=DB::table('restaurants')->get();
    	return view('food.index')->with('restaurants',$restaurants);
    }

    public function restaurant(Request $request, $id){

    	$restid=Restaurant::find($id);
    	$restaurant=DB::table('rs'.$restid->id)->get();
    	return view('food.restaurant')->with('rest',$restid)
    	                              ->with('restaurant',$restaurant);
    								 
  
    }
}
