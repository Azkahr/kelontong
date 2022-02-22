<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index', [
            "title" => 'Profile',
        ]);
    }

    public function edit(User $user){
        
        if($user->id !== auth()->user()->id){
            abort(403);
        }
        
        return view('profile.edit', [
            'title' => 'Edit Profile',
            'user' => $user
        ]);
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users,email,' . auth()->user()->id,
            'image' => 'image|file|max:1024'
        ]);
        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete([$request->oldImage]);
            }
            $validatedData['image'] = $request->file('image')->store('user-images');
        }else{
            $validatedData['image'] = $request->oldImage;
        }

        User::where('id', $request->id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'image' => $validatedData['image']
        ]);

        notify()->success('Profile telah berubah', 'Berhasil');
        
        return back();
    }
}
