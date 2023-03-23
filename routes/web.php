<?php

use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

// admin
// product
Route::resource('product',ProductController::class);
Route::put('product/{product:id}/nonaktif',[ ProductController::class,'nonaktif']);
Route::put('product/{product:id}/aktif',[ ProductController::class,'aktif']);



Route::get('/createRuangan', function(){
    return view('admin.pages.Ruangan.createRuangan',[
        'user' => User::where('')
    ]);
})->name('createRuangan');

Route::get('/listUser',function(){
    
    $user = User::all();
    return $user[0]->ruangan()->get();
    // return User::where('id_user','1')->get();
    // return view('admin.pages.User.listUser',[
    //     'users' => User::all(),
    // ]);
});

Route::post('/createRuangan',function(Request $request){
    // dd($request);
    return $request->all();
})->name('postUser');

// Route::get('/lisUser',function(){
//     return ;
// });




