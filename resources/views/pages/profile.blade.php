@extends('pages.index')
@section('pagetitle')
<li class="breadcrumb-item active fs-6">Profile</li>
@endsection
@section('container')

    <section class="section profile font-poppins">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <div class="rounded-circle">
                    <i class="bi bi-person-circle" style="font-size: 100px;"></i>
                  </div>
              <h2>{{ auth()->user()->nama }}</h2>
              <h3>{{ auth()->user()->cekLevel}}</h3>
              <div class="social-links mt-2">
                <a href="" class="facebook"><i class="bi bi-whatsapp"></i></a>
                <a href="#" class="instagram"><i class="bi bi-envelope-at"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">ubah
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Detail Profil</h5>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Name</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->nama }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->username }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->status }}</div>
                  </div>
                  @if(auth()->user()->cekLevel === 'user')
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Ruangan</div>
                    <div class="col-lg-9 col-md-8">
                    @foreach ( auth()->user()->ruangan as $r)
                        {{$r->nama_ruangan }}
                    @endforeach</div>
                  </div>
                  @endif
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No Telephone</div>
                    <div class="col-lg-9 col-md-8">{{ auth()->user()->no_telephone }}</div>
                  </div>
                </div>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="/user/{{auth()->user()->id}}" method="POST">
                    @csrf
                    <div class="row mb-3">
                      <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" id="username" value="{{ auth()->user()->username }} "readonly disabled>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="{{ auth()->user()->nama }}">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Tempat Bekerja</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="text" class="form-control" id="company" readonly disabled
                          value="RSUD Blambangan">
                      </div>
                    </div>
                    @if(auth()->user()->cekLevel === 'user')
                    <div class="row mb-3">
                      <label for="ruangan" class="col-md-4 col-lg-3 col-form-label">Ruangan</label>
                      <div class="col-md-8 col-lg-9">
                          @if (count(auth()->user()->ruangan) > 0)
                              @foreach ( auth()->user()->ruangan as $r )
                                {{ $r->nama_ruangan }}
                              @endforeach
                          @endif
                      </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                      <label for="no_telephone" class="col-md-4 col-lg-3 col-form-label">No.Telp / WA</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="no_telephone" type="text" name="no_telephone" class="form-control" id="no_telephone" value="{{ auth()->user()->no_telephone }}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>
                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form action="/user/{{auth()->user()->id}}/password" method="POST">
                  @csrf
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection


  

  <!-- Vendor JS Files -->
  