<?php
include("header.php");

$id_kategori = $_GET['id_kategori'];
?>

<br>
<br>

<body>

  <!-- popular section starts  -->
  <section id="menu" class="what-we-do">
    <div class="container">
      <?php 
      if ($id_kategori == 0) {
       ?>
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
                <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" width="300px" height="250px" style="border-radius: 20px;">
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
          <?php 
        }
      }else{

        $batas = 100;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

        $previous = $halaman - 1;
        $next = $halaman + 1;

        $data = mysqli_query($koneksi,"SELECT * FROM menu JOIN kategori ON menu.id_kategori = kategori.id_kategori WHERE menu.id_kategori='$id_kategori';");
        $jumlah_data = mysqli_num_rows($data);
        $total_halaman = ceil($jumlah_data / $batas);

        $data_menu = mysqli_query($koneksi,"SELECT * FROM menu JOIN kategori ON menu.id_kategori = kategori.id_kategori WHERE menu.id_kategori='$id_kategori' LIMIT $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        $c = mysqli_fetch_array($data);
        ?>

        <div class="section-title">
          <h2><?php echo $c['nama_kategori'] ?></h2>
        </div>
        <div class="row">

          <?php
          while($d = mysqli_fetch_array($data_menu)){
            ?>
            
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-0" style="margin-bottom: 30px;">
              <div class="card icon-box" style="border-radius: 20px;">
                <div class="img">
                  <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" width="300px" height="250px" style="border-radius: 20px;">
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
            <?php 
          }
        } 
        ?>
      </div>    
    </div>
  </section>
  <!-- End Section -->

</body>

<?php
include "footer.php";
?>