<?php

namespace App\Http\Controllers\Food;
use App\Service\Food\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Service\Join\Clients;
use DB;

class IndexController extends Controller
{
    public function index(){
    	$foods=DB::table('clients')
                            ->where('profession','Bakery')
                            ->orwhere('profession','Vehicle')
                            ->orwhere('profession','Photoshoot')
                            ->get();
    	return view('food.index')->with('foods',$foods);
    }


    public function restaurant(Request $request, $id){

        $shop_details=DB::table('clients')->where('id',$id)->get();
        $products=DB::table('client_products')->where('shopid','shop'.$id)->get();
        return view('food.food-shop')->with('details',$shop_details)
                                     ->with('products',$products);
    }
}
