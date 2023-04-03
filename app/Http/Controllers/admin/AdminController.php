<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Mail;
use Stripe;


class AdminController extends Controller

{
    public function adminlogin(){
        if(session()->has('unlocker')){
            return redirect('admin/dashboard');
        }
        return view('admin/login');
    }
    
    public function dashboard(){
        return view('admin/dashboard');
    }
    

}



