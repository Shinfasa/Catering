<?php
include('../header.php');

if(isset($_POST['update'])){
  $id = ($_POST['txt_id']);
  $user = ($_POST['txt_nama']);
  $alamat = ($_POST['txt_alamat']);
  $nohp = ($_POST['txt_nohp']);
  $password = ($_POST['txt_pass']);
  $oldfile = $_POST['old'];
  $file = $_FILES['txt_gambar']['name'];
    move_uploaded_file($_FILES['txt_gambar']['tmp_name'], "../../../assets/img/user/".basename($_FILES['txt_gambar']['name']));

  $update=mysqli_query($koneksi,"UPDATE user SET nama_user='$user', alamat='$alamat', nohp='$nohp', password='$password', gambar='$file' WHERE id_user='$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='user.php'</script>";
  }
}

$id_user = $_GET['id_user'];
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
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
          <form action="edit_user.php" method="POST" class="user" enctype='multipart/form-data'>
            <input type="hidden" class="text-center" hidden name="txt_id" value="<?php echo $u['id_user']; ?>">
            <div class="form-group">
              <label for="txt_email">Email</label>
              <input type="email" class="form-control form-control-user"  placeholder="Email" name="txt_email" value="<?php echo $u['email']; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="txt_nama">Nama Lengkap</label>
              <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="<?php echo $u['nama_user']; ?>">
            </div>
            <div class="form-group">
              <label for="txt_alamat">Alamat</label>
              <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $u['alamat']; ?>">
            </div>
            <div class="form-group">
              <label for="txt_nohp">No. Handphone</label>
              <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="<?php echo $u['nohp']; ?>">
            </div>
            <div class="form-group">
              <label for="txt_pass">Password</label>
              <input type="password" class="form-control form-control-user" placeholder="Password" name="txt_pass" value="<?php echo $u['password']; ?>" id="myInput">
              <input type="checkbox" onclick="myFunction()" style="margin-left: 10px; margin-top: 10px;"><span style="font-size: 14px; margin-left: 10px;">Show Password</span>
            </div>
            <div class="form-group">
              <label for="gambar">Foto Profil</label>
              <input type="file" class="form-control form-control-user" name="txt_gambar">
              <input type="hidden" name="old" value="<?php echo $u['gambar']; ?>">
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

<!--- Show Password --->
<script>
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php
include('../footer.php')
?>