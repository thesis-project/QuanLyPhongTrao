<?php

namespace App\Http\Controllers;

use App\activitiesModel;
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

}
