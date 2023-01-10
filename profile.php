<?php
  include('header.php');

  if(isset($_POST['update'])){
  $id = ($_POST['txt_id']);
  $user = ($_POST['txt_nama']);
  $alamat = ($_POST['txt_alamat']);
  $nohp = ($_POST['txt_nohp']);
  $password = ($_POST['txt_pass']);
  $oldfile = $_POST['old'];
  $file = $_FILES['txt_gambar']['name'];
  if($file!="") {
    move_uploaded_file($_FILES['txt_gambar']['tmp_name'], "assets/img/user/".basename($_FILES['txt_gambar']['name']));
    $update=mysqli_query($koneksi,"UPDATE user SET nama_user='$user', alamat='$alamat', nohp='$nohp', password='$password', gambar='$file' WHERE id_user='$idUser'"); 
    unlink(".assets/img/user/".$oldfile);
    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='profile.php'</script>";
    }
  }else{
    $update=mysqli_query($koneksi,"UPDATE user SET nama_user='$user', alamat='$alamat', nohp='$nohp', password='$password' WHERE id_user='$idUser'"); 
    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='profile.php'</script>";
    }
  }
}
?>

<br>
<br>

<body>

<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  
<div class="container">

  <div class="section-title">
      <h2>Edit Profile</h2>
  </div>

  <div class="row">
    <div>
      <div class="card">
        <div>
          <div class="m-4">
            <form action="" method="POST" class="user" enctype='multipart/form-data'>
              <?php 
                $data_user = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$idUser'");                
                $u = mysqli_fetch_array($data_user);
              ?>
              <div class="form-group pb-3 text-center">
                <?php if($u['gambar'] == NULL){ ?>
                <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/user/default_profile.png">    
                <?php }else{ ?>
                  <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/user/<?php echo $u['gambar']; ?>"> 
                <?php } ?>            
              </div>
              <div class="form-group pb-3">
                <label for="txt_gambar">Foto Profil</label>
                <input type="file" class="form-control form-control-user" name="txt_gambar">
                <input type="hidden" name="old" value="<?php echo $u['gambar']; ?>">
              </div> 
              <div class="form-group pb-3">
                <label for="txt_email">Email</label>
                <input type="email" class="form-control form-control-user"  placeholder="Email" name="txt_email" value="<?php echo $u['email']; ?>">
              </div> 
              <div class="form-group pb-3">
                <label for="txt_nama">Nama Lengkap</label>
                <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="<?php echo $u['nama_user']; ?>">
              </div>
              <div class="form-group pb-3">
                <label for="txt_alamat">Alamat</label>
                <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $u['alamat']; ?>">
              </div>
              <div class="form-group pb-3">
                <label for="txt_nohp">No. Handphone</label>
                <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="<?php echo $u['nohp']; ?>">
              </div>
              <div class="form-group pb-3">
                <label for="txt_pass">Password</label>
                <input type="password" class="form-control form-control-user" placeholder="Password" name="txt_pass" value="<?php echo $u['password']; ?>" id="myInput">
                <input type="checkbox" onclick="myFunction()" style="margin-left: 10px; margin-top: 10px;"><span style="font-size: 14px; margin-left: 10px;">Show Password</span>
              </div>
              <button type="submit" name="update" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
              <button class="btn btn-user btn-block" style="color: #E8853D;"><a href="index.php"><b>Kembali</b></a></button>                                       
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

</section>

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

  <!--   Core JS Files   -->
  <script src="../Catering/dashboard/assets/js/core/popper.min.js"></script>
  <script src="../Catering/dashboard/assets/js/core/bootstrap.min.js"></script>
  <script src="../Catering/dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../Catering/dashboard/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Catering/dashboard/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>

<?php
include 'footer.php';
?>