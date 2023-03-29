<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiBONLABEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/red-rose" rel="stylesheet">
    <link rel="stylesheet" href="assets/landingpage.css">
  </head>
  <body>
    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h2 style="font-family: 'Red Rose'; font-size: 38px;">Lorem ipsum dolor sit amet, consectetur </h2>
          <h1 style="font-family: 'Red Rose'; font-size: 64px;">SiBONLABEL</h1>
          <h2 style="font-family: 'Red Rose'; font-size: 32px;">adipiscing elit.  Turpis ipsum dolor sit amet, </h2>
          <h2 style="font-family: 'Red Rose'; font-size: 32px;">consectetur Etiam eu turpis .</h2>
          <!-- Button trigger modal -->
          <center>
          <div class="btn-modal">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 330px; height: 63.49px; background-color: white; color:#128FED; font-size: 26px; font-family: 'Popins'; border: 3px solid #128FED;">
              Login
            </button>
          </div>
          </center>
        
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="img/Logo.png" alt="" style="width: 88px; height: 84px;">
        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Kanit'; font-size: 53px;">SiBONLABEL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <form action="/login/post" method="POST">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
          </div>
          <center>
              <button type="submit" class="btn btn-primary" style="width: 200px;
              height: 40px; font-size: 23.78; font-family: 'Popins';">Login</button>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="img/display.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>