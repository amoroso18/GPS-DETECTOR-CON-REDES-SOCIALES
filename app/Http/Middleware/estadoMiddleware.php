<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Cookie;

class estadoMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return abort(401, "Crendenciales o token expiró");
        }else{
            if(Auth::user()->estado == 1){
                // $token = Cookie::get('token_generate');
                // if(isset($token) && !empty($token)){
                //     $token_generate = Auth::user()->token_generate;
                //     if($token != $token_generate) {
                //         Auth::logout();
                //         return abort(401, "Crendenciales o token expiró");
                //     }
                // }
                return $next($request);
            }else{
                Auth::logout();
                return abort(403, "Tu cuenta esta suspendidá.");
            }
        }
        return $next($request);
        // Crypt::decryptString($encryptedValue);
    }
}
