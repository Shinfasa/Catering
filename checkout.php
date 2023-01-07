<?php
include 'header.php';

if(isset($_POST['checkout'])){

 $tgl_pesan = date("Y-m-d");
 $alamat = $_POST['txt_alamat'];
 $nohp = $_POST['txt_nohp'];
 $tgl_pakai = date('Y-m-d H:i:s', strtotime($_POST['txt_pakai']));
 $harga_satuan = $_POST['harga_satuan'];
 $total_harga = $_POST['total_harga'];
 $qty = $_POST['qty'];
 $catatan = $_POST['txt_catatan'];
 $id_pembayaran = $_POST['txt_bayar'];
 $id_menu = $_POST['txt_idmenu'];

 $data = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = '$idUser'");

 if($check_cart = mysqli_num_rows($data) > 0){
  $insert_order = mysqli_query($koneksi,"INSERT INTO orders VALUES (NULL, '$tgl_pesan', '$tgl_pakai', '$harga_satuan', '$qty', '$total_harga', '$alamat', '$nohp', '$catatan', NULL, NULL, 'Belum Dibayar', '$idUser', '$id_menu', '$id_pembayaran')");
  $delete_keranjang = mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_user='$idUser'");

  $message[] = 'pesanan berhasil dilakukan!';
  echo "<script>alert('Pesanan berhasil dilakukan!')</script>";
  echo "<script>location='payment.php'</script>";

}else{
  $message[] = 'keranjang Anda kosong';
}

}
?>
<!--Main layout -->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <div class="section-title">
      <br><br>
      <h2>Check Out</h2>
    </div>
    <form action="checkout.php" method="POST">
      <!--Card-->
      <div class="card mb-3" style="border-radius: 0;">
        <div>
          <div class="m-4">
            <div>
              <h6 style="text-align: right;">Tanggal Pemesanan : <?php echo date("d/m/Y") ?></h6>
            </div>            

            <div class="form-group pb-3">
              <label for="txt_name">Username</label>
              <input type="text" class="form-control form-control-user" placeholder="Username" name="txt_name" value="<?php echo $userName; ?>" disabled>
            </div>
            <div class="form-group pb-3">
              <label for="txt_alamat">Alamat</label>
              <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="form-group">
              <label for="txt_nohp">No. Handphone</label>
              <input type="text" class="form-control form-control-user" placeholder="628*****" name="txt_nohp" value="<?php echo $nohp; ?>" required>
            </div>     
          </div>
        </div>
      </div>

      <!-- DataTables -->
      <div>                        
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center" style="color: #384046;">No.</th>
                  <th class="text-center" style="color: #384046;">Menu</th>
                  <th class="text-center" style="color: #384046;">Harga</th>
                  <th class="text-center" style="color: #384046;">Jumlah</th>
                  <th class="text-center" style="color: #384046;">Total Harga</th>
                </tr>
              </thead>                                    
              <tbody> 

                <?php

                $grand_total = 0;
                $cart_items[] = '';
                $select_cart = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = '$idUser'");

                if(mysqli_num_rows($select_cart) > 0){

                  while($fetch_cart = mysqli_fetch_array($select_cart)){

                   $cart_items[] = $fetch_cart['nama_menu'].' ('.$fetch_cart['total_harga'].' x '. $fetch_cart['qty'].') + ';
                   $total_products = implode($cart_items);
                   $grand_total += ($fetch_cart['total_harga'] * $fetch_cart['qty']);

                   ?>
                   <tr>
                     <td class="text-center" style="color: #384046;">1</td>
                     <td class="text-center" style="color: #384046;"><img src="assets/img/menu/<?php echo $fetch_cart['gambar']; ?>" width="100px"><span style="margin-left: 10px;"><?php echo $fetch_cart['nama_menu']; ?></span></td>
                     <td class="text-center" style="color: #384046;"><?php echo rupiah($fetch_cart['total_harga']); ?></td>
                     <td class="text-center" style="color: #384046;"><?php echo $fetch_cart['qty']; ?></td>
                     <td class="text-center" style="color: #384046;"><?php echo rupiah($sub_total = ($fetch_cart['total_harga'] * $fetch_cart['qty'])); ?></td>
                   </tr>
                   <input type="hidden" name="txt_idmenu" value="<?= $fetch_cart['id_menu']; ?>">
                   <input type="hidden" name="harga_satuan" value="<?= $fetch_cart['total_harga']; ?>">
                   <input type="hidden" name="qty" value="<?= $fetch_cart['qty']; ?>">
                   <input type="hidden" name="total_harga" value="<?= $sub_total; ?>">
                   <?php
                 }
               }else{
                echo '<p class="empty">keranjang Anda kosong!</p>';
              }
              ?>                                     
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4" class="text-center" style="color: #384046;">Sub Total Harga</th>
                <th class="text-center" style="color: #384046;"><?php echo rupiah($grand_total); ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>

    <!--Card-->
    <div class="card mb-3" style="border-radius: 0;">
      <div>
        <div class="m-4">                    
          <div class="form-group pb-3">
            <label for="txt_pakai">Tanggal Pemakaian</label>
            <input type="datetime-local" class="form-control form-control-user" name="txt_pakai" value="" required>
          </div> 
          <div class="form-group pb-3">
            <label for="txt_catatan">Catatan</label>
            <input type="text" class="form-control form-control-user" name="txt_catatan" value="">
          </div> 
          <div class="form-group pb-3">
            <label for="txt_bayar">Metode Pembayaran</label>
            <div style="font-size:15px;">
              <?php 
              $pembayaran = mysqli_query($koneksi,"SELECT * FROM pembayaran");
              while($p = mysqli_fetch_array($pembayaran)){
                ?>
                <input type="radio" name="txt_bayar" value="<?php echo $p['id_pembayaran']; ?>" style="margin-left: 10px;" required>&nbsp;<?php echo $p['metode_pembayaran']; ?>
                <?php
              }
              ?>
            </div>
          </div>

          <a href="cart.php" class="btn btn-user btn-block" style="color: #E8853D;"><b>Kembali</b></a>
          <button type="submit" name="checkout" class="btn btn-user btn-block text-light font-weight-bold" style="background-color: #E8853D;">Lanjutkan</button>

        </div>
      </div>
    </form>
  </div>
</div>
</div>
</main>
<!--Main layout-->

<?php
include 'footer.php';
?>