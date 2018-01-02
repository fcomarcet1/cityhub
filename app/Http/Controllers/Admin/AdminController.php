<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //admin dashboard
	
    public function dashboard(){
    	return view('admin.dashboard');
    }
}
