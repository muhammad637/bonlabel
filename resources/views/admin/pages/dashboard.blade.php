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
                <h1 class="fw-bold">Daftar Produk</h1>
                @foreach ($products as $product)
                    <!-- Product Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->nama_product }}</h5>
                                <div class="ps-3">
                                    <span>Stock :</span>
                                    <h6 class="size-number">{{ $product->jumlah_stock }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Card -->
                @endforeach

                <div class="col-12 mt-5">
                    <div class="row text-center">
                        @foreach ($aktif as $item)
                        <div class="col-md-4">
                            <div class="card info-card sales-card shadow">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold text-dark">
                                        {{$item['title']}}
                                    </h5>
                                    <h1 class="color-primary fs-2 fw-bold">{{$item['jumlah']}}</h1>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">List Order terakhir user</h5>

                            <table class="table table-stripe">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row"><a href="#">{{$loop->iteration}}</a></th>
                                        <td>{{$order->user->nama}}</td>
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
