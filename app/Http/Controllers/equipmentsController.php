<?php

namespace App\Http\Controllers;

use App\equipmentsModel;
use Illuminate\Http\Request;

class equipmentsController extends Controller
{
    public function show() {
        $equipments = equipmentsModel::all()->toArray();
        return view('equipments/equipments')->with('equipments', $equipments);
    }

    public function add() {
        return view('equipments/addEquipment');
    }

    public function save(Request $req) {
        $equipment = new equipmentsModel();
        $equipment->name = $req->input('name');
        $equipment->save();
        return redirect()->Route('equipments');
    }

    public function edit($id) {
        $equipment = equipmentsModel::find($id)->toArray();
        return view('equipments/editEquipment')->with('equipment', $equipment);
    }

    public function update(Request $req) {
        $equipment = equipmentsModel::find($req->id);
        $equipment->name = $req->input('name');
        $equipment->save();
        return redirect()->Route('equipments');
    }

    public function remove($id) {
        equipmentsModel::find($id)->delete();
        return redirect()->Route('equipments');
    }
}
