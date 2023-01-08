<?php
session_start();

include ("header.php");
if ($_SESSION['akses'] == 2 || empty($_SESSION['akses'])) {
$s = $_POST['search'];
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
?>

<br>
<br>
        <section id="menu" class="what-we-do">
            <div class="container">
                <div class="section-title">
                    <h2>Hasil Pencarian</h2>
                </div>

                <div class="row">                
                <?php 
                $brgs=mysqli_query($koneksi,"SELECT * FROM menu where nama_menu like '%$s%' order by id_menu ASC");
                $x = mysqli_num_rows($brgs);
                    if($x>0){
                        while($p=mysqli_fetch_array($brgs)){
                            ?>                               
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-0" style="margin-bottom: 30px;">
                                <div class="card icon-box" style="border-radius: 20px;">
                                    <div class="img">
                                        <img src="assets/img/menu/<?php echo $p['gambar']; ?>" alt="" width="300px" height="250px" style="border-radius: 20px;">
                                    </div>
                                    <br>
                                    <h4><a href="product_detail.php?id_menu=<?php echo $p['id_menu'] ?>"><?php echo $p['nama_menu']; ?></a></h4>
                                    <h5 class="text-secondary" style="font-family: 'Open Sans', sans-serif;"><?php echo rupiah($p['harga']); ?></h5>
                                    <div>
                                        <a href="product_detail.php?id_menu=<?php echo $p['id_menu'] ?>"><button class="btn m-2 pt-2 pb-2" style="color: #E8853D;">Detail Menu</button></a>
                                        <?php 
                                        if(isset($_SESSION['id'])) {
                                          ?>
                                        <button class="btn m-2" style="background-color: #E8853D;">
                                            <a href="cart.php?id_menu=<?php echo $p['id_menu'] ?> & action=add" style="color: #fff; font-size: 20px"><span class="bi-cart2"></span></a>
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
                          <?php
                      }
                  }
              }
          
          ?>
      </div>
  </section>

<?php 
}else{

  echo "<script>alert('Anda adalah Admin!')</script>";
  echo "<script>location='dashboard/'</script>"; 
}
include('footer.php')
?>