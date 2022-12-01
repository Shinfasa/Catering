<?php 
  include('header.php')
?>

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
  
      <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

          <div class="section-title">
            <h2>Tentang Kami</h2>
          <p style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>

        </div>
      </section><!-- End About Section -->
  
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
              <a href="product_detail.php"><img src="assets/img/p-1.jpg" alt=""></a>
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

<?php 
  include('footer.php')
?>