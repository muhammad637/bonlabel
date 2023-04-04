@section('container')
    <!doctype html>
    <html lang="en">

    {{-- tag head --}}
    @include('admin.parts.head')

    <body>
        @include('admin.parts.navbar')
        @include('admin.parts.sidebar')
        <main id="main" class="main">
            <div class="pagetitle">
                <h1 class="mb-2 fs-2 font-poppins">Welcome to {{auth()->user()->nama}}</h1>
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

            <div class="footer-top">
              <div class="container">
                <div class="row">
        
                  <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>SIBONLABEL</h3>
                    <p><strong>Alamat: </strong>
                       <br><br>
                      <strong>Phone:</strong> (0333) 636780<br>
                      <strong>Email:</strong> poliwangi.ac.id<br>
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
        
                  <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                      <li><i></i> <a>Web Design</a></li>
                      <li><i></i> <a>Web Development</a></li>
                      <li><i></i> <a>Graphic Design</a></li>
                    </ul>
                  </div>
        
                  <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Berlangganan Email</p>
                    <form action="" method="post">
                      <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
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
                  <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                    Designed by <a href="https://bootstrapmade.com/">POLIWANGI STUDENT</a>
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
        
        <!-- End Footer -->



        {{--  tag script --}}
        @include('admin.parts.script')

    </body>





    </html>
