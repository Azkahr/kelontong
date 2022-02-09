<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" => "Home"
    ]);
});

Route::get('/verify-email', function(Request $request){
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended('/dashboard')
                    : view('auth.verify', [
                        "title" => "Verify"
                     ]);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/verify-email/resend', function(Request $request){
    if($request->user()->hasVerifiedEmail()){
        return redirect()->intended('/dashboard');
    }else{
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Verifikasi Terkirim');
    } 
})->name('verification.resend');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);    
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');    
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/daftar', [RegisterController::class, 'tampil'])->middleware('guest');
Route::post('/daftar', [RegisterController::class, 'buat']);

Route::middleware('auth', 'verified', 'isSeller')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('createP');
    Route::post('/dashboard/create', [DashboardController::class, 'store']);
    Route::post('/dashboard/delete/{id}', [DashboardController::class, 'destroy']);

    Route::get('/dashboard/update/{product:id}', [DashboardController::class, 'edit']);
    Route::put('/dashboard/update/{id}', [DashboardController::class, 'update']);
});

Route::get('/password/forgot', [PasswordController::class, 'index'])->name('forgot');
Route::post('/password/forgot', [PasswordController::class, 'reset'])->name('resetLink');
Route::get('/password/reset/{token}', [PasswordController::class, 'resetForm'])->name('reset');
Route::post('/password/reset', [PasswordController::class, 'resetPassword'])->name('resetPassword');