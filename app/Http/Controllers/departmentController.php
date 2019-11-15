<?php

namespace App\Http\Controllers;

use App\departmentModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class departmentController extends Controller
{
    public function show() {
        $departments = departmentModel::all()->toArray();
        return view('departments/departments')->with('departments', $departments);
    }

    public function add() {
        return view('departments/addDepartment');
    }

    public function save(Request $req) {
        $department = new departmentModel();
        $department->name = $req->input('name');
        $department->save();
        return redirect()->Route('departments');
    }

    public function edit($id) {
        $department = departmentModel::find($id)->toArray();
        return view('departments/editDepartment', compact('department'));
    }

    public function update(Request $req) {
        $department = departmentModel::find($req->id);
        $department->name = $req->input('name');
        $department->save();
        return redirect()->Route('departments');
    }

    public function remove($id) {
        departmentModel::find($id)->delete();
        return redirect()->Route('departments');
    }
}
