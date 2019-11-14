<?php

namespace App\Http\Controllers;

use App\scholasticModel;
use App\semesterModel;
use Illuminate\Http\Request;

class scholasticSemesterController extends Controller
{
    public function show() {
        $scholastics = scholasticModel::all()->toArray();
        $semester = semesterModel::all()->toArray();
        return view('scholastic-semester/scholasticSemester', compact('scholastics', 'semester'));
    }
    /* Scholastic */
    public function addScholastic() {
        return view('scholastic-semester/addScholastic');
    }

    public function saveScholastic(Request $req) {
        $scholastic = new scholasticModel();
        $scholastic->name = $req->input('scholastic');
        $scholastic->save();
        return redirect()->Route('scholasticSemester');
    }

    public function editScholastic($id) {
        $scholastic = scholasticModel::find($id)->toArray();
        return view('scholastic-semester/editScholastic')->with('scholastic', $scholastic);
    }

    public function updateScholastic(Request $req) {
        $scholastic = scholasticModel::find($req->id);
        $scholastic->name = $req->input('scholastic');
        $scholastic->save();
        return redirect()->Route('scholasticSemester');
    }

    public function removeScholastic($id) {
        scholasticModel::find($id)->delete();
        return redirect()->Route('scholasticSemester');
    }
    /* End Scholastic  */


    /* Semester */
    public function addSemester() {
        return view('scholastic-semester/addSemester');
    }

    public function saveSemester(Request $req) {
        $semester = new semesterModel();
        $semester->name = $req->input('semester');
        $semester->save();
        return redirect()->Route('scholasticSemester');
    }

    public function editSemester($id) {
        $semester = semesterModel::find($id)->toArray();
        return view('scholastic-semester/editSemester')->with('semester', $semester);
    }

    public function updateSemester(Request $req) {
        $semester = semesterModel::find($req->id);
        $semester->name = $req->input('semester');
        $semester->save();
        return redirect()->Route('scholasticSemester');
    }

    public function removeSemester($id) {
        semesterModel::find($id)->delete();
        return redirect()->Route('scholasticSemester');
    }
    /* End Semester */
}
