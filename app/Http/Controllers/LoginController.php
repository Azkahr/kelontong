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
        if(Auth()->user()->role == 1){
            return route('dashboard');
        } elseif(Auth()->user() == 2){
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

        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 1){
                return redirect()->intended('/dashboard')->with('success', 'Login successfully (refresh untuk menghilangkan notifikasi)');
            } elseif(Auth::user()->role == 2){
                return redirect()->route('home');
            
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login successfully (refresh untuk menghilangkan notifikasi)');
            
        } else {
            return back()->with('fail', 'Login failed');
        }
    }
}

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
