<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Administrator_auth;

class Chkauthadministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(session()->has('unlocker')){

            $administrator_chk = Administrator_auth::where('rrcredid',session()->get('unlocker')[1])->first();
            if($administrator_chk){
                $response = $next($request);
                return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                ->header('Pragma','no-cache')
                ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
            }else{
                return redirect('/admin/login');
            }
            
        }else{
            return redirect('/admin/login');
        }
        
        
    }
}
