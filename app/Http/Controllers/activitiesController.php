<?php

namespace App\Http\Controllers;

use App\locationsModel;
use App\userModel;
use Illuminate\Http\Request;
use App\activitiesModel;

class activitiesController extends Controller
{
    public function show(){
        $activities = activitiesModel::all()->toArray();
        return view('activities/activities')->with('activities', $activities);
    }

    public function add(){
        $locations = locationsModel::all()->toArray();
        $users = userModel::all()->toArray();
        return view('activities/addActivities', compact('locations', 'users'));
    }

    public function save(Request $req){
        $activity = new activitiesModel();
        $activity->name = $req->input('movement_name');
        $activity->start_datetime = $req->input('datetime');
        $activity->short_content = $req->input('short_content');
        $activity->location = $req->input('location');
        $activity->organizer = $req->input('organizer');
        $activity->save();
        return redirect()->Route('activities');
    }

    public function edit($id){
        $locations = locationsModel::all()->toArray();
        $activities = activitiesModel::find($id)->toArray();
        $users = userModel::all()->toArray();
        return view('activities/editActivities', compact('locations', 'activities', 'users'));
    }

    public function update(Request $req){
        $activity = activitiesModel::find($req->id);
        $activity->name = $req->input('movement_name');
        $activity->start_datetime = $req->input('datetime');
        $activity->short_content = $req->input('short_content');
        $activity->location = $req->input('location');
        $activity->organizer = $req->input('organizer');
        $activity->save();
        return redirect()->Route('activities');
    }

    public function remove($id){
        activitiesModel::find($id)->delete();
        return redirect()->Route('activities');
    }
}
