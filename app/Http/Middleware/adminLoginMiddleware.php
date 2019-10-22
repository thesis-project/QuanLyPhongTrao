<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class adminLoginMiddleware{
    /**
     * Handle an incoming request
     *
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::check()) {
            $user = Auth::user();
            return $next($request);
//            if ($user->typeuser == 1){
//                return $next($request);
//            }
//            else {
//                return redirect('login');
//            }
        } else {
            return redirect('login');
        }
    }
}
