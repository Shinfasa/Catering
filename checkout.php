<?php
include 'header.php';

if(isset($_POST['submit'])){

 $tgl_pesan = date("Y-m-d");
 $alamat = $_POST['txt_alamat'];
 $nohp = $_POST['txt_nohp'];
 $tgl_pakai = $_POST['txt_pakai'];
 $address = $_POST['address'];
 $total_products = $_POST['total_products'];
 $total_price = $_POST['total_price'];
 $event_time = $_POST['event_time'];

 $data = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = '$idUser'");

 if($check_cart = mysqli_num_rows($data) > 0){

  $insert_order = mysqli_query($koneksi,"INSERT INTO orders VALUES (NULL, '$tgl_pesan', '$tgl_pakai', '$harga_satuan', '$qty', '$idUser', '$id_menu')");
  $insert_order = mysqli_query($koneksi,"INSERT INTO orderdetail VALUES (NULL, '$idUser', '$id_menu', '$nama_menu', '$qty', '$total_harga', '$gambar')");
  $delete_keranjang = mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_user='$idUser'");

  $message[] = 'pesanan berhasil dilakukan!';
  echo "<script>alert('Pesanan berhasil dilakukan!')</script>";

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

    <!--Card-->
    <div class="card mb-3" style="border-radius: 0;">
      <div>
        <div class="m-4">
          <div>
            <h6 style="text-align: right;">Tanggal Pemesanan : <?php echo date("d/m/Y") ?></h6>
          </div>            
          <form action="" method="POST" class="user">
            <div class="form-group pb-3">
              <label for="txt_harga">Username</label>
              <input type="text" class="form-control form-control-user" placeholder="Username" name="txt_name" value="<?php echo $userName; ?>" disabled>
            </div>
            <div class="form-group pb-3">
              <label for="txt_detail">Alamat</label>
              <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $alamat; ?>">
            </div>
            <div class="form-group">
              <label for="txt_gambar">No. Handphone</label>
              <input type="text" class="form-control form-control-user" placeholder="628*****" name="txt_nohp" value="<?php echo $nohp; ?>">
            </div>     
          </form>
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
              <tr>
                <td class="text-center" style="color: #384046;">1</td>
                <td class="text-center" style="color: #384046;"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                <td class="text-center" style="color: #384046;">Rp 10000</td>
                <td class="text-center" style="color: #384046;">1</td>
                <td class="text-center" style="color: #384046;">Rp 10000</td>
              </tr>                                     
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4" class="text-center" style="color: #384046;">Sub Total Harga</th>
                <th class="text-center" style="color: #384046;">Rp 10000</th>
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
          <form action="" method="POST" class="user">                       
            <div class="form-group pb-3">
              <label for="txt_nama">Tanggal Pemakaian</label>
              <input type="datetime-local" class="form-control form-control-user" name="txt_pakai" value="">
            </div> 
            <div class="form-group pb-3">
              <label for="txt_nama">Catatan</label>
              <input type="text" class="form-control form-control-user" name="txt_catatam" value="">
            </div> 
            <div class="form-group pb-3">
              <label for="txt_bayar">Metode Pembayaran</label>
              <div style="font-size:15px;">
                <?php 
                $pembayaran = mysqli_query($koneksi,"SELECT * FROM pembayaran");
                while($p = mysqli_fetch_array($pembayaran)){
                  ?>
                  <input type="radio" name="txt_bayar" value="<?php echo $u['id_pembayaran'] ?>" style="margin-left: 10px;" >&nbsp;<?php echo $p['metode_pembayaran']; ?>
                  <?php
                }
                ?>
              </div>
            </div>
            
            <a href="cart.php" class="btn btn-user btn-block" style="color: #E8853D;"><b>Kembali</b></a>
            <button type="submit" name="submit" class="btn btn-user btn-block text-light font-weight-bold" style="background-color: #E8853D;">Lanjutkan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<!--Main layout-->

<?php
include 'footer.php';
?>