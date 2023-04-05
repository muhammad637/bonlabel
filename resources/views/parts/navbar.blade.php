  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
          <a href="#" class="logo d-flex align-items-center text-decoration-none">
              <img src="../assets/img/icon/RSUD-logo.png" alt="">
              <span class="d-lg-block">SiBONLABEL</span>
          </a>
      </div>
      <!-- End Logo -->
      {{-- pemanggilan table notifikasi --}}
      @php
          use App\Models\Notifikasi;
          $notifikasiCount = count(Notifikasi::where('user_id', auth()->user()->id)->get());
          $notifikasi = Notifikasi::where('user_id', auth()->user()->id)
              ->orderBy('created_at', 'desc')
              ->limit(3)
              ->get();
      @endphp
      <nav class="header-nav ms-auto ">
          <ul class="d-flex align-items-center">
              <li>
                  <div class="nav-item dropdown">
                      <a class="nav-link nav-icon text-decoration-none" href="#" data-bs-toggle="dropdown">
                          <i class="bi bi-bell"></i>
                          @if ($notifikasiCount > 0)
                        <span class="badge bg-primary badge-number">{{ $notifikasiCount }}</span>
                        @endif
                      </a>
                      <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-end notifications">
                          <li class="dropdown-header">
                            @if ($notifikasiCount > 0)
                            anda memiliki {{ $notifikasiCount }} notifikasi
                            @else                                  
                            notifikasi  masih kosong
                            @endif
                              <a href="/notifikasi" class="text-decoration-none">
                                  <span class="badge rounded-pill bg-primary p-2 ms-2">View all
                                  </span>
                              </a>
                          </li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          @foreach ($notifikasi as $n)
                              <li class="notification-item">
                                  <i
                                      class="bi {{ $n->status == 'gagal' ? 'bi-x-circle text-danger' : 'bi-check-circle text-success' }} "></i>
                                  <div>
                                      <h4>tabel {{ $n->nama_table }}</h4>
                                      <p>{{ $n->msg }}</p>
                                      <p>{{ $n->created_at->diffForHumans() }}</p>
                                  </div>
                              </li>
                              <li>
                                  <hr class="dropdown-divider">
                              </li>
                          @endforeach
                          @if ($notifikasiCount > 0)    
                          <li class="dropdown-footer">
                              <a href="/notifikasi/delete" class="btn btn-danger text-decoration-none text-white"><i class="bi bi-trash"></i> hapus semua</a>
                          </li>
                          @endif
                      </ul>
                  </div>
              </li>
              <li>
                <div class="nav-item dropdown">
                    <a class="nav-link nav-icon text-decoration-none" href="#" data-bs-toggle="dropdown">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-6 font-poppins">
                            {{auth()->user()->nama}} </span> <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                        </div>
                    </a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                      <div class="div">
                          <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                      </div>
                      {{ auth()->user()->nama }}
                      <br>
                      <span class="fw-bold">{{ auth()->user()->cekLevel }}</span>
                  </li>

                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="/profil">
                          <i class="bi bi-person"></i>
                          <span>My Profile</span>
                      </a>
                  </li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>
                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="/logout">
                          <i class="bi bi-box-arrow-right"></i>
                          <span>Sign Out</span>
                      </a>
                  </li>
              </ul>
            </li><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->
              <li class="nav-item mr-3 pe-4">
                  <i class="bi bi-list toggle-sidebar-btn"></i>
              </li>
          </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
