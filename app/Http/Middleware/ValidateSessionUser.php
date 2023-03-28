<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use \Session as Session;
use Auth;

class ValidateSessionUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
// $request->session()->flush();
// dd(session('id_user'));
        if(!$request->session()->exists('id_user') &&
           !$request->session()->exists('login') &&
           !$request->session()->exists('email')
        ){      

            // return "/page=administrator";
            // return redirect()->route("/");
            
            // return redirect('/');
            return redirect('/login');

        }else{
            return $next($request);
        }
        // abort(403);    
    }
}
