<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ruangan;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
{
    // Logika controller Anda di sini

//     return response()
//         ->view('admin.dashboard')
//         ->header('refresh', '60'); // Refresh setiap 60 detik (1 menit)
 }
    //
    public function dashboardAdmin()
    {
        $userAktif = User::where('status', 'aktif')->count();
        $productAktif = Product::where('status', 'aktif')->count();
        $products = Product::all();
        $ruanganAktif = Ruangan::where('status', 'aktif')->count();
        $ordersTerakhir = Order::orderBy('updated_at', 'desc')->limit(10)->get();
        $aktif = [
            [
                'title' => 'User Aktif',
                'jumlah' => $userAktif,
                'route' => '/master/user'
            ],
            [
                'title' => 'Produk Aktif',
                'jumlah' => $productAktif,
                'route' => '/master/product'
            ],
            [
                'title' => 'Ruangan Aktif',
                'jumlah' => $ruanganAktif,
                'route' => '/master/ruangan'
            ]
        ];
        return view('admin.pages.dashboard', [
            // 'userAktif' => $userAktif,
            // 'productAktif' => $productAktif,
            'products' => $products,
            'aktif' => $aktif,
            'orders' => $ordersTerakhir,
            'title' => 'dashboard'

        ]);
        
    }
    public function dashboardUser()
    {
        $products = Product::all();
        $orders = Order::where('user_id',auth()->user()->id)->latest()->get();
        // Carbon::parse();

        return view('user.page.dashboard', [
            'title'=>'dashboard',
            'products' => $products,
            'orders' => $orders
        ]);
    }
}
