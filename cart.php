<?php
include 'header.php';
  if ($_SESSION['akses'] == 2 || empty($_SESSION['akses'])) {
$user_id = $idUser;

if(isset($_POST['delete'])){
   $cart_id = $_POST['id_keranjang'];
   $delete_cart_item = $koneksi->prepare("DELETE FROM `keranjang` WHERE id_keranjang = ?");
   $delete_cart_item->execute([$cart_id]);
   $message[] = 'produk di keranjang dihapus!';
}

if(isset($_POST['delete_all'])){
   $delete_cart_item = $koneksi->prepare("DELETE FROM `kategori` WHERE id_user = ?");
   $delete_cart_item->execute([$user_id]);
   // header('location:cart.php');
   $message[] = 'dihapus semua produk di keranjang!';
}

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['id_keranjang'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $koneksi->prepare("UPDATE `keranjang` SET qty = ? WHERE id_keranjang = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'jumlah produk di keranjang diperbarui';
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
                            <th class="text-center" style="color: #384046;">Hapus</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <?php
                            $grand_total = 0;
                            $select_cart = $koneksi->prepare("SELECT * FROM `keranjang` WHERE id_user = ?  ORDER BY id_keranjang DESC");
                            $select_cart->execute([$user_id]);
                            if($select_cart->rowCount() > 0){
                                while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                        ?>                        
                        <tr>
                            <form action="" method="post" class=""> 
                            <input type="hidden" name="id_keranjang" value="<?= $fetch_cart['id_keranjang']; ?>">                        
                            <td class="text-center"> <?php echo $no++ ?> </td>
                            <td class="text-center"> 
                                <img src="assets/img/menu/<?php $fetch_cart['gambar']; ?>" alt="">
                                <br>
                                <?php $fetch_cart['nama_menu']; ?>
                            </td>
                            <td class="text-center"><?php echo rupiah($fetch_cart['harga']); ?></td>
                            <td class="text-center">
                                <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['qty']; ?>" maxlength="2">
                            </td>  
                            <td class="text-center"> <?php echo rupiah($sub_total = ($fetch_cart['harga'] * $fetch_cart['qty'])); ?></td> 
                            <td class="text-center"><button type="submit" class="bi bi-trash" name="delete" onclick="return confirm('Apakah anda yakin akan menghapus menu ini?')" ></button></td>
                            </form>
                        </tr>                        
                        <?php
     	                    $grand_total += $sub_total;
                        }
                            }else{
                                echo '<p class="empty">keranjang kosong</p>';
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
                    <p style="color: #384046;">Rp <?php echo rupiah($grand_total); ?> </p>
                </div>
                <hr style="padding: 2px; margin: 10px;">
                <button type="submit" name="update_qty" class="btn mb-3" style="background-color: #E8853D; color:#fff;">Update</button>
                <a href="checkout.php" class="btn mb-3 <?= ($grand_total > 1)?'':'disabled'; ?>">Check Out</a>
            </div>
            <div class="more-btn">
                <form action="" method="post">
                    <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all" onclick="return confirm('Hapus semua produk dikeranjang?');">Kosongkan</button>
                </form>
                <a href="menu.php" class="btn">Lanjut belanja</a>
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