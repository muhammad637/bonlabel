<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UbahStockController extends Controller
{
    //
    public function index(){
        return view('admin.pages.ubahStock.index',[
            'products' => Product::orderBy('created_at','desc')->get(),
            'title'=> 'ubahStock' 
        ]);
    }
    public function kurangi(Product $product, Request $request){
        $notif = Notifikasi::notif('produk', 'jumlah stock produk berhasil berkurang', 'update', 'berhasil');
        try {
            //code...
            $product->update(['jumlah_stock' => $product->jumlah_stock - $request->jumlah_stock]);
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success', $notif['msg']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error',$th->getMessage());
        }
    }
    public function tambahi(Product $product, Request $request){
        $notif = Notifikasi::notif('produk', 'jumlah stock produk berhasil bertambah', 'update', 'berhasil');
        try {
            //code...
            $product->update(['jumlah_stock' => $product->jumlah_stock + $request->jumlah_stock]);
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success', $notif['msg']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error',$th->getMessage());
        }
    }
}
