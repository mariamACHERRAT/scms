<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class TeacherController extends Controller
{
    public function teacher_list(){
        $users = User::where('is_prof', true)->get();
        return view('teacher_list', compact('users'));
    }


    public function create(){
        return view ("add_teacher");
    }


    public function store(Request $request){
        $request->validate(
        [
            "name"=>"required",
            "email"=>"required",
        ]
        );
        // create a new user record
        $user = new User();
        $user->name = $request->name;
        $user->email=$request->email;
        $user->password = Hash::make('password');
        $user->is_prof = true;
        $user->save(); 

        return redirect("/teacher");
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('edit_teacher', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->email= $request->input('email');
    $user->save();
    return redirect()->route('teacher_list',  $user->id);
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('teacher_list');
}




}


