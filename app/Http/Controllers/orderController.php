<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Ruangan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Exports\OrdersExport;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\ValidatedData;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.pages.Order.listOrder', [
            'orders' => Order::where('status', null)->orderBy('updated_at', 'desc')->get(),
            'products' => Product::all(),
            'title' => 'Orderan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  USER
    public function createorder()
    {
        // return  Ruangan::where('user_id',auth()->user()->id)->get();
        return view('user.page.order', [
            'products' => Product::all(),
            'title' => 'createOrder',
            'ruangans' => Ruangan::where('user_id', auth()->user()->id)->get()
        ]);
    }
    public function storeOrder(Request $request)
    {
        $notif = Notifikasi::notif('order', 'berhasil mengorder', 'tambah', 'berhasil');

        // mengirim Notifikasi pada setiap admin
        // ambil data admin
        $userAdmin = User::where('cekLevel', 'admin')->get();
        $notif['userId'] = $userAdmin[0]->id;

        try {
            //validasi data update
            $validatedData = $request->validate([
                'user_id' => '',
                'product_id' => '',
                'jumlah_order' => '',
                'ruangan_id' => ''
            ]);
            // ambil data product
            $produk = Product::where('id', $validatedData['product_id'])->first();

            // isi user dengan user yang login
            $validatedData['user_id'] = auth()->user()->id;

            // gagal update apabila jumlah order melebihi limit
            if ($validatedData['jumlah_order'] > $produk->limit_order) {
                # code...
                $notif['msg'] = "jumlah order melebihi limit";
                $notif['status'] = "gagal";
                Notifikasi::create($notif);
                return redirect()->back()->with('toast_error', $notif['msg']);
            }
            // create order dan notifikasi
            Order::create($validatedData);
            Notifikasi::create($notif);
            $notif['msg'] = auth()->user()->nama . " mengorder produk " . $produk->nama_product . ' - ' . $produk->jenis_product;
            foreach ($userAdmin as $admin) {
                $notif['user_id'] = $admin->id;
                Notifikasi::create($notif);
            }
            return redirect()->back()->with('toast_success', 'berhasil merngorder produk');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('toast_error', $th->getMessage());
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        return view('coba');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        $userAdmin = User::where('cekLevel', 'admin')->get();
        try {
            //code...

            // ambil data order
            $dataOrder = Order::where('id', $request->order_id)->first();
            if ($request->pesan)
                $pesanOrder = Order::aksiOrderan($dataOrder->user->nama, $request->pesan);
            else {
                $pesanOrder = Order::aksiOrderan($dataOrder->user->nama);
            }

            // value request
            $value = [
                'product_id' => $request->product_id,
                'jumlah_order' => $request->jumlah_order,
                'status' => $request->status,
                'pesan' => $pesanOrder
            ];

            // ambil product order buat update jumlah stock
            $productOrder = Product::where('id', $request->product_id)->first();
            $sisa =  $dataOrder->product->jumlah_stock - $request->jumlah_order;
            // proses update order
            Order::where('id', $request->order_id)->update($value);
            // ambil order data yang sudah diupdate
            $orderGet = Order::where('id', $request->order_id)->first();
            $nama_product = $orderGet->product->nama_product;
            $jenis_product = $orderGet->product->jenis_product;
            $namaUser = $orderGet->user->nama;
            $msg = "$namaUser | jenis product: $nama_product - $jenis_product berhasil diupdate by " . auth()->user()->nama;
            // pemanggilan fungsi notif di class Notifikasi
            $notif = Notifikasi::notif('order', $msg, 'update', 'berhasil');
            // proses update jumlah product
            Product::where('id', $request->product_id)->update(['jumlah_stock' => $sisa]);
            // memberi pesan notifikasi kepada semua admin
            foreach ($userAdmin as $admin) {
                $notif['user_id'] = $admin->id;
                Notifikasi::create($notif);
            }
            // memberi pesan notifikasi kepada USER yang order
            $notif['user_id'] = $dataOrder->user->id;
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success', 'orderan berhasil dipdate');
        } catch (\Throwable $th) {
            //throw $th;
            # code..
            return $th->getMessage();
            $notif['msg'] =  "gagal karena melebihi kapasitas product";
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            $productOrder->jumlah_stock;
            return redirect()->back()->with('toast_error', $notif['msg'])->with('toast_error', 'data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
