<?php

namespace App\Http\Controllers;

use App\locationsModel;
use Illuminate\Http\Request;
use App\activitiesModel;

class activitiesController extends Controller
{
    public function show(){
        $activities = activitiesModel::all()->toArray();
        return view('activities')->with('activities', $activities);
    }

    public function add(){
        $locations = locationsModel::all()->toArray();
        return view('addActivities')->with('locations', $locations);
    }

    public function save(Request $req){
        $activity = new activitiesModel();
        $activity->name = $req->input('movement_name');
        $activity->start_datetime = $req->input('datetime');
        $activity->location = $req->input('location');
        $activity->save();
        return redirect()->Route('activities');
    }

    public function edit($id){
        $locations = locationsModel::all()->toArray();
        $activities = activitiesModel::find($id)->toArray();
        return view('editActivities', compact('locations', 'activities'));
    }

    public function save_edit(Request $req){
        $activity = activitiesModel::find($req->id);
        $activity->name = $req->input('movement_name');
        $activity->start_datetime = $req->input('datetime');
        $activity->location = $req->input('location');
        $activity->save();
        return redirect()->Route('activities');
    }

    public function remove($id){
        activitiesModel::find($id)->delete();
        return redirect()->Route('activities');
    }
}
