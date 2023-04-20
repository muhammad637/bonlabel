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
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\UbahStockController;
use App\Models\Notifikasi;
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



Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('/login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::get('/sibonlabel', [CekRouteController::class, 'master'])->name('master');
// Route::get('/', [CekRouteController::class, 'master'])->name('master');
Route::get('home',[CekRouteController::class,'home'])->name('def.home');
Route::get('cek',[CekRouteController::class, 'cekLevel'])->name('def.cek');


// ADMIN
Route::middleware(['auth'])->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/logNonaktif', [LoginController::class, 'logNonaktif'])->name('logNonaktif');
    
    // notifikasi
    Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifi');
    Route::get('/notifikasi/mark', [NotifikasiController::class, 'mark'])->name('notifi.mark');
    // Route::delete('/notifikasi/{notif:id}', [NotifikasiController::class, 'delete']);
    // Route::get('/notifikasi/delete', [NotifikasiController::class, 'delAll'])->name('notifi-del');
    

    // profil
    Route::post('/user/{user:id}', [UserController::class, 'updatev2'])->name('profile.edit');
    Route::get('/profile',[CekRouteController::class, 'profil'])->name('profile');
    Route::post('/user/{user:id}/password', [UserController::class, 'passwordProfile'])->name('profile.password');
    
    // admin
    Route::middleware('user-level:admin')->group(function () {
        Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin');
        // MASTER
        // product
        Route::resource('/master/product', ProductController::class);
        Route::put('/master/product/{product:id}/nonaktif', [ProductController::class, 'nonaktif'])->name('master.product.nonaktif');
        Route::put('/master/product/{product:id}/aktif', [ProductController::class, 'aktif'])->name('master.product.aktif');
        // user
        Route::resource('/master/user', UserController::class);
        Route::put('/master/user/{user:id}/nonaktif', [UserController::class, 'nonaktif'])->name('master.user.nonaktif');
        Route::put('/master/user/{user:id}/aktif', [UserController::class, 'aktif'])->name('master.user.aktif');
        // resetPasswordUser
        // Route::put('/master/user/resetPassword/{user:id}', [UserController::class, 'resetPassword']);

        // ruangan 
        Route::resource('/master/ruangan', RuanganController::class);
        Route::put('/master/ruangan/{ruangan:id}/nonaktif', [RuanganController::class, 'nonaktif'])->name('master.ruangan.nonaktif');
        Route::put('/master/ruangan/{ruangan:id}/aktif', [RuanganController::class, 'aktif'])->name('master.ruangan.aktif');

        // orderan
        Route::resource('/orderan', OrderController::class);
        
        // ubahStock
        Route::get('/ubahStock',[UbahStockController::class,'index'])->name('ubahStock');
        Route::put('ubahStock/{product:id}/kurangi',[UbahStockController::class,'kurangi'])->name('ubahStock.kurangi');
        Route::put('ubahStock/{product:id}/tambahi',[UbahStockController::class ,'tambahi'])->name('ubahStock.tambahi');

        // laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::post('/laporan/bulan', [LaporanController::class, 'laporanByBulan'])->name('laporan.bulan');
        Route::post('/laporan/ruangan', [LaporanController::class, 'laporanByRuangan'])->name('laporan.ruangan');
        Route::get('/eksportLaporan',[LaporanController::class,'exportLaporan'])->name('eksportLaporan');
        Route::post('/bulananExcel',[LaporanController::class,'bulananExcel'])->name('bulananExcel');
        Route::post('/ruanganExcel',[LaporanController::class,'ruanganExcel'])->name('ruanganExcel');
    });

    // user
    Route::middleware('user-level:user')->group(function () {
        Route::get('/dashboardUser', [DashboardController::class, 'dashboardUser'])->name('dashboard.user');
        Route::get('/order', [OrderController::class, 'createOrder'])->name('user.createOrder');
        Route::post('/order', [OrderController::class, 'storeOrder'])->name('user.storeOrder');
        Route::get('/history', function () {
            $orders = Order::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
            return view('user.page.history',[
                'orders' => $orders,
                'title' => 'history'
            ]);
        })->name('user.history');
    });
});
