<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        if (Auth::check()){
            $userLogin = Auth::user();
            View::share('userLogin', $userLogin);
        }else{
            echo 'abc';
        }
    }

    public function showDashboard() {
        return view('index');
    }

    public function getLogin() {
        return view('login');
    }

    public function getLogout() {
        Auth::logout();
        return view('login');
    }

    public function postLogin(Request $req) {
        $this->validate($req, [
            'account' => 'required',
            'password' => 'required'
        ], [
            'account.required' => 'Please input Account',
            'password.required' => 'Please input Password'
        ]);

        if (Auth::attempt(['account'=>$req->input('account'), 'password'=>$req->input('password')])){
            return redirect('admin/dashboard');
        } else {
            return redirect('login');
        }
    }
}
