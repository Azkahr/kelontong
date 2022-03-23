<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/verify-email', function(Request $request){
        return $request->user()->hasVerifiedEmail()
                    ? redirect('/')
                    : view('auth.verify', [
                        "title" => "Verify"
                    ]);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->name('verification.verify')->middleware('signed');

Route::get('/verify-email/resend', function(Request $request){
    if($request->user()->hasVerifiedEmail()){
        return redirect()->intended('/dashboard');
    }else{
        $request->user()->sendEmailVerificationNotification();
        return back()->with('success', 'Verifikasi Terkirim');
    } 
})->name('verification.resend')->middleware('throttle:5,5,verify-email');

Route::prefix('auth')->middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('loginPost')->middleware('throttle:5,5,login');    
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');    
    Route::post('/register', [RegisterController::class, 'store'])->name('userPost');
});

Route::prefix('auth')->middleware('auth')->group(function(){
    Route::get('/register-seller', [RegisterController::class, 'seller'])->name('registerSeller');    
    Route::post('/register-seller', [RegisterController::class, 'buat'])->name('sellerPost');
});

Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth', 'verified', 'isSeller')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/detail-product/{product:id}', [DashboardController::class, 'show']);
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('createP');
    Route::post('/dashboard/create', [DashboardController::class, 'store'])->name('storeP');
    Route::delete('/dashboard/delete/{id}', [DashboardController::class, 'destroy']);

    Route::get('/dashboard/update/{product:id}', [DashboardController::class, 'edit']);
    Route::put('/dashboard/update/{id}', [DashboardController::class, 'update']);

    Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/dashboard/view-order/{id}', [DashboardController::class, 'view'])->name('viewOrder');
    Route::put('/dashboard/update-order/{id}', [DashboardController::class, 'updateOrder']);
    Route::get('/dashboard/order-history', [DashboardController::class, 'orderHistory'])->name('history');
});

Route::get('/password/forgot', [PasswordController::class, 'index'])->name('password.request');
Route::post('/password/forgot', [PasswordController::class, 'reset'])->name('password.email')->middleware('guest');
Route::get('/password/reset/{token}', [PasswordController::class, 'resetForm'])->name('password.reset');
Route::post('/password/reset', [PasswordController::class, 'resetPassword'])->name('resetPassword');

Route::middleware('auth', 'verified')->group(function(){
    Route::get('/profile/update/{user:id}', [ProfileController::class, 'edit']);
    Route::put('/profile/update/{id}', [ProfileController::class, 'update']);

    Route::get('/profile/password/{user:id}', [PasswordController::class, 'changePassword']);
    Route::put('/profile/password/{id}', [PasswordController::class, 'updatePassword']);

});

Route::post('add-to-cart', [CartController::class, 'addToCart']);
Route::middleware('auth', 'verified')->group(function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::put('/update-cart', [CartController::class, 'update']);
    Route::delete('/delete-cart', [CartController::class, 'delete']);

    Route::post('/place-order', [CheckoutController::class, 'order'])->name('order');
    Route::get('/my-order', [OrderController::class, 'index'])->name('myOrder');
    Route::get('view-order/{id}', [OrderController::class, 'show']);

});


Route::get('/search', [HomeController::class, 'search']);

Route::get('/{toko}/{produk}', [HomeController::class, 'detail'])->name('detail');

/* Route::fallback(function () {
    return redirect('/');
}); */