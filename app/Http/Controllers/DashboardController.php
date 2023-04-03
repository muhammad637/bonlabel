<?php

namespace App\Http\Controllers;

use App\Events\NotificationContent;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    //
    public function dashboardAdmin()
    {
        $userAktif = User::where('status', 'aktif')->count();
        $productAktif = Product::where('status', 'aktif')->count();
        $products = Product::all();
        $ruanganAktif = Ruangan::where('status', 'aktif')->count();
        $ordersTerakhir = Order::orderBy('updated_at', 'desc')->limit(5)->get();
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
        $userAktif = User::where('status', 'aktif')->count();
        $productAktif = Product::where('status', 'aktif')->count();
        $products = Product::all();
        $ruanganAkif = Ruangan::where('status', 'aktif')->count();

        return view('user.page.dashboard', [
            'title'=>'dashboard'
        ],compact('userAktif', 'productAktif', 'products', 'ruanganAkif'));
    }

    public function tesnotifikasi(){
        event(new NotificationContent('testing pusher'));
    }
}
