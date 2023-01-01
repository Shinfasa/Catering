<?php
    include "header.php";
?>

<br>
<br>

<body>
    
<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Pesanan Saya</h2>
    </div>
    
    <!-- DataTables -->
    <div>                        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="color: #384046;">No.</th>
                            <th class="text-center" style="color: #384046;">Tanggal Pesan</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Harga</th>
                            <th class="text-center" style="color: #384046;">Jumlah</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Status</th>
                            <th class="text-center" style="color: #384046;">Nota</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        <?php 
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
        
                            $data = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran;");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
 
                            $data_order = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan!='Selesai' LIMIT $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_order)){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                            <td class="text-center">
                                <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" width="100px" style="margin-left: 10px; margin-right: 15px; border-radius: 10px;">
                                <?php echo $d['nama_menu']; ?></td>
                            <td class="text-center"><?php echo $d['harga_satuan']; ?></td>
                            <td class="text-center"><?php echo $d['jumlah']; ?></td>
                            <td class="text-center"><?php echo $d['total_harga']; ?></td>
                            <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                            <td class="text-center" style="color: #384046;">
                                <a class="btn" href="nota.php"><i class="bi bi-printer"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>                                      
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</section>
<!-- End Section -->

<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Riwayat Pesanan</h2>
    </div>
    
    <!-- DataTables -->
    <div>                        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="color: #384046;">No.</th>
                            <th class="text-center" style="color: #384046;">Tanggal Selesai</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Harga</th>
                            <th class="text-center" style="color: #384046;">Jumlah</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Status</th>
                            <th class="text-center" style="color: #384046;">Nota</th>
                        </tr>
                    </thead>                                    
                    <tbody>
                        <?php 
                            $batas = 10;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
                            $previous = $halaman - 1;
                            $next = $halaman + 1;
        
                            $data = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran;");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);
 
                            $data_order = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Selesai' LIMIT $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_order)){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                            <td class="text-center">
                                <img src="assets/img/menu/<?php echo $d['gambar']; ?>" alt="" width="100px" style="margin-left: 10px; margin-right: 15px; border-radius: 10px;">
                                <?php echo $d['nama_menu']; ?></td>
                            <td class="text-center"><?php echo $d['harga_satuan']; ?></td>
                            <td class="text-center"><?php echo $d['jumlah']; ?></td>
                            <td class="text-center"><?php echo $d['total_harga']; ?></td>
                            <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                            <td class="text-center" style="color: #384046;">
                                <a class="btn" href="nota.php"><i class="bi bi-printer"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>                        
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</section>
<!-- End Section -->

</body>

<?php
    include "footer.php";
?>