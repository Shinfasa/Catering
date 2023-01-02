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
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
            <input type="text" class="form-control" placeholder="Type here...">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="profile/profile.php" class="nav-link text-white font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none"><?php echo $userName; ?></span>
            </a>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
                <i class="sidenav-toggler-line bg-white"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell cursor-pointer"></i>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New message</span> from Laur
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        13 minutes ago
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto">
                      <img src="../../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">New album</span> by Travis Scott
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        1 day
                      </p>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>credit-card</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(453.000000, 454.000000)">
                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        Payment successfully completed
                      </h6>
                      <p class="text-xs text-secondary mb-0">
                        <i class="fa fa-clock me-1"></i>
                        2 days
                      </p>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- End Navbar -->