<?php
include 'header.php';

if (isset($_GET['id_menu']) && isset($_GET['jumlah'])) {

    $id_menu=$_GET['id_menu'];
    $jumlah=$_GET['jumlah'];

    $sql= "SELECT * FROM menu WHERE id_menu='$id_menu'";

    $query = mysqli_query($koneksi,$sql);
    $data = mysqli_fetch_array($query);
    $id_menu=$data['id_menu'];
    $nama_menu=$data['nama_menu'];
    $harga=$data['harga'];

}else {
    $id_menu="";
    $jumlah=0;
}

if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}


switch($aksi){  
    //Fungsi untuk menambah penyewaan kedalam cart
    case "tambah_produk":
    $itemArray = array($id_menu=>array('id_menu'=>$id_menu,'nama_menu'=>$nama_menu,'jumlah'=>$jumlah,'harga'=>$harga));
    if(!empty($_SESSION["keranjang"])) {
        if(in_array($data['id_menu'],array_keys($_SESSION["keranjang"]))) {
            foreach($_SESSION["keranjang"] as $k => $v) {
                if($data['id_menu'] == $k) {
                    $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"],$itemArray);
        }
    } else {
        $_SESSION["keranjang"] = $itemArray;
    }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

    if(!empty($_SESSION["keranjang"])) {
        foreach($_SESSION["keranjang"] as $k => $v) {
            if($_GET["id_menu"] == $k)
                unset($_SESSION["keranjang"][$k]);
            if(empty($_SESSION["keranjang"]))
                unset($_SESSION["keranjang"]);
        }
    }
    break;

    case "update":
    $itemArray = array($id_menu=>array('id_menu'=>$id_menu,'nama_menu'=>$nama_menu,'jumlah'=>$jumlah,'harga'=>$harga));
    if(!empty($_SESSION["keranjang"])) {
        foreach($_SESSION["keranjang"] as $k => $v) {
            if($_GET["id_menu"] == $k)
                $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"],$itemArray);
        }
    }
    break;
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
                            <th class="text-center" style="color: #384046;">Aksi</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <?php
                        $no=0;
                        $sub_total=0;
                        $total=0;
                        $total_berat=0;

                        if(!empty($_SESSION["keranjang"])):
                            foreach ($_SESSION["keranjang"] as $item):
                                $no++;
                                $sub_total = $item["jumlah"]*$item['harga'];
                                $total+=$sub_total;
                                ?>
                                <input type="hidden" name="id_menu[]" value="<?php echo $item["id_menu"]; ?>"/>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td class="text-center">
                                        <?php echo $item['nama_menu']; ?>
                                    </td>
                                    <td class="text-center"><?php echo rupiah($item['harga']); ?></td>
                                    <td class="text-center">
                                        <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]">

                                        <script>
                                            $("#jumlah<?php echo $no; ?>").bind('change', function () {
                                                var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                                                $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                                            });
                                            $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                                                return false;
                                            });

                                        </script>
                                    </td>
                                    <td class="text-center"><?php echo rupiah($sub_total); ?></td>
                                    <td class="text-center" style="color: #384046;">
                                        <form method="get">
                                            <input type="hidden" name="id_menu"  value="<?php echo $item['id_menu']; ?>" class="form-control">
                                            <input type="hidden" name="aksi"  value="update" class="form-control">
                                            <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlaha<?php echo $no; ?>" value="" class="form-control">
                                            <input type="submit" class="btn btn-warning btn-xs" value="Update">
                                        </form>
                                        <a href="cart.php?id_menu=<?php echo $item['id_menu']; ?>&aksi=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                                    </td>
                                </tr>
                                <?php 
                            endforeach;
                        endif;
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
                    <p style="color: #384046;">1 menu</p>
                    <p style="color: #384046;">Rp 50.000</p>
                </div>
                <hr style="padding: 2px; margin: 10px;">
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