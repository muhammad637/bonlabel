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
                <h1 class="fw-bold font-poppins color-black">Daftar Produk</h1>
                @foreach ($products as $product)
                    <!-- Product Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div data-aos="zoom-in-left">
                            <div class="card info-card sales-card shadow">
                                <div class="card-body">
                                    <h5 class="fs-3 font-poppins color-primary fw-bold mt-3">{{ $product->nama_product }}
                                    </h5>
                                    <h5 class="fs-6 color-primary font-poppins fw-semibold mb-n3">
                                        {{ $product->jenis_product }}
                                    </h5>
                                    <div class="row ">
                                        <div class="col-md-6 col-12"></div>
                                        <div class="col-md-6 col-12">
                                            <h5 class="color-primary font-poppins">stock</h5>
                                            {{-- <div class="size-number font-poppins mb-n3 color-black">{{ $product->jumlah_stock }}</div> --}}
                                            <span class="color-black size-number  font-poppins mb-n3 purecounter"
                                                data-purecounter-start="0"
                                                data-purecounter-end="{{ $product->jumlah_stock }}"
                                                data-purecounter-duration="1"></span>
                                        </div>
                                    </div>
                                    <div class="">

                                        <h5 class="color-primary font-poppins">limit order :
                                            <span class="  font-poppins mb-n3 purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $product->limit_order }}"
                                                data-purecounter-duration="1"></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Card -->
                @endforeach

                <div class="col-12 mt-5">
                    <div class="row text-center font-poppins">
                        @foreach ($aktif as $item)
                            <a href="{{ $item['route'] }}" class="col-md-4">
                                <div data-aos="zoom-out-up">
                                    <div class="card info-card sales-card shadow">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-dark fs-3">
                                                {{ $item['title'] }}
                                            </h5>
                                            <span class="color-primary size-number fw-bold purecounter"
                                                data-purecounter-start="0" data-purecounter-end="{{ $item['jumlah'] }}"
                                                data-purecounter-duration="1"></span>
                                        </div>
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

                            @if (count($orders) < 1)
                            <h1 class="fs-5 font-poppins text-secondary">orderan masih kosong</h1> 
                            @else
                                <table class="table table-stripe font-poppins ">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Ruangan</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">jumlah order</th>
                                            <th scope="col">status</th>
                                            <th scope="col">tanggal order</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $order->ruangan->nama_ruangan }}</td>
                                                <td>{{ $order->product->nama_product }}</td>
                                                <td>{{ $order->jumlah_order }}</td>
                                                <td>
                                                <div class="badge {{ !$order->status ? 'bg-warning' : ($order->status == 'terima' ? 'bg-success' : 'bg-danger')  }}" >
                                                    {{ $order->status ?? 'pending'  }}
                                                </div>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-M-d') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>

                    </div>
                </div><!-- End Recent Sales -->

            </div>
            <!-- </div>End Left side columns -->

            <!-- Right side columns -->

        </div>
    </section>
@endsection
