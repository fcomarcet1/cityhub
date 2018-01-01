<?php

namespace App\Http\Controllers\Join;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Join\Clients;
use App\Service\Join\ClientProducts;
use App\User;
use App\Service\user\Orders;
use DB;
use Auth;

class ClientPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $client = DB::table('clients')->get();
        $client = Auth::guard('client')->user();
        return view('join.clientdashboard')->with('client',$client);
    }

    public function clientshop()
    {
        $shopid='shop'.Auth::guard('client')->user()->id;
        $products=DB::table('client_products')
                        ->where('shopid',$shopid)
                        ->get();
        $orders = DB::table('orders')->get();
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('join.client-shop')->with(['products'=>$products,'orders'=>$orders,'shopid'=>$shopid]);
    }

    public function add_product(Request $request)
    {   

        $this->validate($request,[
            'product_name'=>'required',
            'quantity'    =>'required',
            'price'       =>'required'
        ]);

        $shopid='shop'.Auth::guard('client')->user()->id;
        $product =new ClientProducts([
            'product_name'=>$request->product_name,
            'quantity'    =>$request->quantity,
            'price'       =>$request->price,
            'shopid'      =>$shopid,
        ]);

        $product->save();

        return redirect()->back()->with('message','Product added successully');
    }

    public function update($id)
    {
        $prod=ClientProducts::find($id);
        return redirect()->back()->withInput(['product_name'=>$prod->product_name,'quantity'=>$prod->quantity,'price'=>$prod->price]);

        $this->validate($request,[
            'product_name'=>'required',
            'quantity'    =>'required',
            'price'       =>'required'
        ]);

        DB::table('client_products')
                            ->where('id',$id)
                            ->update(['product_name'=>$request->product_name,'quantity'=>$request->quantity,'price'=>$request->price]);

        return redirect()->back()->with('message','Product Successfully Updated');
    }

    public function delete($id)
    {
        DB::table('client_products')->where('id',$id)->delete();
        return redirect()->back()->with('message','Product Successfully Deleted');
    }
}
