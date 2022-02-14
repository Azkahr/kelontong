<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user){
        return view('profile.index', [
            "title" => 'Profile',
            "user" => $user
        ]);
    }

    public function edit(User $user){
        return view('profile.edit', [
            'title' => 'Edit Profile',
            'user' => $user
        ]);
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users,email,' . auth()->user()->id,
            // 'image' => 'image|file|max:1024'
        ]);

        User::where('id', $request->id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            // 'image' => $validatedData['image']
        ]);

        return back()->with('success', 'Profile updated');
    }
}
