<?php
  require ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
  
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
  
    <div class="logo me-auto">
      <a href="index.php"><img src="assets/img/logo/logo.png" alt="" class="img-fluid"></a>
    </div>
  
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="#home">Beranda</a></li>
        <li class="dropdown"><a href="#categories"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="categories.php">Harian</a></li>
            <li><a href="categories.php">Prasmanan</a></li>
            <li><a href="categories.php">Kotakan</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
        <li><a class="nav-link scrollto" href="order.php">Pesanan Saya</a></li>
        <li class="dropdown"><a href="#search"><span class="bi-search"></span></a>
          <ul>
            <li>
              <input type="search" class="form-control border-1 small" placeholder="Search for...">
            </li>
          </ul>
        </li>
        <li><a href="cart.php"><span class="bi-cart3"></span></a></li>
        <li><a href="login.php"><button action="login.php" class="btn">Log In</button></a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>    

  </div>

</header>
<!-- End Header -->

<main id="main">

<!-- ======= Carousel ======= -->
<div id="home" class="carousel slide" data-bs-ride="carousel">
  
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  
  <div class="carousel-inner">
    <div class="carousel-item active" style="height: 600px;">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <rect width="100%" height="100%" fill="#FFDA72" />
      </svg>
      <div class="container">
        <div class="carousel-caption text-start">
          <h1><b>WM Hana Asri</b></h1>
          <p>Some representative placeholder content for the first slide of the carousel.</p>
          <p><a class="btn btn-lg" href="#">Sign up today</a></p>
        </div>
      </div>
    </div>
        
    <div class="carousel-item" style="height: 600px;">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <rect width="100%" height="100%" fill="#FFDA72" />
      </svg>
      <div class="container">
        <div class="carousel-caption">
          <h1><b>Recommended Catering</b></h1>
          <p>Some representative placeholder content for the second slide of the carousel.</p>
          <p><a class="btn btn-lg" href="#">Learn more</a></p>
        </div>
      </div>
    </div>
          
    <div class="carousel-item" style="height: 600px;">
      <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <rect width="100%" height="100%" fill="#FFDA72" />
      </svg>
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

</div>
<!-- End Carousel -->
      
<!-- ======= Categories Section ======= -->
<section id="categories" class="what-we-do">
  
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
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui official</p>
            </div>
          </div>
        </div>  
      </div>
  </div>
</section>
<!-- Categories Section -->
    
<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Rekomendasi Menu</h2>
    </div>

    <div class="row">
      <?php 
        $batas = 6;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
        $previous = $halaman - 1;
        $next = $halaman + 1;
        
        $data = mysqli_query($koneksi,"SELECT * FROM menu;");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);
 
        $data_menu = mysqli_query($koneksi,"SELECT * FROM menu LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        while($d = mysqli_fetch_array($data_menu)){
      ?>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-0" style="margin-bottom: 30px;">
          <div class="card icon-box" style="border-radius: 20px;">
            <div class="img">
              <img src="img/ayam_geprek.jpg" alt="" width="300px" height="250px" style="margin-left: 10px; margin-right: 15px; border-radius: 20px;">
            </div>
            <br>
            <h4><a href="product_detail.php"><?php echo $d['nama_menu']; ?></a></h4>
            <h5 class="text-secondary" style="font-family: 'Open Sans', sans-serif;">Rp <?php echo $d['harga']; ?></h5>
          <div>
          <a href="check_out.php"><button class="btn m-2 pt-2 pb-2" style="color: #E8853D;">Beli Sekarang</button></a>
          <button class="btn m-2" style="background-color: #E8853D;">
            <a href="cart.php" style="color: #fff; font-size: 20px"><span class="bi-cart2"></span></a>
          </button>
        </div>
      </div>
    </div>
      <?php } ?>        
  </div>
</section>
<!-- End Section -->

</main>
<!-- End #main -->

<?php 
  include('footer.php')
?>