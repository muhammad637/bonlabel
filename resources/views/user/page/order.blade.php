@extends('user.index')
@section('pagetitle')
<li class="breadcrumb-item active fs-6">Order Produk</li>
@endsection
@section('container')
<section class="section dashboard">
    <h1>Order Produk</h1>

    <div class="row mb-3" >
        <div class="col-6">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Pilih Barang</label>
                <div class="col-sm-9">
                  <select class="form-select" aria-label="Default select example">
                    @foreach ($datas as $data)
                    <option selected>Pilih Produk</option>
                    <option value="1">{{ $data->nama_product }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
        </div>

        <div class="row mb-3">
          <label class="col-sm-3 col-form-label">Pilih Ruangan</label>
          <div class="col-sm-9">
            <select class="form-select" aria-label="Default select example">
              @foreach ($datas as $data)
              <option selected>Pilih Ruangan</option>
              <option value="1">{{ $data->nama_product }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-6">
            <form>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Jumlah</label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control">
                  </div>
                </div>
              </form>
        </div>
    </div>
        <button type="button" class="btn btn-success col-sm-2" style="
        width: 100px; height: 25;">Kirim</button>

   
    
      
    @endsection