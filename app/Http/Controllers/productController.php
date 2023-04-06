<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response(
            view('admin.pages.Product.listProduct', [
                'datas' => Product::all(),
                'title' => 'produk'
            ])
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return response(view('admin.pages.Product.createProduct'));
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
        $notif = Notifikasi::notif('produk', 'data produk berhasil ditambahkan', 'tambah', 'berhasil');
        try {
            $validatedData = $request->validate(
                [
                    'limit_order' => 'min:1',
                    'nama_product' => 'required |unique:App\Models\Product,nama_product',
                    'jenis_product' => 'required',
                    'jumlah_stock' => '',
                ]
            );
            Product::create($validatedData);
            Notifikasi::create($notif);
            return redirect('/master/product')->with('toast_success', $notif['msg']);
        } catch (\Throwable $th) {
            //throw $th;
            $notif['msg'] = $th->getMessage();
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_error',$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return response(
        //     view(
        //         'admin.pages.Product.editProduct',
        //         [
        //             'dataProduk' =>  $product,
        //         ]
        //     )
        // );
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $notif = Notifikasi::notif('produk', 'data produk berhasil diupdate', 'update', 'berhasil');

        //code...
        $validatedData = $request->validate(
            [
                'limit_order' => 'required|min:1',
                'nama_product' => ' required|' . Rule::unique('products')->ignore($product->id),
                'jenis_product' => '',
                'jumlah_stock' => '',
            ]
        );
            
        Product::where('id', $product->id)->update($validatedData);
        Notifikasi::create($notif);
        return redirect()->back()->with('toast_success', $notif['msg']);
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            $notif['msg'] = 'data produk gagal diupdate';
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            return redirect()->back()->with('toast_error', $notif['msg']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return response();
    }
    public function nonaktif(Product $product)
    {
        //code...
        $notif = Notifikasi::notif('produk', 'produk ' . $product->nama_product . ' berhasil dinonaktifkan', 'nonaktif', 'berhasil');
        $status = 'nonaktif';
        Notifikasi::create($notif);
        Product::where('id', $product->id)->update(['status' => $status]);
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
    public function aktif(Product $product)
    {
        $tb = 'produk';
        $notif = Notifikasi::notif($tb, 'produk ' . $product->nama_product . ' berhasil diaktifkan', 'aktif', 'berhasil');
        $status = 'aktif';
        Notifikasi::create($notif);
        Product::where('id', $product->id)->update(['status' => $status]);
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
}
