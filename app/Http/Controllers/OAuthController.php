<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user_google = Socialite::driver('google')->user();
        $user = User::where('email', $user_google->getEmail())->where('google_id', $user_google->getId())->first();

        if($user != null){
            auth()->login($user, true);
            return redirect()->route('home');
        }else{
            $create = User::Create([
                'email' => $user_google->getEmail(),
                'name' => $user_google->getName(),
                'role' => 'user',
                'google_id' => $user_google->getId(),
                'password' => 0,
                'email_verified_at' => now()
            ]);
            auth()->login($create, true);
            return redirect()->route('home');
        }
    } 
}
