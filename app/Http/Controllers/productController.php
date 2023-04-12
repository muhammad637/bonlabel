<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                'datas' => Product::orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get(),
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
        //membuat notifikasi
        $notif = Notifikasi::notif('produk', 'data produk berhasil ditambahkan', 'tambah', 'berhasil');
        // validasi requestan
        $validatedData = validator::make($request->all(), [
            'limit_order' => 'required|min:1',
            'nama_product' => 'required |unique:products',
            'jenis_product' => 'required',
            'jumlah_stock' => 'required|min:1',
        ]);
        // jika requestan tidak falid 
        if ($validatedData->fails()) {
            $notif['msg'] = "produk $request->nama - $request->jenis_product gagal dimasukkan by " . auth()->user()->nama;
            $notif['status'] = 'gagal';
            Notifikasi::create($notif)->user()->sync(User::adminId());
            return redirect()
                ->back()
                ->with('toast_error', $notif['msg'])
                ->withErrors($validatedData)
                ->withInput();
        }


        try {
            // membuat pesan pada produk
            $notif['msg'] = "produk : $request->nama_product - $request->jenis_product ditambahkan by " . auth()->user()->nama;
            // membuat data pesan pada semua admin
            Notifikasi::create($notif)
                ->user()->sync(User::adminId());
            // proses membuat product
            Product::create($validatedData->validate());
            return redirect('/master/product')->with('toast_success', $notif['msg']);
        } catch (\Throwable $th) {
            // peanganan jika error pada column tabel 
            return redirect()->back()->with('toast_error', $th->getMessage());
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
        $notif = Notifikasi::notif('produk', ' ', 'update', 'berhasil');
        $validatedData = validator::make($request->all(), [
            'limit_order' => 'required|min:1',
            'nama_product' => 'required |' . Rule::unique('products')->ignore($product->id),
            'jenis_product' => 'required',
            'jumlah_stock' => 'required|min:1',
        ]);
        if ($validatedData->fails()) {
            $notif['msg'] = "produk $product->nama_product - $product->jenis_product gagal diupdate";
            $notif['status'] = 'gagal';
            Notifikasi::create($notif);
            $notifAkhir = Notifikasi::latest()->first();
            $admin = User::where('id', auth()->user()->id)->first();
            $notifAkhir->user()->attach($admin->id);
            return redirect()
                ->back()
                ->with('toast_error', $notif['msg'])
                ->withErrors($validatedData)
                ->withInput();
        }

        //code...

        try {
            $prod = Product::where('id', $product->id)->first();
            $prod->update($validatedData->validate());
            $notif['msg'] = "produk $prod->nama_product - $prod->jenis_product berhasil di update by " . auth()->user()->nama;
            Notifikasi::create($notif)
                ->user()->sync(User::adminId());
            return redirect()->back()->with('toast_success', $notif['msg']);
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
        $notif = Notifikasi::notif('produk', 'produk ' . $product->nama_product . 'dinonaktifkan by ' . auth()->user()->nama, 'nonaktif', 'berhasil');
        $status = 'nonaktif';
        Notifikasi::create($notif)
            ->user()->sync(User::adminId());
        Product::where('id', $product->id)->update(['status' => $status]);
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
    public function aktif(Product $product)
    {
        $notif = Notifikasi::notif('produk', 'produk ' . $product->nama_product . ' diaktifkan by ' . auth()->user()->nama, 'aktif', 'berhasil');
        $status = 'aktif';
        Notifikasi::create($notif)
            ->user()->sync(User::adminId());
        Product::where('id', $product->id)->update(['status' => $status]);
        return redirect()->back()->with('toast_success', $notif['msg']);
    }
}
