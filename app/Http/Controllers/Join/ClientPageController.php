<?php

namespace App\Http\Controllers\Join;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\Join\Clients;
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
}
