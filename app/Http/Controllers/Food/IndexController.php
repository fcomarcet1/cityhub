<?php

namespace App\Http\Controllers\Food;
use App\Service\Food\Restaurant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Service\Join\Clients;
use App\Service\Join\ClientProducts;
use App\Cart;
use DB;
use Session;

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

         // cart 
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('food.food-shop')->with('details',$shop_details)
                                     ->with('products',$products)
                                     ->with(['cartproducts'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function addToCart(Request $request,$id)
    {   

        $product = ClientProducts::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product,$product->id);

        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function reduceByone($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function increaseByone($id){
        $cart=Session::has('cart') ?Session::get('cart'):null;
        if(!$cart)
        {
            $cart=new cart($cart);
        }
        $cart->IncreaseByone($id);

        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function removeItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function cart()
    {
        if(!Session::has('cart'))
        {
            return view('user.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('user.cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }
}
