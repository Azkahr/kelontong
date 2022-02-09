<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register', [
            "title" => 'Register',
        ]);
    }

    public function tampil(){
        return view('seller.register', [
            "title" => 'Daftar Seller',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "name" => "required|min:3|max:255",
            "email" => "required|email:dns|unique:users,email",
            "role" => "required",
            "password" => "required|min:5|max:255",
            "cpassword" => "required|same:password"
        ],[
            'cpassword.same' => 'The confirm password must match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        notify()->success('Register Sukses', 'Berhasil');
        
        return redirect('/login')->with('success', 'Registration successfully');
    }

    public function buat(Request $request){
        $validatedData = $request->validate([
            "name" => "required|min:3|max:255",
            "email" => "required|email:dns|unique:users,email",
            "role" => "required",
            "password" => "required|min:5|max:255",
            "cpassword" => "required|same:password"
        ],[
            'cpassword.same' => 'The confirm password must match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        notify()->success('Register Sukses', 'Berhasil');

        return redirect('/login');
    }
}
