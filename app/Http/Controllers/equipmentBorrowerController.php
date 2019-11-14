<?php

namespace App\Http\Controllers;

use App\activitiesModel;
use App\equipmentBorrowerModel;
use App\equipmentsModel;
use App\userModel;
use Illuminate\Http\Request;

class equipmentBorrowerController extends Controller
{
    public function show() {
        $equipmentsBorrowers = equipmentBorrowerModel::all()->toArray();
        return view('equipment_borrower/equipmentBorrower')->with('equipmentsBorrowers', $equipmentsBorrowers);
    }

    public function add() {
        $equipments = equipmentsModel::all()->toArray();
        $borrowers = userModel::all()->toArray();
        $managers = userModel::all()->toArray();
        $activities = activitiesModel::all()->toArray();
        return view('equipment_borrower/addEquipmentBorrower', compact('equipments', 'borrowers', 'managers', 'activities'));
    }

    public function save(Request $req) {
        $equipmentBorrow = new equipmentBorrowerModel();
        $equipmentBorrow->name = $req->input('name');
        $equipmentBorrow->borrower = $req->input('borrower');
        $equipmentBorrow->manager = $req->input('manager');
        $equipmentBorrow->equipment = $req->input('equipment');
        $equipmentBorrow->activity = $req->input('activity');
        $equipmentBorrow->note = $req->input('note');
        $equipmentBorrow->save();
        return redirect()->Route('equipmentsBorrowers');
    }

    public function edit($id) {
        $equipmentBorrow = equipmentBorrowerModel::find($id)->toArray();
        $equipments = equipmentsModel::all()->toArray();
        $borrowers = userModel::all()->toArray();
        $managers = userModel::all()->toArray();
        $activities = activitiesModel::all()->toArray();
        return view('equipment_borrower/editEquipmentBorrower', compact('equipmentBorrow','equipments', 'borrowers', 'managers', 'activities'));
    }

    public function update(Request $req) {
        $equipmentBorrow = equipmentBorrowerModel::find($req->id);
        $equipmentBorrow->name = $req->input('name');
        $equipmentBorrow->borrower = $req->input('borrower');
        $equipmentBorrow->manager = $req->input('manager');
        $equipmentBorrow->equipment = $req->input('equipment');
        $equipmentBorrow->activity = $req->input('activity');
        $equipmentBorrow->note = $req->input('note');
        $equipmentBorrow->save();
        return redirect()->Route('equipmentsBorrowers');
    }

    public function remove($id) {
        equipmentBorrowerModel::find($id)->delete();
        return redirect()->Route('equipmentsBorrowers');
    }
}
