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
                        <h3>{{ auth()->user()->cekLevel }}</h3>
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
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
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
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Ruangan</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->cekLevel }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No Telephone</div>
                                    <div class="col-lg-9 col-md-8">{{ auth()->user()->no_telephone }}</div>
                                </div>
                            </div>
                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="/user/{{ auth()->user()->id }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username"
                                                value="{{ auth()->user()->username }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" id="nama"
                                                value="{{ auth()->user()->nama }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Tempat
                                            Bekerja</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" id="company"
                                                value="RSUD Blambangan">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="cekLevel" class="col-md-4 col-lg-3 col-form-label">Ruangan</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="cekLevel" type="text" class="form-control" id="cekLevel"
                                                placeholder="{{ auth()->user()->cekLevel }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="no_telephone" class="col-md-4 col-lg-3 col-form-label">No.Telp /
                                            WA</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="no_telephone" type="text" class="form-control"
                                                id="no_telephone" value="{{ auth()->user()->no_telephone }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="/user/{{ auth()->user()->id }}/password" method="POST">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password
                                            Lama</label>
                                            {{-- <div id="testing"></div> --}}
                                        <div class="col-md-8 col-lg-9 position-relative">
                                            <input type="password" id="currentPassword" class="form-control">
                                            <div class="input-group-append">

                                                <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                                <span class="input-group-text position-absolute border-0 bg-transparent"
                                                    id="mybutton" 
                                                    style="width:40px; height: 30px; right: 2%; top: 25%">
                                                    <!-- icon mata bawaan bootstrap  -->
                                                    <i id="eye1" style="width: 30px; height: 30px;"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password
                                            Lama</label>
                                        <div class="col-md-8 col-lg-9 position-relative">
                                            <input type="password" id="newPassword" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text position-absolute border-0 bg-transparent"
                                                    id="mybutton2"
                                                    style="width:40px; height: 30px; right: 2%; top: 25%">
                                                    <i id="eye" style="width: 30px; height: 30px;"></i>
                                                </span>
                                            </div>
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
{{-- <script>
    // membuat fungsi change
    function change() {

        // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
        var cp= document.getElementById('currentPassword').type;
        var np= document.getElementById('newPassword').type;
        var svg = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;

        //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
        if (cp == 'password'  ) {

            //ubah form input password menjadi text
           cp = 'text';

            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                            </svg>`;
        } else {

            //ubah form input password menjadi text
            document.getElementById('currentPassword').type = 'password';

            //ubah icon mata terbuka menjadi tertutup
            document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                            </svg>`;
        }
    }
</script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready( function(){
        $('#iasd').html('simpan pinjam')
    })
</script> --}}