<!-- ======= Header ======= -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center text-decoration-none">
            <img src="../assets/img/icon/RSUD-logo.png" alt="">
            <span class="d-lg-block" id="title-job">SiBONLABEL</span><br>
        </a>
    </div>

    <!-- End Logo -->
    {{-- pemanggilan table notifikasi --}}
    @php
        use App\Models\User;
        $notifikasiCount = count(User::with('notifikasi')
            ->where('id', auth()->user()->id)
            ->first()
            ->notifikasi
            ->where('mark','false')
        );
        // $notifikasiCount = 5
    @endphp
    <nav class="header-nav ms-auto ">
        <ul class="d-flex align-items-center">
            <li>
                <div class="nav-item dropdown">
                    <button class="nav-link nav-icon text-decoration-none" data-bs-toggle="dropdown" id="get-data">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number" id="notif-number">{{ $notifikasiCount }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-arrow dropdown-menu-end notifications">
                        <div id="data">
                        </div>
                    </ul>
                </div>
            </li>
            <li>
                <div class="nav-item dropdown">
                    <a class="nav-link nav-icon text-decoration-none" href="#" data-bs-toggle="dropdown">
                        <div class="d-flex align-items-center gap-2">
                            <span class="fs-6 font-poppins d-none d-lg-block">
                                {{ auth()->user()->nama }} </span> <i class="bi bi-person-circle"
                                style="font-size: 25px;"></i>
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
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <a class="dropdown-item d-flex align-items-center" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </ul>
            </li>
            </li><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
            <li class="nav-item mr-3 pe-4" id="hum-menu">
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </li>
        </ul>
    </nav><!-- End Icons Navigation -->
    <script>
        setTimeout(function() {
          location.reload();
        }, 1000 * 60 * 3); // Refresh setiap 3000 detik (5 menit)
    </script>

    <script>
         
        $(document).ready(function() {
        
           $('#get-data').click(function() {
                $.ajax({
                    url: '{{ route('notifi') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // tampilkan data pada halaman
                        console.log(data)
                        $('#data').empty()
                        $('#data').html(`
                        <li class="dropdown-header">
                            pesan terakhir
                                <a href="/notifikasi" class="text-decoration-none">
                                    <span class="badge rounded-pill bg-primary p-2 ms-2">View all
                                    </span>
                                </a>
                            </li>
                            <li>
                            <hr class="dropdown-divider"></hr>
                                </li>
                        `)
                        if(data.length == 0 ) $('#data').append(`<li class="notification-item"> <h4 class="mx-auto text-center mt-2">pesan kosong</h4></li>`)
                        else{
                            $.each(data, async function(index, item) {
                                if (index < 3) {
                                    var row = $('<li>').addClass('notification-item px-1');
                                    if (await item.status == 'berhasil') {
                                        var i = $('<i>').addClass('bi bi-check-circle text-success')
                                    } else {
                                        var i = $('<i>').addClass('bi bi-x-circle text-danger')
                                    }
                                    var div = $('<div>').css('cursor','pointer')
                                    var h4 = $('<h4>').addClass('').text("tabel " + await item
                                        .nama_table);
                                    var p = $('<p>').addClass('font-poppins').text(await item.msg);
                                    var hr = $('<hr>').addClass('dropdown-divider');
                                    div.append(h4, p)
                                    row.append(i, div)
                                    $('#data').append(row, hr)
                                }
                            })
                        }

                        $('#notif-number').html('0')

                    },
                    error: function(data) {
                        // tampilkan pesan error pada halaman
                        console.log(data)
                    }
                });
            });
        });
    </script>

</header>
