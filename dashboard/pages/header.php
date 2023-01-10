<?php 
require ('../../../koneksi.php');

session_start();

if (!isset($_SESSION['id'])) {
  header('Location: ../../../login.php');
}

$idUser   =  $_SESSION['id']    ;
$userName =  $_SESSION['name']  ;
$userMail =  $_SESSION['email'] ;
$userPass =  $_SESSION['pass']  ;
$alamat   =  $_SESSION['alamat'];
$nohp     =  $_SESSION['nohp']  ;
$gambar   =  $_SESSION['gambar'];
$akses    =  $_SESSION['akses'] ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../../../assets/img/logo/favicon.png">
  <title>
    Admin | WM Hana Asri
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <!-- Unicons -->
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="g-sidenav-show" style="background-color: #E8853D;">
  <div class="min-height-300 position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="../index.php">
        <img src="../../../assets/img/logo/logo.png" class="navbar-brand-img h-100" alt="main_logo" style="margin-left:25px;">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link " href="../../index.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/order/order.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-cart text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Order</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/menu/menu.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-bag-17 text-success text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/kategori/kategori.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-bullet-list-67 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/user/user.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-circle-08 text-info text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/pembayaran/pembayaran.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-money-coins text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Pembayaran</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/iklan/iklan.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-copy-04 text-danger text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Iklan</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../pages/profile/profile.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="../../../logout.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-user-run text-warning text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Log Out</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
<main class="main-content position-relative border-radius-lg ">
  
<div class="container-fluid py-1 px-3 pt-4">
  <h5 style="color: #fff; text-align:center;">Selamat Datang, <?php echo $userName; ?>!</h5>
</div>