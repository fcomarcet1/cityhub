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
use App\Service\user\Orders;
use DB;
use Session;
use Auth;

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

    public function checkout()
    {   
        $total=Session::get('cart')->totalPrice;
        return view('user.checkout')->with('total',$total);
    }

    // cancel placed order
    public function cancelorder($id){
        $order=DB::table('orders')->where('id',$id)
                                  ->update(['status'=>"Cancelled"]);
        return redirect()->back();
    }

    //instamojo payment

    public function pay(Request $request)
    {
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

        $amt=Session::get('cart')->totalPrice;

        if(!Session::has('cart'))
        {
            return redirect('/')->with('message','cart has expired');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);

        $order=new Orders;
        $order->cart=serialize($cart);
        $order->name=$request->name;
        $order->phone_no=$request->phone_no;
        $order->pincode=$request->pincode;
        $order->locality=$request->locality;
        $order->address=$request->address;
        $order->city=$request->city;
        $order->state=$request->state;
        $order->landmark=$request->landmark;
        $order->alternate_no=$request->alternate_no;

        Auth::user()->orders()->save($order);
        Session::forget('cart');



        //payment instamojo
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:e37769f9e3bba7fa325ff429f74551aa",
                          "X-Auth-Token:02d7b7dde0ba279cd4f818f810a72704"));
        $payload = Array(
            'purpose' => 'order',
            'amount' => $amt,
            'phone' => $request->phone_no,
            'buyer_name' => $request->name,
            'redirect_url' => 'http://18.217.70.42/redirect/',
            'send_email' => false,
            'webhook' => 'http://18.217.70.42/webhook/',
            'send_sms' => false,
            'email' => $user,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 

        //echo $response;
        $data=json_decode($response,true);
        return redirect($data['payment_request']['longurl']);
    }

    public function redirect(Request $request)
    {
        return redirect('/');
    }
}
