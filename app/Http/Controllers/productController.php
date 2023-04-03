<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;



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
                'datas' => Product::all()
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
        return response(view('admin.pages.Product.createProduct'));
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
            return response(redirect('/master/product'));
        } catch (\Exception $e) {
            return response($e->getMessage());
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
        return response(
            view(
                'admin.pages.Product.editProduct',
                [
                    'dataProduk' =>  $product,
                ]
            )
        );
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
        

       // dd($request['oldNameProduct']);
        try {
            //code...
            $validatedData = $request->validate(
                [
                    'limit_order' => 'required|min:1',
                    'nama_product' => ' required|'.Rule::unique('products')->ignore($product->id),
                    'jenis_product' => '',
                    'jumlah_stock' => '',
                ]
            );
            Product::where('id', $product->id)->update($validatedData);
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return response($e->getMessage());
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

        try {
            //code...
            $status_product = 'nonaktif';
            Product::where('id', $product->id)->update(['status' => $status_product]);
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }
    public function aktif(Product $product)
    {
        try {
            //code...
            $status_product = 'aktif';
            Product::where('id', $product->id)->update(['status' => $status_product]);
            return  redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            return  $e->getMessage();
        }
    }
}
