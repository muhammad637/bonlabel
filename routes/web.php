<?php

use App\Http\Controllers\LoginController;
use App\Models\User;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RuanganController;

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

Route::middleware('guest')->group(function(){
    Route::get('/login', function () {
        return view('login');
    });
    Route::post('/login/post', [LoginController::class, 'authenticate']);
});


// ADMIN
Route::middleware(['auth', 'user-level:admin'])->group(function () {
    Route::get('/dashboardAdmin', function () {
        return view('admin.dashboard');
        // return [auth()->user(), 'level' => auth()->user()->cekLevel];
    });

    // product
    Route::resource('product', ProductController::class);
    Route::put('product/{product:id}/nonaktif', [ProductController::class, 'nonaktif']);
    Route::put('product/{product:id}/aktif', [ProductController::class, 'aktif']);
    // user
    Route::resource('user', UserController::class);
    Route::put('user/{user:id}/nonaktif', [UserController::class, 'nonaktif']);
    Route::put('user/{user:id}/aktif', [UserController::class, 'aktif']);
    
    // ruangan 
    Route::resource('/ruangan',RuanganController::class);
    Route::put('ruangan/{ruangan:id}/nonaktif', [RuanganController::class, 'nonaktif']);
    Route::put('ruangan/{ruangan:id}/aktif', [RuanganController::class, 'aktif']);

    // logout
    Route::get('/logout', [LoginController::class,'logout']);
});

// USER
Route::middleware(['auth', 'user-level:user'])->group(function () {
    Route::get('/dashauser', function () {
        return [auth()->user(), 'level' => auth()->user()->status];
    });
    Route::get('/logout', [LoginController::class,'logout']);
});


// login
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', function (Request $request) {
    return $request->all();
});
