<?php

namespace App\Http\Controllers;

use App\activitiesModel;
use App\activityUserModel;
use Illuminate\Support\Facades\Auth;

class registerActivityController extends Controller
{
    public function show(){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $activitiesRegisted = \App\activityUserModel::all()->where('user_id', $userId)->toArray();
            $array = array();
            foreach ($activitiesRegisted as $item) {
                array_push($array, $item['activity_id']);
            }
            $activities = activitiesModel::all()->toArray();
            return view('registerActivity', compact('activities', 'array'));
        } else {
            $activities = activitiesModel::all()->toArray();
            return view('registerActivity')->with('activities', $activities);
        }
    }

    public function processRegister($activityId) {
        if (Auth::check()){
            $userId = Auth::user()->id;
            if(isset($activityId)) {
                $activity_user = new activityUserModel();
                $activity_user->activity_id = $activityId;
                $activity_user->user_id = $userId;
                $activity_user->save();
                return redirect()->route('listActivitiesRegisted', $userId);
            } else {
                $activities = activityUserModel::all()->where('user_id', $userId)->toArray();
                return redirect()->route('listActivitiesRegisted', compact('activities', 'userId'));
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function showListActivitiesRegisted($userId) {
        $activities = activityUserModel::all()->where('user_id', $userId)->toArray();
        return view('listActivitiesRegisted', compact('activities', 'userId'));
    }

    public function remove($activityId){
        activityUserModel::find($activityId)->delete();
        $userId = Auth::user()->id;
        return redirect()->route('listActivitiesRegisted', $userId);
    }


    public function checkAndShowRegisterActivities($userId) {
        $activitiesRegisted = \App\activityUserModel::all()->where('user_id', $userId)->toArray();
        $array = array();
        foreach ($activitiesRegisted as $item) {
            array_push($array, $item['activity_id']);
        }
        $activities = activitiesModel::all()->toArray();
        return view('registerActivity', compact('activities', 'array'));
    }
}
