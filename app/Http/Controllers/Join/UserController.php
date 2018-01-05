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
    	$orders =Auth::user()->orders->SortByDesc('created_at');
        $service = Auth::user()->service->SortByDesc('created_at');
    	$orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        $service->transform(function($service, $key) {
            $service->answers = unserialize($service->answers);
            return $service;
        });

        return view('user.orders')->with('orders',$orders)
                                  ->with('services',$service);
    }


}
