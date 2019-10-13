<?php

namespace App\Http\Controllers;

use App\typesUserModel;
use Illuminate\Http\Request;

class typesUserController extends Controller
{
    public function show(){
        $types = typesUserModel::all()->toArray();
        return view('typesUser')->with('types', $types);
    }

    public function add(){
        return view('addTypesUser');
    }

    public function save(Request $req){
        $type = new typesUserModel();
        $type->name = $req->input('name');
        $type->save();
        return redirect()->Route('typesuser');
    }

    public function edit($id){
        $type = typesUserModel::find($id)->toArray();
        return view('editTypesUser', compact('type'));
    }

    public function update(Request $req){
        $type = typesUserModel::find($req->id);
        $type->name = $req -> input('name');
        $type->save();
        return redirect()->Route('typesuser');
    }

    public function remove($id){
        typesUserModel::find($id)->delete();
        return redirect()->Route('typesuser');
    }
}
