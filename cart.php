<?php
include 'header.php';
?>

<br>
<br>

<body>

<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Keranjang Saya</h2>
    </div>
    
    <!-- DataTables -->
    <div class="row">                        
        <div class="card-body col-8">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="color: #384046;">Checklist</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Harga</th>
                            <th class="text-center" style="color: #384046;">Qty</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Hapus</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <?php 
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
        
                            $data = mysqli_query($koneksi,"SELECT * FROM keranjang JOIN menu ON keranjang.id_menu = menu.id_menu JOIN user ON keranjang.id_user = user.id_user;");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
 
                            $data_order = mysqli_query($koneksi,"SELECT * FROM keranjang JOIN menu ON keranjang.id_menu = menu.id_menu JOIN user ON keranjang.id_user = user.id_user LIMIT $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_order)){
                        ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" name="" id=""></td>
                            <td class="text-center">
                                <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" height="100px" style="margin-left: 10px; margin-right: 15px; border-radius: 10px;">
                                <br>
                                <?php echo $d['nama_menu']; ?></td>
                            <td class="text-center"><?php echo $d['harga']; ?></td>
                            <td class="text-center"><?php echo $d['qty']; ?></td>
                            <td class="text-center"><?php echo $d['total_harga']; ?></td>
                            <td class="text-center" style="color: #384046;"><a href="" class="btn"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php
                            }
                        ?>             
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card col-md-3" style="margin-left: 30px; border-radius: 0;">
                <div>
                    <h5 class="text-center pt-3"><b>Total</b></h5>
                    <hr style="padding: 2px; margin: 10px;">
                    <div class="d-flex justify-content-between p-2">
                        <p style="color: #384046;">1 menu</p>
                        <p style="color: #384046;">Rp 50.000</p>
                    </div>
                    <hr style="padding: 2px; margin: 10px;">
                    <a href="checkout.php" class="btn mb-3" style="margin-left: 120px;">Check Out</a>
                </div>
            </div>
  </div>

</section>
<!-- End Section -->

</body>
<br>
<?php
include 'footer.php';
?>
</html>