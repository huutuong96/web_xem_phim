<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {          
        $id_user =  session("user")->id;
       
        $user= user::where("id", $id_user)->first();
        // dd($user->rule) ;
            if(auth::check() && $user->rule ==1){
                return $next($request);
            }else{
                return back();
                // return redirect()->route("home");
            }
            
      
        
    }
}
