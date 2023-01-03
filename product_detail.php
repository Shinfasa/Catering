<?php 
include "header.php";
  if ($_SESSION['akses'] == 2) {

$id_menu = $_GET['id_menu'];
$query = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
$result = mysqli_query($koneksi, $query);
$detail = mysqli_fetch_array($result);
?>
<head>
    <style>
    .small-img-group {
        display: flex;
        justify-content: space-between;
    }
    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }
    .sproduct select {
        display: block;
        padding: 5px 10px;
    }
    .sproduct input {
        width: 50px;
        height: 40px;
        padding-left: 10px;
        font-size: 16px;
        margin-right: 10px;
    }
    .sproduct input:focus {
        outline: none;
    }
    .buy-btn {
        background: #E8853D;
        color: #fff;
        border: none;
        padding: 4px;
        opacity: 1;
        transition: 0.3s all;
    }
    </style>
</head>

<br>
<br>

<body>
    
<section class="container sproduct my-5 pt-1">
    <div class="section-title">
      <h2>Detail Menu</h2>
    </div>

    <div class="row mt-1" style="margin-top: 30px;">
        <div class="col-lg-4 col-md-12 col-12 text-center pb-3">
            <img class="img-responsive pt-2" width="250px" src="assets/img/menu/<?php echo $detail['gambar']; ?>" id="maining" alt="">
        </div>        
        <div class="col-lg-8 col-md-12 col-12">
            <h3><b><?php echo $detail['nama_menu']; ?></b></h3>
            <p style="font-size: 20px;"><?php echo rupiah($detail['harga']); ?></p>
            <input type="number" value="1">
            <a class="buy-btn bi-cart2 p-2" href="cart.php"><span style="margin-left: 5px;">Tambahkan</span></a>
            <h4 class="mt-5 mb-3" style="text-align: justify; font-size: 20px;">Deskripsi:</h4>
            <p style="text-align: justify; font-size:15px;"><?php echo $detail['detail'] ?></p>
        </div>        
    </div>
</section>

</body>

<?php
}else{

  echo "<script>alert('Anda adalah Admin!')</script>";
  echo "<script>location='dashboard/'</script>"; 
}
include 'footer.php';
?>