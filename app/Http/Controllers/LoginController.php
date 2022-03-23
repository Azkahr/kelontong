<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login',[
            "title" => "Login"
        ]);
    }

    protected function redirectTo(){
        if(Auth()->user()->role == "seller"){
            return route('dashboard');
        } elseif(Auth()->user()->role == "user"){
            return redirect('/');
        }
    }
    
    public function authenticate(Request $request){
        $credentials = $request->validate([
            "email" => "required|email:dns|exists:users,email",
            "password" => "required"
        ],[
            "email.exists" => "You are not registered"
        ]);
        
        $remember = $request->has('remember') ? true : false;

        if(Auth::attempt($credentials, $remember)){
            if(Auth::user()->role == "seller"){
                return redirect()->intended('/dashboard');
            } elseif(Auth::user()->role == "user"){
                $request->session()->regenerate();
                return redirect('/');
            }
        } else {
            notify()->error('Email / Password Salah', 'Login Gagal');
            return redirect()->route('login');
        }
}

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
