<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    //
    public function dashboardAdmin(){
        $userAktif = User::where('status', 'aktif')->count();
        $productAktif = Product::where('status','aktif')->count();
        $products = Product::all();
        $ruanganAkif = Ruangan::where('status','aktif')->count();
        return view('admin.pages.dashboard',[
            'userAktif' => $userAktif,
            'productAktif'=>$productAktif,
            'products' => $products,
            'ruanganAktif' => $ruanganAkif
        ]);
    }
}
