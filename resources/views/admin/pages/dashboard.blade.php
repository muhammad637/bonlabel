@extends('admin.index')

@section('container')
    <div class="pagetitle">
      <h1>Welcome to Admin </h1>
      <nav class="shadow-sm bg-body rounded" style="width: 98%;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <!-- <div class="col-lg-8"> untuk memperkecil body-->
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card shadow">
                <div class="card-body">
                  <h5 class="card-title">Nama Produk</h5>
                  <div class="d-flex align-items-center">
                   
                    <div class="ps-3">
                      <span>Stock :</span>
                      <h6>500</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

             <!-- Sales Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card shadow">
                <div class="card-body">
                  <h5 class="card-title">Nama Produk</h5>
                  <div class="d-flex align-items-center">
                   
                    <div class="ps-3">
                      <span>Stock :</span>
                      <h6>500</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->
              <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card shadow">
                  <div class="card-body">
                    <h5 class="card-title">Nama Produk</h5>
                    <div class="d-flex align-items-center">
                     
                      <div class="ps-3">
                        <span>Stock :</span>
                        <h6>500</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- End Sales Card -->
                  <!-- Sales Card -->
                  <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card shadow">
                      <div class="card-body">
                        <h5 class="card-title">Ruangan Aktif</h5>
                        <div class="d-flex align-items-center">
                          <div class="ps-3">
                            <h6>500</h6>
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
                        <h6>500</h6>
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
                            <h6>500</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Sales Card -->

            <!-- Recent Sales -->
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
                      <tr>
                        <th scope="row"><a href="#">1</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">2</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">3</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">4</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">5</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">6</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">7</a></th>
                        <td>Brandon Jacob</td>
                      </tr>
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
