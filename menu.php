<?php
    include("header.php");
?>

<br>
<br>

<body>
    
<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Menu</h2>
    </div>

    <div class="row">
      <?php 
        $batas = 100;
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
              <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" width="300px" height="250px" style="margin-left: 10px; margin-right: 15px; border-radius: 20px;">
            </div>
            <br>
            <h4><a href="product_detail.php"><?php echo $d['nama_menu']; ?></a></h4>
            <h5 class="text-secondary" style="font-family: 'Open Sans', sans-serif;"><?php echo rupiah($d['harga']); ?></h5>
          <div>
          <a href="product_detail.php"><button class="btn m-2 pt-2 pb-2" style="color: #E8853D;">Detail Menu</button></a>
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

</body>

<?php
    include "footer.php";
?>