<?php

namespace App\Http\Middleware;

use App\typesUserModel;
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
            $typename = \App\typesUserModel::find($user->type_user)->name;
            if ($typename == 'admin' || $typename == 'manager'){
                return $next($request);}
//            } elseif ($typename == 'student' || $typename == 'guest'){
//                return redirect('notifySuccess');
//            }
            else {
                return redirect('login');
            }
        } else {
            return redirect('login');
        }
    }
}
