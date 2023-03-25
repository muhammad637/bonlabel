@extends('admin.index')

@section('container')
<form action="{{ route('product.store')}}" method="post" class="container m-4 p-5">
    @csrf
        <div class="mb-3">
          <label for="nama_product" class="form-label">Nama Product</label>
          <input type="text" class="form-control" id="nama_product" name="nama_product">
        </div>

        <div class="mb-3">
          <label for="jenis_product" class="form-label">Jenis Product</label>
          <input type="text" class="form-control" id="jenis_product" name="jenis_product">
        </div>

        {{-- <div class="mb-3">
          <label for="statusProduct" class="form-label">Status</label>
          <input type="text" class="form-control" id="statusProduct" name="statusProduct">
        </div> --}}


        <div class="mb-3">
          <label for="limit_order" class="form-label">Limit Order</label>
          <input type="number" class="form-control" id="limit_order" name="limit_order">
        </div>
        <div class="mb-3">
          <label for="jumlah_stock" class="form-label">jumlah Stock</label>
          <input type="number" class="form-control" id="jumlah_stock" name="jumlah_stock">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection