<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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
    return view('dashboard');
});

// login
Route::get('/login', function(){
    return view('login');
})->name('login');
Route::post('/login', function(Request $request){
    return $request->all();
});

//  route admin
// product
Route::resource('product',ProductController::class);
Route::put('product/{product:id}/nonaktif',[ ProductController::class,'nonaktif']);
Route::put('product/{product:id}/aktif',[ ProductController::class,'aktif']);
// user
Route::resource('user',UserController::class);
Route::put('user/{user:id}/nonaktif',[ UserController::class,'nonaktif']);
Route::put('user/{user:id}/aktif',[ UserController::class,'aktif']);





