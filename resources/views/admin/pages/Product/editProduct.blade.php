@extends('admin.index')

@section('container')
<form action="/product/{{$dataProduk->id}}" method="post" class="container m-4 p-5">
    @method('put')
    @csrf
        <div class="mb-3">
          <label for="nama_product" class="form-label">Nama Product</label>
          <input type="hidden" class="form-control" id="oldNameProduct" name="oldNameProduct" value="{{$dataProduk->nama_product}}">
          <input type="text" class="form-control" id="nama_product" name="nama_product" value="{{$dataProduk->nama_product}}">
        </div>

        <div class="mb-3">
          <label for="jenis_product" class="form-label">Jenis Product</label>
          <input type="text" class="form-control" id="jenis_product" name="jenis_product" value="{{$dataProduk->jenis_product}}">
        </div>

        <div class="mb-3">
          <label for="limit_order" class="form-label">Limit Order</label>
          <input type="number" class="form-control" id="limit_order" name="limit_order" value="{{$dataProduk->limit_order}}">
        </div>
        <div class="mb-3">
          <label for="jumlah_stock" class="form-label">jumlah Stock</label>
          <input type="number" class="form-control" id="jumlah_stock" name="jumlah_stock" value="{{$dataProduk->jumlah_stock}}">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection