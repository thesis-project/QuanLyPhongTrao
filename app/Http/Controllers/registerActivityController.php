<?php

namespace App\Http\Controllers;

use App\activitiesModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class registerActivityController extends Controller
{
    public function show(){
        $activities = activitiesModel::all()->toArray();
        return view('registerActivity')->with('activities', $activities);
    }
}
