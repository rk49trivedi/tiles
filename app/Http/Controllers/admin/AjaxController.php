<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Session;
use Mail;



class AjaxController extends Controller

{
    public function signinprocess(Request $request){
        $pass = md5($request->pass);
        $request->uname;
        
        $chkadminacc = DB::table('srvcredentials')->where('rrcredpass',$pass)->where(function($query) use ($request) {
            $query->where('rrcreduname',$request->uname);
            $query->orwhere('rrcredemail',$request->uname);
        })->get();
        
        if(count($chkadminacc) > 0) {
            session()->put('unlocker',array($chkadminacc[0]->rrcreduname,$chkadminacc[0]->rrcredid));
            session()->save();
            echo json_encode(array("login"=>"true"));
        } else {
            echo json_encode(array("login"=>"false"));
        }
    }

    public function changeprocess(Request $request){
        
        $resCred = DB::table('srvcredentials')->where('rrcredid',session()->get('unlocker')[1])->get();
        if(count($resCred) > 0){
            
            $pass = md5($request->cpw);
            $newpass = md5($request->cpwn);
            if($resCred[0]->rrcredpass === $pass){
                
                if(DB::table('srvcredentials')->where("rrcredid",session()->get('unlocker')[1])->update(["rrcredpass" => $newpass])) 
                {
                    echo json_encode(array("msg"=>"update"));
                    
                } else { echo json_encode(array("msg"=>"already")); }
                
            } else { echo json_encode(array("msg"=>"cerror")); }

        } else { echo json_encode(array("msg"=>"cerror")); }
    }



}