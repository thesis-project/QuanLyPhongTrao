<?php

namespace App\Http\Controllers;

use App\activitiesModel;
use App\activityUserModel;
use Illuminate\Support\Facades\Auth;

class registerActivityController extends Controller
{
    public function show(){
        $activities = activitiesModel::all()->toArray();
        return view('registerActivity')->with('activities', $activities);
    }

    public function processRegister($activityId) {
        if (Auth::check()){
            $userId = Auth::user()->id;
            if(isset($activityId)) {
                $activity_user = new activityUserModel();
                $activity_user->activity_id = $activityId;
                $activity_user->user_id = $userId;
                $activity_user->save();
                return view('notifySuccess')->with('user_id', $userId);
            } else {
                $activities = activityUserModel::all()->where('user_id', $userId)->toArray();
                return view('listActivitiesRegisted', compact('activities', 'userId'));
            }
        } else {
            return view('login')->with('activityId', $activityId);
        }
    }

    public function showListActivitiesRegisted($userId){
        $activities = activityUserModel::all()->where('user_id', $userId)->toArray();
        return view('listActivitiesRegisted', compact('activities', 'userId'));
    }

    public function remove($activityId){
        activityUserModel::find($activityId)->delete();
        $userId = Auth::user()->id;
        $activities = activityUserModel::all()->where('user_id', $userId)->toArray();
        return view('listActivitiesRegisted', compact('activities', 'userId'));
    }

    public function checkAndShowRegisterActivities($id){
        if (Auth::check()){

        }
        $activities = activitiesModel::all()->toArray();
        return view('registerActivity')->with('activities', $activities);
    }
}
