<?php
include('../header.php');

if(isset($_POST['update'])){
  $id = ($_POST['txt_id']);
  $gambar = ($_POST['txt_gambar']);

  $update=mysqli_query($koneksi,"UPDATE iklan SET gambar='$gambar' WHERE id_car='$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='iklan.php'</script>";
  }
}

$id_car = $_GET['id_car'];
$query = "SELECT * FROM carousel WHERE id_car = '$id_car'";
$result = mysqli_query($koneksi, $query);
$u = mysqli_fetch_array($result);

?>

<div class="container-fluid py-3">
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold">Edit Data User</h5>
      </div>
      <div>
        <div class="m-4">
          <form action="edit_user.php" method="POST" class="user">
            <div class="form-group">
              <input type="hidden" name="txt_id" value="">
            </div>
            <input type="text" class="text-center" hidden name="txt_id" value="<?php echo $u['id_car']; ?>">
            <div class="form-group">
              <label for="txt_gambar">Gambar</label>
              <input type="file" class="form-control form-control-user"  placeholder="Email" name="txt_email" value="<?php echo $u['gambar']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
            <button class="btn btn-light btn-user btn-block"><a href="user.php">Kembali</button>
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