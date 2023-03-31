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
                <h1 class="mb-2 fs-2 font-poppins">Welcome to admin </h1>
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
                    <h3>Techie</h3>
                    <p>
                      A108 Adam Street <br>
                      New York, NY 535022<br>
                      United States <br><br>
                      <strong>Phone:</strong> +1 5589 55488 55<br>
                      <strong>Email:</strong> info@example.com<br>
                    </p>
                  </div>
        
                  <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                  </div>
        
                  <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                    </ul>
                  </div>
        
                  <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
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
                    &copy; Copyright <strong><span>Techie</span></strong>. All Rights Reserved
                  </div>
                  <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                  </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                  <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
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
