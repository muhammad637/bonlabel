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

    //  user
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
        $userAdmin = User::where('cekLevel','admin')->get();
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
                $notif['msg'] = "jumlah order melebihi limit" ;
                $notif['status'] = "gagal";
                Notifikasi::create($notif);
                return redirect()->back()->with('toast_error', $notif['msg']);
            }
            // create order dan notifikasi
            Order::create($validatedData);
            Notifikasi::create($notif);
            $notif['msg'] = auth()->user()->nama." mengorder produk "  ;
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

        // dd($order->order_id);
        //code...
        $notif = Notifikasi::notif('order', 'data order berhasil diupdate', 'update', 'berhasil');
        $userAdmin = User::where('cekLevel','admin')->get();
        try {
            //code...
            $dataOrder = Order::where('id', $request->order_id)->first();
            $productOrder = Product::where('id', $request->product_id)->first();
            $sisa =  $dataOrder->product->jumlah_stock - $request->jumlah_order;
            $validatedData = $request->validate(
                [
                    'product_id' => '',
                    'jumlah_order' => '',
                    'status' => '',
                ]
            );
            Order::where('id', $request->order_id)->update($validatedData);
            Product::where('id', $request->product_id)->update(['jumlah_stock' => $sisa]);
            $notif['user_id'] = $dataOrder->user->id;
            $notif['msg'] = 'data berhasil di update oleh admin '. auth()->user()->nama;
            Notifikasi::create($notif);
            foreach ($userAdmin as $admin) {
                $notif['user_id'] = $admin->id;
                Notifikasi::create($notif);
            }
            return redirect()->back()->with('toast_success', 'orderan berhasil dipdate');
        } catch (\Throwable $th) {
            //throw $th;
                # code..
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
