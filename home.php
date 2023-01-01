<?php
      require ('koneksi.php');
  ?>

<!DOCTYPE html>
<html lang="en">
  
 <h ead>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>WM Hana Asri</title>
    <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo/favicon.png" rel="icon">
  <link href="assets/img/logo/favicon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/carousel.css">
    <link rel="stylesheet" href="assets/css/order.css">
    <link rel="stylesheet" href="assets/css/food.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  </h>
  
 <body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">
  
      <div class="logo me-auto">
        <a href="index.php"><img src="assets/img/logo/logo.png" alt="" class="img-fluid"></a>
      </div>
  
        <nav id="navbar" class="navbar order-last order-lg-0 p-3">
        <ul>
          <li><a class="nav-link scrollto active" href="#carousel">Beranda</a></li>

          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li class="dropdown"><a href="#what-we-do"><span  style="font-size: 18px;">Kategori</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li class="dropdown"><a href="#"><span style="font-size: 16px;">Harian</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Senin</a></li>
                    <li><a href="#">Selasa</a></li>
                    <li><a href="#">Rabu</a></li>
                    <li><a href="#">Kamis</a></li>
                  <li><a href="#">Jumat</a></li>
                  <li><a href="#">Sabtu</a></li>
                  <li><a href="#">Minggu</a></li>
                    <li><a href="#">Paket 1 Minggu</a></li>
                  </ul>
                </li>
                <li><a href="#">Prasmanan</a></li>
                <li><a href="#">Kotakan</a></li>
              </ul>
          </li>
          <li><a class="nav-link scrollto" href="#footer">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
  
      <div class="input-group rounded m-3" style="width: 200px;">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" style="height: 30px; font-size: 15px;"/>
      </div>
  
      <a href="#" class="js-search-open p-0" style="font-size: 15px;"><span class="bi-search"></span></a>

      <a href="cart.php" class="p-3" style="font-size: 20px;"><span class="bi-cart2"></span></a>

      <a href="#" class="p-3 text-secondary" style="font-size: 15px;">Username<span class="bi-person-circle p-2" style="font-size: 20px;"></span></a>

    </div>
  </header><!-- End Header -->

  <main id="main">

      <!-- ======= Carousel ======= -->
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#FFDA72" /></svg>
          <div class="container">
            <div class="carousel-caption text-start">
              <h1><b>WM Hana Asri</b></h1>
              <p>Some representative placeholder content for the first slide of the carousel.</p>
                <p><a class="btn btn-lg" href="#">Sign up today</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
              <rect width="100%" height="100%" fill="#FFDA72" /></svg>
            <div class="container">
              <div class="carousel-caption">
              <h1><b>Recommended Catering</b></h1>
              <p>Some representative placeholder content for the second slide of the carousel.</p>
              <p><a class="btn btn-lg" href="#">Learn more</a></p>
            </div>
            </div>
          </div>
          <div class="carousel-item">
          <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#FFDA72" /></svg>
          <div class="container">
            <div class="carousel-caption text-end">
              <h1><b>One more for good measure</b></h1>
                <p>Some representative placeholder content for the third slide of this carousel.</p>
              <p><a class="btn btn-lg" href="#">Browse gallery</a></p>
            </div>
          </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div><!-- End Carousel -->

    <!-- Order Tracking -->
    <section class="order-tracking pt-1">
        <div class="container">
            <div class="section-title">
                <h2>Pesanan Saya</h2>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-stepper text-black" style="border-radius: 16px;">
                    
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-between align-items-center mb-3 text-secondary">
                                <div>
                                    <h5 class="mb-0">INVOICE <span class="text-primary font-weight-bold">#Y34XDHR</span>
                                    </h5>
                                </div>
                                <div class="text-end">
                                    <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                                    <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span>
                                    </p>
                                </div>
                            </div>

                            <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                                <li class="bi bi-check-circle step0 active text-center" id="step1"></li>
                                <li class="bi bi-check-circle step0 active text-center" id="step2"></li>
                                <li class="bi bi-check-circle step0 active text-center" id="step3"></li>
                                <li class="bi bi-check-circle step0 text-muted text-end" id="step4"></li>
                            </ul>

                            <div class="d-flex justify-content-between">
                                <div class="d-lg-flex align-items-center">
                                    <i class="bi bi-clipboard-check bi-3x me-lg-4 mb-3
                                        mb-lg-0" style="font-size: 30px; color: #E8853D;"></i>
                                    <div>
                                        <p class="fw-bold mb-1 text-secondary">Sudah</p>
                                        <p class="fw-bold mb-0 text-secondary">Dibayar</p>
                                    </div>
                                </div>
                                <div class="d-lg-flex align-items-center">
                                    <i class="bi bi-box bi-3x me-lg-4 mb-3 mb-lg-0" style="font-size: 30px; color: #E8853D;"></i>
                                    <div>
                                        <p class="fw-bold mb-1 text-secondary">Pesanan</p>
                                        <p class="fw-bold mb-0 text-secondary">Diproses</p>
                                    </div>
                                </div>
                                <div class="d-lg-flex align-items-center">
                                    <i class="bi bi-truck bi-3x me-lg-3 mb-3 mb-lg-0"
                                        style="font-size: 30px; color: #E8853D;"></i>
                                    <div>
                                        <p class="fw-bold mb-1 text-secondary">Pesanan</p>
                                        <p class="fw-bold mb-0 text-secondary">Diantar</p>
                                    </div>
                                </div>
                                <div class="d-lg-flex align-items-center">
                                    <i class="bi bi-house-check bi-3x me-lg-4 mb-3 mb-lg-0" style="font-size: 30px; color: #E8853D;"></i>
                                    <div>
                                        <p class="fw-bold mb-1 text-secondary">Pesanan</p>
                                        <p class="fw-bold mb-0 text-secondary">Selesai</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Order Tracking -->

  
      <!-- ======= Categories Section ======= -->
    <section id="what-we-do" class="what-we-do">
      <div class="container">

          <div class="section-title">
          <h2>Kategori</h2>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Harian</a></h4>
                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
              </div>
            </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Prasmanan</a></h4>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="">Kotakan</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>
  
            </div>
  
      </div>
      </section><!-- Categories Section -->
    
      <!-- popular section starts  -->

