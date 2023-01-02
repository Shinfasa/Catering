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
  if($file!="") {
    move_uploaded_file($_FILES['txt_gambar']['tmp_name'], "../../../assets/img/user/".basename($_FILES['txt_gambar']['name']));
    $update=mysqli_query($koneksi,"UPDATE user SET nama_user='$user', alamat='$alamat', nohp='$nohp', password='$password', gambar='$file' WHERE id_user='$id'"); 
    unlink();
    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='user/user.php'</script>";
    }
  }
}

$id_user = $idUser;
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = mysqli_query($koneksi, $query);
$u = mysqli_fetch_array($result);
?>

    <div class="card shadow-lg mx-4 ">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../../../assets/img/user/<?php echo $gambar; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $userName; ?>
              </h5>
            </div>
          </div>          
        </div>
      </div>
    </div>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-auto">
          <div class="card" style="height:66vh; max-height: 680px;">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button type="submit" name="simpan" class="btn btn-sm ms-auto text-light font-weight-bold" style="background-color: #E8853D;">Simpan</button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Nama Lengkap</label>
                    <input class="form-control" type="text" name="txt_nama" value="<?php echo $userName; ?>">
                    <input class="form-control" type="hidden" name="txt_id" value="<?php echo $idUser; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email</label>
                    <input class="form-control" type="email" name="txt_email" value="<?php echo $userMail; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No. Handphone</label>
                    <input class="form-control" type="text" name="txt_nohp" value="<?php echo $nohp ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text" name="txt_alamat" value="<?php echo $alamat; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" id="myInput" type="password" name="txt_pass" value="<?php echo $userPass ?>">
                    <input type="checkbox" onclick="myFunction()" style="margin-left: 10px; margin-top: 10px;"><span style="font-size: 14px; margin-left: 10px;">Show Password</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gambar">Foto Profil</label>
                    <input type="file" class="form-control  form-control-user" name="txt_gambar">
                    <input type="hidden" name="old" value="<?php echo $u['gambar']; ?>">
                  </div> 
                </div>
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