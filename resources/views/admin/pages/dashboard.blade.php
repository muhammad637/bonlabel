@extends('admin.index')
@section('pagetitle')
    <li class="breadcrumb-item active fs-6">Dashboard</li>
@endsection
@section('container')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <!-- <div class="col-lg-8"> untuk memperkecil body-->
            <div class="row">
                <h1 class="fw-bold font-poppins">Daftar Produk</h1>
                @foreach ($products as $product)
                    <!-- Product Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card shadow">
                            <div class="card-body">
                                <h5 class="fs-3 font-poppins color-primary fw-bold mt-3">{{ $product->nama_product }}</h5>
                                <h5 class="fs-6 color-primary font-poppins fw-semibold mb-n3">{{ $product->jenis_product }}
                                </h5>
                                <div class="row ">
                                    <div class="col-md-6 col-12"></div>
                                    <div class="col-md-6 col-12">
                                        <h5 class="color-primary font-poppins">stock</h5>
                                        <div class="size-number font-poppins mb-n3">{{ $product->jumlah_stock }}</div>
                                    </div>
                                </div>
                                <div class="">
                                    <h5 class="color-primary font-poppins">limit order : {{$product->limit_order}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Card -->
                @endforeach

                <div class="col-12 mt-5">
                    <div class="row text-center">
                        @foreach ($aktif as $item)
                            <a href="{{ $item['route'] }}" class="col-md-4">
                                <div class="card info-card sales-card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-dark fs-3">
                                            {{ $item['title'] }}
                                        </h5>
                                        <h1 class="color-primary size-number fw-bold">{{ $item['jumlah'] }}</h1>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="fs-2 fw-bold font-poppins mt-2">List Order terakhir user</h5>
                            <hr class="mb-n2">

                            <table class="table table-stripe font-poppins ">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                            <td>{{ $order->user->nama }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
            <!-- </div>End Left side columns -->

            <!-- Right side columns -->

        </div>
    </section>
@endsection
