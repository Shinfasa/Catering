<?php
session_start();

include ("header.php");

$s = $_POST['search'];
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
  include('footer.php')
?>