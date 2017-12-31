<?php

namespace App\Http\Controllers\Join;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class UserController extends Controller
{
    public function myorders()
    {
    	$orders = Auth::user()->orders;
    	$orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.orders')->with('orders',$orders);
    }

    public function userProfile()
    {
        return view('user.profile');
    }
}
