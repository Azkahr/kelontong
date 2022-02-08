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

        if(Auth::attempt($credentials)){
            if(Auth::user()->role == "seller"){
                notify()->success('Selamat Datang Di Dashboard ⚡️', 'Login Berhasil');
                return redirect()->intended('/dashboard');
            } elseif(Auth::user()->role == "user"){
                notify()->success('Selamat Datang '.auth()->user()->name, 'Login Berhasil');
                $request->session()->regenerate();
                return redirect('/');
            }
        } else {
            notify()->error('Login Gagal', 'Gagal');
            return redirect('/login');
        }
}

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        notify()->success('Logout Sukses', 'Berhasil');

        return redirect('/');
    }
}