<section class="popular" id="popular">

    <div class="section-title">
          <h2>Menu</h2>
        </div>
      <div class="box-container">
  
          <div class="box">
              <span class="price">Rp 10.000</span>
              <img src="assets/img/p-1.jpg" alt="">
              <h3>tasty burger</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
              <a href="#" class="btn">order now</a>
            </div>
          <div class="box">
            <span class="price">Rp 15.000</span>
              <img src="assets/img/p-2.jpg" alt="">
                <h3>tasty cakes</h3>
              <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
              </div>
              <a href="#" class="btn">order now</a>
          </div>
          <div class="box">
              <span class="price">Rp 20.000</span>
              <img src="assets/img/p-3.jpg" alt="">
              <h3>tasty sweets</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">order now</a>
        </div>
          <div class="box">
              <span class="price">Rp 25.000</span>
              <img src="assets/img/p-4.jpg" alt="">
              <h3>tasty cupcakes</h3>
              <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
              <span class="price">Rp 30.000</span>
              <img src="assets/img/p-5.jpg" alt="">
              <h3>cold drinks</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
            </div>
            <a href="#" class="btn">order now</a>
        </div>
        <div class="box">
              <span class="price">Rp 35.000</span>
            <img src="assets/img/p-6.jpg" alt="">
            <h3>cold ice-cream</h3>
            <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
              </div>
              <a href="#" class="btn">order now</a>
          </div>
  
    </div>

</section>
  
<!-- popular section ends -->

  </main><!-- End #main -->
  
  <!-- ======= Footer ======= -->
  <footer id="footer">

      <div class="footer-top" style="background-color: #FFDA72;">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <a href="index.html"><img src="assets/img/logo/logo.png" alt="" class="img-fluid" style="width: 150px;"></a>
              <br><br>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
                United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Link Terkait</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Tentang Kami</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Kategori</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Kategori Menu</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Harian</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Prasmanan</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Kotakan</a></a></li>
            </ul>
          </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Tentang Kami</h4>
              <p>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</p>
          </div>

          </div>
        </div>
    </div>

    <div class="footer p-5 pt-4 pb-3 d-md-flex text-light" style="background-color: #E8853D;">

        <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; 2022 Copyright <strong><span>WM Hana Asri</span></strong>. All Rights Reserved
        </div>
          <div class="credits">
            By Tim Catering
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        </div>
      </div>
    </footer><!-- End Footer -->
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</b>

</html>