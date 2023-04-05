@section('container')
    <!doctype html>
    <html lang="en">

    {{-- tag head --}}
    @include('parts.head')

    <body>
        @include('parts.navbar')
        @if (auth()->user()->cekLevel== 'admin')
        @include('admin.parts.sidebar')
        @else
        @include('user.parts.sidebar')
        @endif

        <main id="main" class="main">

            <div class="pagetitle">
<<<<<<< HEAD
                <h1 class="mb-2 fs-2 font-poppins">Welcome {{auth()->user()->nama}}</h1>
=======
                <h1 class="mb-2 fs-2 font-poppins">Welcome to {{ auth()->user()->nama }}</h1>
>>>>>>> cce5509ac2618f8da5fa281e31279fd9cdedd7ca
                <nav class="shadow-sm bg-body rounded pt-2 px-2 " style="width: 98%;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-6"><a href="/dashboardAdmin" class="text-decoration-none">Home</a></li>
                        @yield('pagetitle')
                    </ol>
                </nav>
            </div>
            @yield('container')
        </main>
       
        <footer id="footer" class="mt-5">

<<<<<<< HEAD
            <div class="footer-top">
              <div class="px-5">
                <div class="row"  style="margin-bottom: 0;">
        
                  <div class="ps-5 col-lg-8 col-md-6 footer-contact">
                    <h3>SIBONLABEL</h3>
                    <p><strong>Alamat: </strong>
                      Jl. Letkol Istiqlah No.49, Singonegaran, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 6841
                       <br><br>
                      <br>
                      <br>
                    </p>
                  </div>
        
                  <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                  </div>
        
                  <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Contact Us</h4>
                    <ul>
                      <li><i class="bx"></i> <a href="#"><strong>Phone:<br></strong> (0333) 636780</a></li>
                      <li><i class="bx"></i> <a href="#"><strong>Email:<br></strong> poliwangi.ac.id</a></li>
                    </ul>
                  </div>
        
=======
          <div class="footer-top">
            <div class="px-5">
              <div class="row"  style="margin-bottom: 0;">
      
                <div class="ps-5 col-lg-8 col-md-6 footer-contact">
                  <h3>SIBONLABEL</h3>
                  <p><strong>Alamat: </strong>
                    Jl. Letkol Istiqlah No.49, Singonegaran, Kec. Banyuwangi, Kabupaten Banyuwangi, Jawa Timur 6841
                     <br><br>
                    <br>
                    <br>
                  </p>
>>>>>>> cce5509ac2618f8da5fa281e31279fd9cdedd7ca
                </div>
      
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Useful Links</h4>
                  <ul>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                  </ul>
                </div>
      
                <div class="col-lg-2 col-md-6 footer-links">
                  <h4>Contact Us</h4>
                  <ul>
                    <li><i class="bx"></i> <a href="#"><strong>Phone:<br></strong> (0333) 636780</a></li>
                    <li><i class="bx"></i> <a href="#"><strong>Email:<br></strong> poliwangi.ac.id</a></li>
                  </ul>
                </div>
      
              </div>
            </div>
          </div>
      
          <div class="container">
      
            <div class="copyright-wrap d-md-flex py-4">
              <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                  &copy; Copyright <strong><span>POLIWANGI</span></strong>. All Rights Reserved
                </div>
<<<<<<< HEAD
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="globe"><i class="bx bx-globe"></i></a>
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
=======
                <div class="credits">
                  <!-- All the links in the footer should remain intact. -->
                  <!-- You can delete the links only if you purchased the pro version. -->
                  <!-- Licensing information: https://bootstrapmade.com/license/ -->
                  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                  Designed by <a href="https://poliwangi.ac.id/">POLIWANGI STUDENT</a>
>>>>>>> cce5509ac2618f8da5fa281e31279fd9cdedd7ca
                </div>
              </div>
              <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
      
          </div>
        </footer><!-- End Footer -->
      
        




        {{--  tag script --}}
        @include('parts.script')

    </body>





    </html>
