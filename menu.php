<?php
include("header.php");
  if ($_SESSION['akses'] == 2) {
$id_kategori = $_GET['id_kategori'];

if(isset($_POST['add_to_cart'])){

   if($idUser == ''){
      header('location:login.php');
   }else{

      $pid = $_POST['pid'];
      $pid = filter_var($pid, FILTER_SANITIZE_STRING);
      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $price = $_POST['price'];
      $price = filter_var($price, FILTER_SANITIZE_STRING);
      $image = $_POST['image'];
      $image = filter_var($image, FILTER_SANITIZE_STRING);
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
      $check_cart_numbers->execute([$name, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'sudah ditambakan ke keranjang!';
      }else{
         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = 'ditambakan ke keranjang!';
         
      }

   }

}
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
              <h4><a href="product_detail.php?id_menu=<?php echo $d['id_menu'] ?>"><?php echo $d['nama_menu']; ?></a></h4>
              <h5 class="text-secondary" style="font-family: 'Open Sans', sans-serif;"><?php echo rupiah($d['harga']); ?></h5>
              <div>
                <a href="product_detail.php?id_menu=<?php echo $d['id_menu'] ?>"><button class="btn m-2 pt-2 pb-2" style="color: #E8853D;">Detail Menu</button></a>
                <?php 
                if(isset($_SESSION['id'])) {
                  ?>
                  <button class="btn m-2" style="background-color: #E8853D;" type="submit" name="add_to_cart">
                    <a href="cart.php" style="color: #fff; font-size: 20px"><span class="bi-cart2"></span></a>
                  </button>
                </div>
              </div>
            </div>
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
    <h2>Kategori <?php echo $c['nama_kategori'] ?></h2>
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
          <h4><a href="product_detail.php?id_menu=<?php echo $d['id_menu'] ?>"><?php echo $d['nama_menu']; ?></a></h4>
          <h5 class="text-secondary" style="font-family: 'Open Sans', sans-serif;"><?php echo rupiah($d['harga']); ?></h5>
          <div>
            <a href="product_detail.php?id_menu=<?php echo $d['id_menu'] ?>"><button class="btn m-2 pt-2 pb-2" style="color: #E8853D;">Detail Menu</button></a>
            <?php 
            if(isset($_SESSION['id'])) {
              ?>
              <button class="btn m-2" style="background-color: #E8853D;">
                <a href="cart.php?id_menu=<?php echo $d['id_menu'] ?> & action=add" style="color: #fff; font-size: 20px"><span class="bi-cart2"></span></a>
              </button>
            </div>
          </div>
        </div>
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
} 
?>
</div>    
</div>
</section>
<!-- End Section -->

</body>

<?php
}else{

  echo "<script>alert('Anda adalah Admin!')</script>";
  echo "<script>location='dashboard/'</script>"; 
}
include "footer.php";
?>