<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            "title" => 'Register',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "username" => "required|min:5|max:255",
            "name" => "required|min:5|max:255",
            "email" => "required|email:dns|unique:users,email",
            "password" => "required|min:5|max:255",
            "cpassword" => "required|same:password"
        ],[
            'cpassword.same' => 'The confirm password must match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfully');
    }
}
