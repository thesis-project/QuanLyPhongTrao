<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\activityUserModel;
use App\activitiesModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $userLogin = Auth::user();
        View::share('userLogin', $userLogin);
        
    }

    public function showDashboard() {
        $activityUsers = activityUserModel::all()->groupBy('activity_id')->toArray();
        // dd($activityUsers);
        return view('index')->with('activityUsers', $activityUsers);
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
            $user = Auth::user();
            $activityId = $req->input('activityId');
            $typename = \App\typesUserModel::find($user->type_user)->name;
            // if ($typename == 'admin' || $typename == 'manager') return redirect('admin/dashboard');
            if(isset($activityId) && $typename == 'student'){
                $activity_user = new activityUserModel();
                $activity_user->activity_id = $activityId;
                $activity_user->user_id = $user->id;
                $activity_user->save();
            }
            // print_r($user);
            // exit();
            return redirect('admin/dashboard');

        } else {
            return redirect('login');
        }
    }
}
