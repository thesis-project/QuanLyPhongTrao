<?php

namespace App\Http\Controllers;

use App\locationsModel;
use Illuminate\Http\Request;

class locationsController extends Controller
{
    public function show(){
        $locations = locationsModel::all()->toArray();
        return view('locations/locations')->with('locations', $locations);
    }

    public function add(){
        return view('locations/addLocations');
    }

    public function save(Request $req){
        $location = new locationsModel();
        $location->name = $req->input('name');
        $location->address = $req->input('address');
        $location->save();
        return redirect()->Route('locations');
    }

    public function edit($id){
        $locations = locationsModel::find($id)->toArray();
        return view('locations/editLocations', compact('locations'));
    }

    public function update(Request $req){
        $location = locationsModel::find($req->id);
        $location->name = $req->input('name');
        $location->address = $req->input('address');
        $location->save();
        return redirect()->Route('locations');
    }

    public function remove($id){
        locationsModel::find($id)->delete();
        return redirect()->Route('locations');
    }
}
