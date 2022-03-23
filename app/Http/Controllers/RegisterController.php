<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register', [
            "title" => 'Register',
        ]);
    }

    public function seller(){
        return view('auth.register-seller', [
            "title" => 'Register Seller',
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "name" => "required|min:3|max:255",
            "email" => "required|email:dns|unique:users,email",
            "role" => "required",
            'handphone_number' => ['required', 'numeric', 'digits:12', 'regex:/^0/'],
            "password" => "required|min:5|max:255",
            "cpassword" => "required|same:password"
        ],[
            'cpassword.same' => 'The Confirmation Password Must Match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        if($user){
            Auth::login($validatedData);
            event(new Registered($user));
            return redirect('/verify-email');
        }else{
            notify()->error('Register Gagal', 'Gagal');
            return back()->with('error', 'Registration failed');
        }
    }

    public function buat(Request $request){
        $validatedData = $request->validate([
            'nama_toko' => 'required|min:5;',
            'alamat' => 'required',
            'kota' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpeg,jpg,png,JPG|max:2048'
        ]);

        dd($validatedData);

        /* $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::where('email', $validatedData['email'])->first();
        if($user->exists()){
            $user->nama_toko = $validatedData['nama_toko'];
            $user->role = $validatedData['role'];
            $user->update();
            if(Auth::attempt($validatedData)){
                notify()->success('Register Sukses', 'Berhasil');
                return redirect('/dashboard')->with('success', 'Registration successfully');
            } else {
                notify()->error('Register Gagal', 'Gagal');
                return redirect('/register')->with('error', 'Registration failed');
            }
        }else{
            $userReg = User::create($validatedData);
            event(new Registered($userReg));
            if(Auth::attempt($validatedData)){
                notify()->success('Register Sukses', 'Berhasil');
                return redirect('/dashboard')->with('success', 'Registration successfully');
            } else {
                notify()->error('Register Gagal', 'Gagal');
                return redirect('/register')->with('error', 'Registration failed');
            }
        } */
    }
}
