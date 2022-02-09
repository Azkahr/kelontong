<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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

        return back()->with('success', 'Kami telah mengirim link ke email untuk mereset password anda');
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

            return redirect()->route('login')->with('info', 'Password anda sudah diperbaharui! Anda bisa login dengan password baru')->with('verifiedEmail', $request->email);
        }
    }
}
