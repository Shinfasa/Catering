<?php
//Memanggil Header
include('../header.php');

//Fungsi Update
if(isset($_POST['update'])){
  $id = ($_POST['txt_id']);
  $nama = ($POST_['txt_nama']);
  $tglpesan = ($_POST['txt_tglpesan']);
  $tglpakai = ($_POST['txt_tglpakai']);
  $nama = ($_POST['txt_menu']);
  $catatan = ($_POST['txt_note']);
  $harga = ($_POST['txt_hrgsatuan']);
  $jumlah = ($_POST['txt_jml']);
  $total = ($_POST['txt_total']);
  $metode = ($_POST['txt_bayar']);
  $tglbayar = ($_POST['txt_tglbayar']);
  $status = ($_POST['txt_status']);

  $update=mysqli_query($koneksi,"UPDATE orderdetail SET status_pesanan ='$status' WHERE id_order='$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='order.php'</script>";
  }
}

//Fungsi Delete
if(isset($_GET['id_order'])){
  $id_order = $_GET['id_order'];
$sql = "DELETE orders FROM orders JOIN orderdetail ON orderdetail.id_order = orders.id_order WHERE orders.id_order = '$id_order';";
$result = mysqli_query($koneksi,$sql);
  if($result){
    echo "<script>alert('Data di Delete')</script>";
    echo "<script>location='order.php'</script>";
  }
}
?>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-12">
      <div class="card" style="height:100vh; max-height: 540px;">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center mb-3">
          <h6 class="mb-0">Order</h6>

        </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
 
                      $data_order = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran LIMIT $halaman_awal, $batas");
                      $nomor = $halaman_awal+1;

                      //Menampilkan List
                      while($d = mysqli_fetch_array($data_order)){
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $nomor++; ?></td>
                        <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6></td>
                        <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                        <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                        <td class="text-center"><?php echo $d['nama_menu']; ?></td>
                        <td class="text-center"><?php echo $d['catatan_order']; ?></td>
                        <td class="text-center"><?php echo $d['harga_satuan']; ?></td>
                        <td class="text-center"><?php echo $d['jumlah']; ?></td>
                        <td class="text-center"><?php echo $d['total_harga']; ?></td>
                        <td class="text-center"><?php echo $d['metode_pembayaran']; ?></td>
                        <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                        <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                        <td class="align-middle text-center">
                          <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['id_order'] ?>"> 
                          Edit
                          </a>
                          &nbsp;
                          <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="hapus_order.php?id_order=<?php echo $d['id_order'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order">
                            Delete
                          </a>
                        </td>
                      </tr>

                      <!-- Modal Edit -->
                      <div class="modal fade" id="exampleModalEdit<?php echo $d['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="order.php" method="POST" class="order">
                              <div class="modal-body">
                                <div class="form-group">
                                    <label for="txt_nama">Nama Customer</label>
                                    <input type="nama" class="form-control form-control-order" placeholder="Nama Customer" name="txt_nama" value="<?php echo $d['nama_user']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="txt_tglpesan">Tanggal Pemesanan</label>
                                    <input type="date" class="form-control form-control-order" name="txt_tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="txt_tglpakai">Tanggal Pemakaian</label>
                                    <input type="datetime-local" class="form-control form-control-order" name="txt_tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="txt_menu">Nama Menu</label>
                                    <input type="text" class="form-control form-control-order" id="exampleFisrtName" placeholder="Nama Menu" name="txt_menu" value="<?php echo $d['nama_menu']; ?>" readonly>
                                </div>
                                  <div class="form-group">
                                      <label for="txt_note">Catatan</label>
                                      <input type="text" class="form-control form-control-order" placeholder="Catatan" name="txt_note" value="<?php echo $d['catatan_order']; ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt_hrgsatuan">Harga Satuan</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_hrgsatuan" value="<?php echo $d['harga_satuan']; ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt_jml">Jumlah Pesanan</label>d$d
                                      <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_jml" value="<?php echo $d['jumlah']; ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt_total">Total Harga</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Total Harga" name="txt_total" value="<?php echo $d['total_harga']; ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt_bayar">Metode Pembayaran</label>
                                      <?php 
                                          if($d['id_pembayaran'] == 1 ){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" checked disabled>   BRI
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  BCA
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                      </div>
                                      <?php 
                                          }elseif($d['id_pembayaran'] == 2){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  BCA
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                      </div>
                                      <?php
                                          }elseif($d['id_pembayaran'] == 3){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled> disabled BCA
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  Shopee Pay
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                      </div>
                                      <?php
                                          }elseif($d['id_pembayaran'] == 4){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  BCA
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  Dana
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                      </div>
                                      <?php
                                          }elseif($d['id_pembayaran'] == 5){
                                      ?>   
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  BCA
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                          <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  COD
                                      </div>
                                      <?php
                                          }
                                      ?>   
                                  </div>
                                  <div class="form-group">
                                      <label for="txt_tglbayar">Tanggal Pembayaran</label>
                                      <input type="date" class="form-control form-control-order" placeholder="Tanggal Pembayaran" name="txt_tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt_status">Status Pesanan</label>
                                      <?php 
                                          if($d['status_pesanan'] == "Belum Dibayar" ){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                      </div>
                                      <?php 
                                          }elseif($d['status_pesanan'] == "Sedang Diproses"){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                      </div>
                                      <?php 
                                          }elseif($d['status_pesanan'] == "Selesai"){
                                      ?>
                                      <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                      </div>
                                      <?php
                                          }
                                      ?>
                                  </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <!-- End Modal Edit -->
                      <?php
                    }
                    //End Menampilkan List
                    ?>
                 
                  </tbody>
                </table>
              </div>
              <br>

              <!-- Pagination -->
              <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>> < </a>
                    </li>
                    <?php 
                    for($x=1;$x<=$total_halaman;$x++){
                      ?> 
                      <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                      <?php
                    }
                    ?>        
                    <li class="page-item">
                      <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>> </a>
                    </li>
                  </ul>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
//Memanggil Footer
include('../footer.php')
?>