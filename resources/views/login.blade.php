<!DOCTYPE html>
<html lang="en">

@include('admin.parts.head')

<body>

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="row justify-content-center">
            <div class="col-md-9 col-7 justify-content-center mt-md-5 mt-2 " data-aos="zoom-in">
                <div class="d-flex align-items-center mx-md-auto">
                    <img src="../../img/logo.png" alt="logo" class="logo" width="32">
                    <div class="font-poppins fs-md-1 fs-3 fw-bold">SIBONLABEL</div>
                </div>
            </div>
        </div>
        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <div
                    class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <div class="color-primary fs-6  font-poppins text-capitalize">
                        Lorem ipsum dolor sit amet
                    </div>
                    <div class="color-primary fs-1 fw-bold font-poppins text-uppercase">
                        Sibonlabel
                    </div>
                    <div class="color-primary fs-6  font-poppins text-capitalize">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, voluptatum?
                    </div>
                    <div><button type="button" class="btn-get-started scrollto text-decoration-none"
                            data-bs-target="#modalLogin" data-bs-toggle="modal">Login</button></div>

                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <img src="img/display.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade font-poppins " id="modalLogin" tabindex="-1" aria-labelledby="modalLoginId"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body mx-auto">
                        <div class="d-flex align-items-center mt-3">
                            <div class="">
                                <img src="../../img/logo.png" alt="logo" class="logo" width="32">
                            </div>
                            <div class="font-poppins fs-md-1 fs-3 fw-bold">SIBONLABEL</div>
                        </div>
                        <form action="/login" method="post" class="mt-5">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="submit" class="btn btn-primary">login</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    {{-- <main id="main">


        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Clients</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Projects</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Hard Workers</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div> --}}

    @include('admin.parts.script')

    <!-- Template Main JS File -->
    <script src="assets/js/landingPage.js"></script>

</body>

</html>
