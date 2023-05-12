<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function student_list(){
        $users = User::where('is_etudiant', true)->get();
        return view('student_list', compact('users'));
    }


    public function create(){
        return view ("add_student");
    }


    public function store(Request $request){
        $request->validate(
        [
            "name"=>"required",
            
            "class"=>"required",
            "email"=>"required",
        ]
        );
        // create a new user record
        $user = new User();
        $user->name = $request->name;
        $user->class=$request->class;
        $user->email=$request->email;
        $user->password = Hash::make('password');
        $user->is_etudiant = true;
        $user->save(); 

        return redirect("/student");
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('edit_student', compact('user'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->name = $request->input('name');
  
    $user->class = $request->input('class');
    $user->email= $request->input('email');
    $user->save();
    return redirect()->route('student_list',  $user->id);
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('student_list');
}




}


