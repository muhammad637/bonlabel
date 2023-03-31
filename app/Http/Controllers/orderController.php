<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
            'orders' => Order::where('status', null)->orderBy('created_at', 'asc')->get(),
            'products' => Product::all(),
            'title' => 'Orderan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            if ($validatedData['jumlah_order'] > $productOrder->jumlah_stock) {
                # code...
                return "gagal karena melebihi kapasitas product $productOrder->nama_product = ". $productOrder->jumlah_stock;
            }
            Order::where('id', $request->order_id)->update($validatedData);
            Product::where('id', $request->product_id)->update(['jumlah_stock' => $sisa]);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return $th->getMessage();
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
