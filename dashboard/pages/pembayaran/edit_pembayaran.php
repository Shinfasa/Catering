<?php
include('../header.php');

if(isset($_POST['update'])){
    $id = ($_POST['txt_id']);
    $pembayaran = ($_POST['txt_metode']);

    $update=mysqli_query($koneksi,"UPDATE pembayaran SET metode_pembayaran='$pembayaran' WHERE id_pembayaran='$id'");
    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='pembayaran.php'</script>";
  }
}

$id_pembayaran = $_GET['id_pembayaran'];
$query = "SELECT * FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'";
$result = mysqli_query($koneksi, $query);
$u = mysqli_fetch_array($result);
?>

<div class="container-fluid py-3">
  <div class="row">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold">Edit Data Metode Pembayaran</h5>
        </div>
        <div>
            <div class="m-4">
                <form action="edit_pembayaran.php" method="POST" class="pembayaran">
                    <div class="form-group">
                        <input type="hidden" name="txt_id" value="">
                    </div>
                    <div class="form-group">
                        <label for="txt_metode">Metode Pembayaran</label>
                        <input type="text" class="form-control form-control-pembayaran" placeholder="Nama Metode Pembayaran" name="txt_metode" value="">
                    </div> 
                    <button type="submit" name="update" class="btn btn-pembayaran btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
                    <button class="btn btn-light btn-pembayaran btn-block"><a href="pembayaran.php">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include('../footer.php')
?>