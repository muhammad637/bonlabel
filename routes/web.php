<?php

use App\Http\Controllers\CekRouteController;
use App\Models\User;
use App\Models\Order;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RuanganController;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::get('/', [CekRouteController::class, 'master']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('home',[CekRouteController::class,'home']);
Route::get('cek',[CekRouteController::class, 'cekLevel']);

// ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);

    // admin
    Route::middleware('user-level:admin')->group(function () {
        Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');

        // MASTER
        // product
        Route::resource('/master/product', ProductController::class);
        Route::put('/master/product/{product:id}/nonaktif', [ProductController::class, 'nonaktif']);
        Route::put('/master/product/{product:id}/aktif', [ProductController::class, 'aktif']);
        // user
        Route::resource('/master/user', UserController::class);
        Route::put('/master/user/{user:id}/nonaktif', [UserController::class, 'nonaktif']);
        Route::put('/master/user/{user:id}/aktif', [UserController::class, 'aktif']);
        // resetPasswordUser
        Route::put('/master/user/resetPassword/{user:id}', [UserController::class, 'resetPassword']);

        // ruangan 
        Route::resource('/master//ruangan', RuanganController::class);
        Route::put('/master/ruangan/{ruangan:id}/nonaktif', [RuanganController::class, 'nonaktif']);
        Route::put('/master/ruangan/{ruangan:id}/aktif', [RuanganController::class, 'aktif']);

        // order
        Route::resource('/orderan', OrderController::class);
        
        // laporan
        Route::get('/laporan', [LaporanController::class, 'index']);
        Route::get('/eksportLaporan',[LaporanController::class,'exportLaporan']);
        Route::post('/bulananExcel',[LaporanController::class,'bulananExcel']);
    });

    // user
    Route::middleware('user-level:user')->group(function () {
        Route::get('/dashboardUser', [DashboardController::class, 'dashboardUser']);
        Route::get('/order', [OrderController::class, 'createOrder'])->name('user.createOrder');
        Route::post('/order', [OrderController::class, 'storeOrder'])->name('user.storeOrder');
        Route::get('/history', function () {
            $orders = Order::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
            return view('user.page.history',[
                'orders' => $orders,
                'title' => 'history'
            ]);
        });
    });
});
