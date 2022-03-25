<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Toko;
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
            'handphone_number' => ['required', 'numeric', 'digits:12', 'regex:/^0/', 'unique:users,handphone_number'],
            "password" => "required|min:8|max:255",
            "cpassword" => "required|same:password"
        ],[
            'cpassword.same' => 'The Confirmation Password Must Match'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        

        if($user){
            Auth::login($user);
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
            'image' => 'max:2048',
            'image' => ['required', 'max:2048'],
            'image.*' => 'mimes:jpeg,jpg,png,JPG',
        ],[
            'image.*.mimes' => 'Image File Not Supported'
        ]);
        $image = $validatedData['image']->store('photo-profile-toko');

        $toko = Toko::create([
            'user_id' => Auth::id(),
            'nama_toko' => $validatedData['nama_toko'],
            'kota' => $validatedData['kota'],
            'alamat' => $validatedData['alamat'],
            'image' => $image,
        ]);

        $user = User::where('id', Auth::id())->first();
        $user->role = 'seller';
        $user->toko_id = $toko['id'];
        $user->update();

        if($toko){
            return redirect()->route('dashboard');
        }else{
            return back()->with('Gagal', 'Registrasi Jadi Seller Gagal');
        }
    }
}
