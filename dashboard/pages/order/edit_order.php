<?php
    include('../header.php');

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
    
    $id_order = $_GET['id_order'];
    $query = "SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran WHERE orders.id_order='$id_order';";
    $result = mysqli_query($koneksi, $query);
    $u = mysqli_fetch_array($result);
?>

<div class="container-fluid py-3">
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold">Edit Order</h5>
                    </div>
                        <div>
                            <div class="m-4">
                                <form action="edit_order.php" method="POST" class="order">
                                    <div class="form-group">
                                        <input type="hidden" name="txt_id" value="<?php echo $u['id_order']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_nama">Nama Customer</label>
                                        <input type="nama" class="form-control form-control-order" placeholder="Nama Customer" name="txt_nama" value="<?php echo $u['nama_user']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_tglpesan">Tanggal Pemesanan</label>
                                        <input type="date" class="form-control form-control-order" name="txt_tglpesan" value="<?php echo $u['tgl_pesan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_tglpakai">Tanggal Pemakaian</label>
                                        <input type="datetime-local" class="form-control form-control-order" name="txt_tglpakai" value="<?php echo $u['tgl_pakai']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_menu">Nama Menu</label>
                                        <input type="text" class="form-control form-control-order" id="exampleFisrtName" placeholder="Nama Menu" name="txt_menu" value="<?php echo $u['nama_menu']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_note">Catatan</label>
                                        <input type="text" class="form-control form-control-order" placeholder="Catatan" name="txt_note" value="<?php echo $u['catatan_order']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_hrgsatuan">Harga Satuan</label>
                                        <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_hrgsatuan" value="<?php echo $u['harga_satuan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_jml">Jumlah Pesanan</label>
                                        <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_jml" value="<?php echo $u['jumlah']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_total">Total Harga</label>
                                        <input type="number" class="form-control form-control-order" placeholder="Total Harga" name="txt_total" value="<?php echo $u['total_harga']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_bayar">Metode Pembayaran</label>
                                        <?php 
                                            if($u['id_pembayaran'] == 1 ){
                                        ?>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" checked disabled>   BRI
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  BCA
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                        </div>
                                        <?php 
                                            }elseif($u['id_pembayaran'] == 2){
                                        ?>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  BCA
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                        </div>
                                        <?php
                                            }elseif($u['id_pembayaran'] == 3){
                                        ?>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled> disabled BCA
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  Shopee Pay
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Dana
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                        </div>
                                        <?php
                                            }elseif($u['id_pembayaran'] == 4){
                                        ?>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_bayar" value="1" style="margin-left:20px;" disabled>   BRI
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  BCA
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  Shopee Pay
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" checked disabled>  Dana
                                            <input type="radio" name="txt_bayar" value="2" style="margin-left: 50px;" disabled>  COD
                                        </div>
                                        <?php
                                            }elseif($u['id_pembayaran'] == 5){
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
                                        <input type="date" class="form-control form-control-order" placeholder="Tanggal Pembayaran" name="txt_tglbayar" value="<?php echo $u['tgl_bayar']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="txt_status">Status Pesanan</label>
                                        <?php 
                                            if($u['status_pesanan'] == "Belum Dibayar" ){
                                        ?>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                            <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                            <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                        </div>
                                        <?php 
                                            }elseif($u['status_pesanan'] == "Sedang Diproses"){
                                        ?>
                                        <div style="font-size:15px;">
                                            <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                            <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                            <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                        </div>
                                        <?php 
                                            }elseif($u['status_pesanan'] == "Selesai"){
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
                                    <button type="submit" name="update" class="btn btn- btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
                                    <button class="btn btn-light btn- btn-block"><a href=".php">Kembali</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>