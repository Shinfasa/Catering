<?php
include 'header.php';

class Item{
 var $id_menu;
 var $nama_menu;
 var $harga;
 var $qty;
}

if(isset($_GET['id_menu']) && !isset($_POST['update']))  { 
    $sql = "SELECT * FROM menu WHERE id_menu=".$_GET['id_menu'];
    $result = mysqli_query($koneksi, $sql);
    $product = mysqli_fetch_object($result); 
    $item = new Item();
    $item->id_menu = $product->id_menu;
    $item->nama_menu = $product->nama_menu;
    $item->harga = $product->harga;
    $item->qty = 1;

    //Periksa produk dalam keranjang
    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart);$i++)
        if ($cart[$i]->id_menu == $_GET['id_menu']){
            $index = $i;
            break;
        }
        if($index == -1) 
            $_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
        else {
            
            if (($cart[$index]->qty))
                 $cart[$index]->qty ++;
                 $_SESSION['cart'] = $cart;
        }
}

//Menghapus produk dalam keranjang
if(isset($_GET['index']) && !isset($_POST['delete'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
}

// Perbarui jumlah dalam keranjang
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['qty'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->qty = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
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
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Hapus</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <?php 
                            $cart = unserialize(serialize($_SESSION['cart']));
                            $no = 1;
                            $s = 0;
                            $index = 0;
                            for($i=0; $i<count($cart); $i++){
                                $s += $cart[$i]->harga * $cart[$i]->qty;
                        ?>	
                        <tr>                            
                            <td class="text-center"> <?php echo $no++ ?> </td>
                            <td class="text-center"> <?php echo $cart[$i]->nama_menu; ?> </td>
                            <td class="text-center">Rp. <?php echo $cart[$i]->harga; ?> </td>
                            <td class="text-center"> <input type="number" min="1" value="<?php echo $cart[$i]->qty; ?>" name="qty[]"> </td>  
                            <td class="text-center"> Rp.<?php echo $cart[$i]->harga * $cart[$i]->qty; ?> </td> 
                            <td class="text-center"><a class="bi bi-trash" href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Apakah anda yakin akan menghapus menu ini?')" ></a></td>
                        </tr>
                        <?php
     	                    $index++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card align-items-stretch mt-0" style="border-radius:0;">
            <div>
                <h5 class="text-center pt-3"><b>Total Harga</b></h5>
                <hr style="padding: 2px; margin: 10px;">
                <div class="d-flex justify-content-between p-2">
                    <p style="color: #384046;">Sub Total</p>
                    <p style="color: #384046;">Rp <?php echo $s; ?> </p>
                </div>
                <hr style="padding: 2px; margin: 10px;">
                <button class="btn mb-3" style="background-color: #E8853D; color:#fff;">Update</button>
                <a href="checkout.php" class="btn mb-3">Check Out</a>
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