<?php

namespace App\Http\Controllers\Join;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('join.clientdashboard');
    }
}
