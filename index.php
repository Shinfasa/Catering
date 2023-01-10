<?php
include('header.php');
if ($_SESSION['akses'] == 2 || empty($_SESSION['akses'])) {
  if(isset($_POST['add_to_cart'])){
    $id_menu = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $total_harga = $_POST['total_harga'];
    $gambar = $_POST['gambar'];
    $qty = 1;

    $data = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE nama_menu = '$nama_menu' AND id_user = '$idUser'");
    $cek = mysqli_num_rows($data);

    if($cek > 0){
     $message[] = 'Sudah ditambakan ke keranjang!';
     echo "<script>alert('Sudah ditambakan ke keranjang!')</script>";
   }else{
     $insert_keranjang = mysqli_query($koneksi,"INSERT INTO keranjang VALUES (NULL, '$idUser', '$id_menu', '$nama_menu', '$qty', '$total_harga', '$gambar')");
     $message[] = 'Ditambakan ke keranjang!';
     echo "<script>alert('Ditambakan ke keranjang!')</script>"; 
   }
 }
 ?>

 <main id="main">

  <!-- ======= Carousel ======= -->
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <?php 
      $data_iklan = mysqli_query($koneksi,"SELECT * FROM carousel");
      while($i = mysqli_fetch_array($data_iklan)){
        ?>
        <div class="carousel-item active">
          <?php if(isset($_SESSION['id'])){ ?>
            <img class="d-block w-100" src="assets/img/iklan/<?php echo $i['gambar']; ?>" alt="carousel" style="margin-top: 60px;">
          <?php }else{ ?>
            <img class="d-block w-100" src="assets/img/iklan/<?php echo $i['gambar']; ?>" alt="carousel">
          <?php } ?>
        </div>    
        
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="bi-chevron-left" style="color: #E8853D; font-size:20px;" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="bi-chevron-right" style="color: #E8853D; font-size:20px;" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      <?php } ?>
    </div>
    <!-- End Carousel -->

    <!-- ======= Categories Section ======= -->
    <section id="categories" class="what-we-do">

      <div class="container">

        <div class="section-title">
          <h2>Kategori</h2>
        </div>

        <div class="row" style="align-items: center;">

          <?php  
          $data_kategori = mysqli_query($koneksi,"SELECT * FROM kategori");
          while($k = mysqli_fetch_array($data_kategori)){
            ?>
            <div class="col-lg-3 col-md-4 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4><a href="menu.php?id_kategori=<?php echo $k['id_kategori']; ?>"><?php echo $k['nama_kategori']; ?></a></h4>
                <p><?php echo $k['deskripsi']; ?></p>
              </div>
            </div>
          <?php } ?>

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
              <form action="" method="POST">
                <input type="hidden" name="id_menu" value="<?php echo $d['id_menu'] ?>">
                <input type="hidden" name="nama_menu" value="<?php echo $d['nama_menu'] ?>">
                <input type="hidden" name="total_harga" value="<?php echo $d['harga'] ?>">
                <input type="hidden" name="gambar" value="<?php echo $d['gambar'] ?>">

                <div class="img">
                  <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" width="300px" height="250px" style="border-radius: 20px;">
                </div>
                <br>
                <h4><a href="product_detail.php?id_menu=<?php echo $d['id_menu'] ?>"><?php echo $d['nama_menu']; ?></a></h4>
                <h5 class="text-secondary" style="font-family: 'Open Sans', sans-serif;"><?php echo rupiah($d['harga']); ?></h5>
                <div>
                  <a href="product_detail.php?id_menu=<?php echo $d['id_menu'] ?>" class="btn m-2 pt-2 pb-2" style="color: #E8853D;">Detail Menu</a>
                  <?php 
                  if(isset($_SESSION['id'])) {
                    ?>
                    <a href="" ><button class="btn m-2" style="background-color: #E8853D;" type="submit" name="add_to_cart">
                      <span style="color: #fff; font-size: 20px" class="bi-cart2"></span>
                    </button></a>
                  </div>
                </div>
              </div>
            </form>
            <?php 
          }else{ 
            ?>
            <button class="btn m-2" style="background-color: #E8853D;">
              <a onclick="return confirm('Silahkan Login Terlebih Dahulu!')" href="login.php" style="color: #fff; font-size: 20px"><span class="bi-cart2"></span></a>
            </button>
          </div>
        </div>
      </div>
      <?php 
    }
  }
  ?>       
</div>
</section>
<!-- End Section -->

</main>
<!-- End #main -->

<?php 
}else{

  echo "<script>alert('Anda adalah Admin!')</script>";
  echo "<script>location='dashboard/'</script>"; 
}
include('footer.php')
?>