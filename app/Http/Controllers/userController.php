<?php

namespace App\Http\Controllers;

use App\typesUserModel;
use App\userModel;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function show(){
        $users = userModel::all()->toArray();
        return view('users')->with('users', $users);
    }

    public function add(){
        $types = typesUserModel::all()->toArray();
        return view('addUsers')->with('types', $types);
    }

    public function save(Request $req){
        $user = new userModel();
        $user->name = $req->input('name');
        $user->account = $req->input('account');
        $user->password = $req->input('password');
        $user->phone = $req->input('phone');
        $user->address = $req->input('address');
        $user->type_user = $req->input('type');
        $user->save();
        return redirect()->Route('users');
    }

    public function edit($id){
        $types = typesUserModel::all()->toArray();
        $user = userModel::find($id)->toArray();
        return view('editUsers', compact('types', 'user'));
    }

    public function update(Request $req){
        $user = userModel::find($req->id);
        $user->name = $req->input('name');
        $user->account = $req->input('account');
        $user->password = $req->input('password');
        $user->phone = $req->input('phone');
        $user->address = $req->input('address');
        $user->type_user = $req->input('type');
        $user->save();
        return redirect()->Route('users');
    }

    public function remove($id)
    {
        userModel::find($id)->delete();
        return redirect()->Route('users');
    }
}
