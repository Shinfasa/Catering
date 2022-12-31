<?php
include('../header.php');

if(isset($_POST['create'])){
  $user = ($_POST['txt_nama']);
  $email = ($_POST['txt_email']);
  $alamat = ($_POST['txt_alamat']);
  $nohp = ($_POST['txt_nohp']);
  $password = ($_POST['txt_pass']);
  $akses = ($_POST['txt_akses']);
  $fileName = $_FILES['gambar']['name'];

  // Simpan di Folder Gambar
  move_uploaded_file($_FILES['gambar']['tmp_name'], "../../../assets/img/user/".basename($_FILES['gambar']['name']));

  $query=mysqli_query($koneksi,"INSERT INTO user VALUES (NULL, '$user', '$email', '$alamat', '$nohp', '$password', '$fileName', '$akses')");


    if($query){
      echo "<script>alert('Data Ditambahkan')</script>";
      echo "<script>location='user.php'</script>";
    }
  }

  ?>

  <div class="container-fluid py-3">
    <div class="row">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold">Tambah Data User</h5>
        </div>
        <div>
          <div class="m-4">
            <form action="add_user.php" method="POST" class="user" enctype='multipart/form-data'>
              <div class="form-group">
                <input type="hidden" name="txt_id" value="">
              </div>
              <div class="form-group">
                <label for="txt_level">Level Akses</label>
                <div style="font-size:15px;">
                  <input type="radio" name="txt_akses" value="1" style="margin-left:20px;">  1 - Admin
                  <input type="radio" name="txt_akses" value="2" style="margin-left: 100px;">  2 - Customer
                </div>
              </div>
              <div class="form-group">
                <label for="txt_email">Email</label>
                <input type="email" class="form-control form-control-user" placeholder="Email" name="txt_email" value="">
              </div>
              <div class="form-group">
                <label for="txt_nama">Nama Lengkap</label>
                <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="">
              </div>
              <div class="form-group">
                <label for="txt_alamat">Alamat</label>
                <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="">
              </div>
              <div class="form-group">
                <label for="txt_nohp">No. Handphone</label>
                <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="">
              </div>  
              <div class="form-group">
                <label for="txt_pass">Password</label>
                <input type="password" class="form-control form-control-user" placeholder="Password" name="txt_pass" value=""> 
              </div>            
              <div class="form-group">
                <label for="gambar">Foto Profil</label>
                <input type="file" class="form-control form-control-user" name="gambar"> 
              </div>  
              <button type="submit" name="create" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Simpan</b></button>
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