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

        Mail::send('email-forgot',['action_link' => $action_link, 'body' => $body], function($message) use ($request){
            $message->from('shieldman0021@gmail.com','Kelontong.ID');
            $message->to($request->email,'Kelontong.ID')
                        ->subject('Reset Password');
        });

        return back()->with('success', 'Kami telah mengirim link ke email untuk mereset password anda');
    }
}
