<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index',[
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            "email" => "required|email:dns|exists:users,email",
            "password" => "required"
        ],[
            "email.exists" => "You are not registered"
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return redirect()->intended('/dashboard')->with('success', 'Login successfully');
        } else {
            return redirect()->intended('/login')->with('fail', 'Login failed');
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
