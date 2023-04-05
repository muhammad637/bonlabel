<?php

namespace App\Http\Controllers;

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
        return view('user.page.order',[
            'products' => Product::all(),
            'title' => 'createOrder',
            'ruangans' => Ruangan::where('user_id',auth()->user()->id)->get()
        ]);
    }
    public function storeOrder(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => '',
            'product_id' => '',
            'jumlah_order' => '',
            'ruangan_id' => ''
        ]);
        $produk = Product::where('id',$validatedData['product_id'])->first();
        $validatedData['user_id'] = auth()->user()->id;
        if ($validatedData['jumlah_order'] > $produk->limit_order) {
            # code...
            return "jumlah order melebihi limit";
        }
        Order::create($validatedData);
        return redirect()->back();
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
            if ($validatedData['jumlah_order'] > $productOrder->jumlah_stock) {
                # code..
                $notif['msg'] =  "gagal karena melebihi kapasitas product";
                $notif['status'] = 'gagal';
                Notifikasi::create($notif);
                $productOrder->jumlah_stock;
                return redirect()->back()->with('toast_error',$notif['msg'])->with('toast_error','data gagal diupdate');
            }
            Order::where('id', $request->order_id)->update($validatedData);
            Product::where('id', $request->product_id)->update(['jumlah_stock' => $sisa]);
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_success',$notif['msg']);
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


    //user
    // public function indexuser()
    // {
    //     //

    //     return view('user.page.order',[
    //         'orders' => Order::all(),
    //         'title' => 'Orderan'
    //     ]);
    // }
}
