@extends('user.index')
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
                                      <h5 class="fs-6 color-primary font-poppins fw-semibold ">
                                          {{ $product->jenis_product }}
                                      </h5>
                                      <div class="row ">
                                          <div class="col-md-6 col-12"></div>
                                          <div class="col-md-6 col-12">
                                              <h5 class="color-primary font-poppins">stock</h5>
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

                  

                  <div class="col-12">
                      <div class="card recent-sales overflow-auto">

                          <div class="card-body">
                              <h5 class="fs-2 fw-bold font-poppins mt-2">List Order terakhir user</h5>
                              <hr class="mb-n2">

                              <table class="table table-stripe font-poppins ">
                                  <thead>
                                      <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">Nama Produk</th>
                                          <th scope="col">Nama Ruangan</th>
                                          <th scope="col">Jumlah Order</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($orders as $order)
                                          <tr>
                                              <th scope="row">{{ $loop->iteration }}</th>
                                              <td>{{ $order->product->nama_product }}</td>
                                              <td>{{ $order->ruangan->nama_ruangan }}</td>
                                              <td>{{ $order->jumlah_order }}</td>
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
