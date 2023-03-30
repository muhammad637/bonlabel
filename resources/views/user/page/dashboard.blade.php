@extends('user.index')
@section('pagetitle')
<li class="breadcrumb-item active fs-5">Dashboard</li>
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
              <div class="col-xxl-4 col-md-6">
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
                  <!-- Sales Card -->
                  <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card shadow">
                      <div class="card-body">
                        <h5 class="card-title">Ruangan Aktif</h5>
                        <div class="d-flex align-items-center">
                          <div class="ps-3">
                            <span>Stock :</span>
                            <h6>{{$ruanganAkif}}</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Sales Card -->
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card shadow">
                  <div class="card-body">
                    <h5 class="card-title">User Aktif</h5>
                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <span>Stock :</span>
                        <h6>{{$userAktif}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Sales Card -->
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card shadow">
                  <div class="card-body">
                    <h5 class="card-title">Produk Aktif</h5>
                    <div class="d-flex align-items-center">
                      <div class="ps-3">
                        <span>Stock :</span>
                        <h6>{{$productAktif}}</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Sales Card -->
          </div>
        <!-- </div>End Left side columns -->

        <!-- Right side columns -->

      </div>
    </section>
@endsection