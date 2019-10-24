<?php

namespace App\Http\Controllers;

use App\activitiesModel;
use App\activityUserModel;
use Illuminate\Http\Request;

class registerActivityController extends Controller
{
    public function show(){
        $activities = activitiesModel::all()->toArray();
        return view('registerActivity')->with('activities', $activities);
    }

    public function showRegisterLogin($id) {
        return view('login')->with('activityId', $id);
    }

    public function showListActivitiesRegisted($id){
        $activities = activityUserModel::all()->where('user_id', $id)->toArray();
        return view('listActivitiesRegisted', compact('activities', 'id'));
    }

    public function remove($id){
        activityUserModel::find($id)->delete();
        return view('listActivitiesRegisted');
    }
}
