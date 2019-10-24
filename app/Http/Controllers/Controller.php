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
        $activities = activitiesModel::all()->toArray();
        $activityUsers = activityUserModel::all()->groupBy('activity_id')->toArray();
        // dd($activityUsers);
        return view('index')->with('activities', $activities);
    }

    public function showLogin() {
        return view('login');
    }

    public function logout() {
        Auth::logout();
        return view('login');
    }

    public function login(Request $req) {
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
            if(isset($activityId) && $typename == 'student'){
                $activity_user = new activityUserModel();
                $activity_user->activity_id = $activityId;
                $activity_user->user_id = $user->id;
                $activity_user->save();
                return view('notifySuccess')->with('user_id', $user->id);
            }
            return redirect('admin/dashboard');

        } else {
            return redirect('login');
        }
    }

    public function showListStudents($id){
        $students = activityUserModel::all()->where('activity_id', $id)->toArray();
        return view('listStudents')->with('students', $students);
    }
}
