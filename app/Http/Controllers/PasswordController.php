<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
    public function index(){
        return view('auth.password.forgot', [
            "title" => 'Forgot Password',
        ]);
    }

    public function resetForm(Request $request){
        return view('auth.password.reset', [
            "title" => 'Reset Password',
        ])->with(['token' => $request->token, 'email' => $request->email]);
    }

    public function reset(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email']);
        Password::sendResetLink($request->only('email'));
        notify()->success('Kami telah mengirimkan email untuk mereset password anda', 'Berhasil');
        return back();
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|confirmed',
            'token' => 'required',
            'password_confirmation' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        if($status === Password::PASSWORD_RESET){
            return redirect()->route('login')->with('status', __($status));
        }else{
            notify()->error('Coba Kirimkan Link Sekali Lagi', 'Link Kedaluarsa');
            return redirect(route('password.request'));
        }
    }

    public function changePassword(User $user){
        
        if($user->id !== auth()->user()->id){
            abort(403);
        }
    
        return view('profile.password', [
            "title" => 'Change Password',
            "user" => $user
        ]);
    }

    public function updatePassword(Request $request){
        
        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|same:password',
        ],[
            'cpassword.same' => 'The confirm password must match'
        ]);

        if(Hash::check($request->password_lama, auth()->user()->password)){
            User::where('id', $request->id)->update([
                'password' => bcrypt($request->password),
            ]);

            notify()->success('Password telah berubah', 'Berhasil');

            return redirect('/profile/update/'.$request->id);
        }

        throw ValidationException::withMessages([
            'password_lama' => 'Password lama tidak sesuai'
        ]);
    }
}
