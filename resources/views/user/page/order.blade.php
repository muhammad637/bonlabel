@extends('pages.index')
@section('pagetitle')
    <li class="breadcrumb-item active fs-6">Order Produk</li>
@endsection
@section('container')
    <section class="section dashboard font-poppins">
        <h1 class="font-poppins text-uppercase my-5">Order Produk</h1>
        @if (count($ruangans) < 1)
            <h1>maaf anda tidak bisa order karena anda tidak memiliki ruangan</h1>
        @else
            <form action="{{route('user.storeOrder')}}" class="my-2 mb-5" method="post">
                @csrf
                <div class="row row-gap-2">
                    <div class="col-md-9">
                        <div class="mb-1">
                            <label for="product_id" class="form-label fw-bold ">Pilih produk</label>
                            <select name="product_id" id="product_id" class="form-select">
                                @foreach ($products as $prod)
                                    <option value="{{ $prod->id }}">{{ $prod->nama_product }} || {{ $prod->jenis_product }} || limit order : {{$prod->limit_order}} {{$prod->satuan}}</option>
                                    <
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-1">
                            <label for="jumlah_order" class="form-label fw-bold">Jumlah Order</label>
                            <input type="number" min="1" id="jumlah_order" name="jumlah_order" class="form-control"> 
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="mb-1">
                            <label for="ruangan_id" class="form-label fw-bold">Pilih Ruangan</label>
                            <select name="ruangan_id" id="ruangan_id" class="form-select">
                                @foreach ($ruangans as $ruang)
                                    @if ($ruang->status == 'nonaktif')
                                        <option value="{{ $ruang->id }}" disabled>{{ $ruang->nama_ruangan }}</option>
                                        
                                    @else
                                        <option value="{{ $ruang->id }}">{{ $ruang->nama_ruangan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-5" type="submit"> kirim </button>
            </form>
        @endif
    @endsection
