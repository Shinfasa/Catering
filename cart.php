<?php
include 'header.php';
if ($_SESSION['akses'] == 2 || empty($_SESSION['akses'])) {

    if(isset($_POST['delete'])){
     $id_keranjang = $_POST['id_keranjang'];
     $delete_cart_item = mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_keranjang='$id_keranjang'");
     $message[] = 'produk di keranjang dihapus!';
     echo "<script>alert('Produk di keranjang dihapus!')</script>";
 }

 if(isset($_POST['delete_all'])){
     $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
     $delete_cart_item->execute([$user_id]);
   // header('location:cart.php');
     $message[] = 'dihapus semua produk di keranjang!';
 }

 if(isset($_POST['update_qty'])){
     $id_keranjang = $_POST['id_keranjang'];
     $qty = $_POST['qty'];
     $update_qty = mysqli_query($koneksi, "UPDATE keranjang SET qty = '$qty' WHERE id_keranjang ='$id_keranjang'");
     $message[] = 'jumlah produk di keranjang diperbarui';
     echo "<script>alert('Jumlah produk di keranjang diperbarui')</script>";
 }

 $grand_total = 0;
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
        <div class="card-body align-items-stretch mt-0">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="color: #384046;">No.</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Harga</th>
                            <th class="text-center" style="color: #384046;">Qty</th>
                            <th class="text-center" style="color: #384046;">Sub Total Harga</th>
                            <th class="text-center" style="color: #384046;">Aksi</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <?php
                        $grand_total = 0;
                        $data = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = '$idUser'");
                        $cek = mysqli_num_rows($data);
                        if($cek > 0){
                            while($fetch_cart = mysqli_fetch_array($data)){
                                ?>                        
                                <tr>
                                    <form action="" method="post"> 
                                        <input type="hidden" name="id_keranjang" value="<?= $fetch_cart['id_keranjang']; ?>">                        
                                        <td class="text-center"> <?php echo "1"; ?> </td>
                                        <td class="text-center"> 
                                            <img width="100px" src="assets/img/menu/<?php echo $fetch_cart['gambar']; ?>" alt="">
                                            <br>
                                            <?php echo $fetch_cart['nama_menu']; ?>
                                        </td>
                                        <td class="text-center"><?php echo rupiah($fetch_cart['total_harga']); ?></td>
                                        <td class="text-center">
                                            <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['qty']; ?>" maxlength="2">
                                        </td>  
                                        <td class="text-center"> <?php echo rupiah($sub_total = ($fetch_cart['total_harga'] * $fetch_cart['qty'])); ?></td> 
                                        <td class="text-center">
                                            <button type="submit" class="bi bi-arrow-clockwise" name="update_qty"></button>
                                            <button type="submit" class="bi bi-trash" name="delete" onclick="return confirm('Apakah anda yakin akan menghapus menu ini?')" ></button>
                                        </td>
                                    </form>
                                </tr>                        
                                <?php
                                $grand_total += $sub_total;
                            }
                        }else{
                            echo '<p>keranjang kosong</p>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card align-items-stretch mt-0" style="border-radius:0;">
            <div>
                <h5 class="text-center pt-3"><b>Total Harga</b></h5>
                <hr style="padding: 2px; margin: 10px;">
                <div class="d-flex justify-content-between p-2">
                    <p style="color: #384046;">Grand Total</p>
                    <p style="color: #384046;"><?php echo rupiah($grand_total); ?> </p>
                </div>
                <hr style="padding: 2px; margin: 10px;">
                <a href="checkout.php" class="btn mb-3 <?= ($grand_total > 1)?'':'disabled'; ?>">Check Out</a>
            </div>
        </div>
    </div>

</section>
<!-- End Section -->

</body>
<br>
<?php
}else{

  echo "<script>alert('Anda adalah Admin!')</script>";
  echo "<script>location='dashboard/'</script>"; 
}
include('footer.php');
?>