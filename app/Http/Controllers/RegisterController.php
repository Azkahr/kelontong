<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        User::create($validatedData);

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

        User::create($validatedData);

        if(Auth::attempt($request->only('email', 'password'))){
            notify()->success('Register Sukses', 'Berhasil');
            return redirect('/dashboard')->with('success', 'Registration successfully');
        } else {
            notify()->error('Register Gagal', 'Gagal');
            return redirect('/register')->with('error', 'Registration failed');
        }
        notify()->success('Register Sukses', 'Berhasil');

    }
}
