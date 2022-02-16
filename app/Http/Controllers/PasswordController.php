<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $action_link = route('reset',['token' => $token, 'email' => $request->email]);
        $body = "Kami telah mengirimkan permintaan untuk mereset password anda untuk web <b>Kelontong.ID </b> " . $request->email . ". Kamu bisa reset password anda setelah menekan link di bawah ini";

        Mail::send('auth.password.email-forgot',['action_link' => $action_link, 'body' => $body], function($message) use ($request){
            $message->from('shieldman0021@gmail.com','Kelontong.ID');
            $message->to($request->email,'Kelontong.ID')
                        ->subject('Reset Password');
        });

        notify()->success('Kami telah mengirimkan email untuk mereset password anda', 'Berhasil');
        
        return back();
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('error', 'Token tidak valid');
        } else {
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();
            
            notify()->success('Password anda sudah diperbaharui! Anda bisa login dengan password baru', 'Berhasil');
            
            return redirect()->route('login')->with('verifiedEmail', $request->email);
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
