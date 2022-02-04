<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

use App\Models\Post;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);    
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');    
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth', 'verified')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [DashboardController::class, 'create'])->name('createP');
    Route::post('/dashboard/create', [DashboardController::class, 'store']);
    Route::post('/dashboard/delete/{id}', [DashboardController::class, 'destroy']);

    Route::get('/dashboard/update/{product:id}', [DashboardController::class, 'edit']);
    Route::put('/dashboard/update/{id}', [DashboardController::class, 'update']);
});
