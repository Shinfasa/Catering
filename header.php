<?php
  require('koneksi.php');

  session_start();

  include('function/rupiah.php');
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
      <ul class="">
        <li><a class="nav-link scrollto" href="index.php">Beranda</a></li>
        <li class="dropdown"><a href="#categories"><span>Kategori</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="menu.php?id_kategori=1">Harian</a></li>
            <li><a href="menu.php?id_kategori=2">Prasmanan</a></li>
            <li><a href="menu.php?id_kategori=3">Kotakan</a></li>
          </ul>
        </li>
        <li><a class="nav-link scrollto" href="menu.php?id_kategori=0">Menu</a></li>
        
        <?php  
          if(isset($_SESSION['id'])) {
            $idUser   =  $_SESSION['id']    ;
            $userName =  $_SESSION['name']  ;
            $userMail =  $_SESSION['email'] ;
            $userPass =  $_SESSION['pass']  ;
            $alamat   =  $_SESSION['alamat'];
            $nohp     =  $_SESSION['nohp']  ;
            $gambar   =  $_SESSION['gambar'];
            $akses    =  $_SESSION['akses'] ;
        ?>
        <li><a class="nav-link scrollto" href="order.php">Pesanan Saya</a></li>
        <li><a class="nav-link scrollto" href="faq.php">FAQ</a></li>
        <li class="dropdown"><a href="#search"><span class="bi-search"></span></a>
          <ul>
            <li>
              <form action="menu.php?id_kategori=0" method="post">
                <input type="search" name="search" class="form-control border-1 small" placeholder="Search for...">
                <button type="submit" class="form-control border-1 small" aria-label="Left Align">
                <a class="btn p-1"><span style="margin-left: 75px;">Cari</span></a>
                </button>
                <div class="clearfix"></div>
              </form>           
            </li>
          </ul>
        </li>
        <li><a href="cart.php"><span class="bi-cart3"></span></a></li>
        <!-- Nav Item - User Information -->
        <li class="dropdown">
          <a href="#">
            <img class="img-profile rounded-circle" style="height: 33px;" src="./assets/img/user/<?php echo $gambar; ?>">&nbsp;<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userName; ?></span>
            <i class="bi bi-chevron-down"></i>
          </a>
          <ul>
            <li><a href="profile.php" class="bi bi-person-fill text-secondary">Profile</a></li>
            <li><a onclick="return confirm('Apakah anda yakin ingin keluar dari halaman ini?')" href="logout.php" class="bi bi-box-arrow-right text-secondary">Logout</a></li>
          </ul>
        </li>
      <?php }else{ ?>
        <li><a class="nav-link scrollto" href="faq.php">FAQ</a></li>
        <li class="dropdown"><a href="#search"><span class="bi-search"></span></a>
          <ul>
            <li>
              <form action="menu.php?id_kategori=0" method="post">
                <input type="search" name="search" class="form-control border-1 small" placeholder="Search for...">
                <button type="submit" class="form-control border-1 small" aria-Label="Left Align">
                  <a class="btn p-1"><span style="margin-left: 75px;">Cari</span></a>
                </button>
              </form>           
            </li>
          </ul>
        </li>
        <li><a href="cart.php"><span class="bi-cart3"></span></a></li>
        <li><a href="login.php"><button action="login.php" class="btn">Log In</button></a></li>
      <?php } ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>    

  </div>

</header>
<!-- End Header -->