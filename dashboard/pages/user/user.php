<?php
//Memanggil Header
include('../header.php');

//Fungsi Create
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

//Fungsi Update
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
    unlink("../../../assets/img/user/".$oldfile);
    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='user.php'</script>";
    }
  }
}

//Fungsi Delete
if(isset($_GET['id_user'])){
  $id_user = $_GET['id_user'];
  $sql = "DELETE FROM user WHERE id_user='$id_user'";
  $result = mysqli_query($koneksi,$sql);
  if($result){
    echo "<script>alert('Data di Delete')</script>";
    echo "<script>location='user.php'</script>";
  }
}
?>

<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card" style="height:100vh; max-height: 552px;">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0">User</h6>
            <div class="text-end" style="flex: 0 0 auto; width: 96%;">
              <button class="btn btn-outline-primary btn-xs mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalCreate"><i class="uil uil-plus" style="font-size: 15px;"></i></button>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama User</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Hp</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level Akses</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $batas = 5;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi,"SELECT * FROM user JOIN akses ON user.id_akses = akses.id_akses;");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_pegawai = mysqli_query($koneksi,"SELECT * FROM user JOIN akses ON user.id_akses = akses.id_akses LIMIT $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                while($d = mysqli_fetch_array($data_pegawai)){
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $nomor++; ?></td>
                    <td class="text-center" hidden><?php echo $d['id_user']; ?></td>
                    <td class="text-center">
                      <div class="d-flex px-2 py-1">
                        <?php  
                        if($d['gambar'] == NULL) {
                          ?>
                          <div>
                            <img src="../../../assets/img/user/default_profile.png" class="avatar avatar-sm me-3">
                          </div>
                          <?php 
                        }else{
                          ?>
                          <div>
                            <img src="../../../assets/img/user/<?php echo $d['gambar']; ?>" class="avatar avatar-sm me-3">
                          </div>
                          <?php  
                        }
                        ?>
                        <h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6>
                      </div>
                    </td>
                    <td class="text-center"><?php echo $d['email']; ?></td>
                    <td class="text-center"><?php echo $d['password']; ?></td>
                    <td class="text-center" style="word-wrap: break-word;min-width: 160px; max-width: 160px;white-space:normal;"><?php echo $d['alamat']; ?></td>
                    <td class="text-center"><?php echo $d['nohp']; ?></td>
                    <td class="text-center"><?php echo $d['hak_akses']; ?></td>
                    <td class="align-middle text-center">
                      <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['id_user']; ?>">
                        Edit
                      </a>
                      &nbsp;
                      <a onclick="return confirm('Anda Yakin Ingin Menghapus Data User')" href="user.php?id_user=<?php echo $d['id_user']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                        Delete
                      </a>
                    </td>
                  </tr>

                  <!-- Modal Create -->
                  <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Create User</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="user.php" method="POST" class="user" enctype='multipart/form-data'>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="txt_akses">Level Akses</label>
                              <div style="font-size:15px;">
                                <input type="radio" name="txt_akses" value="1" style="margin-left:20px;" required>  1 - Admin
                                <input type="radio" name="txt_akses" value="2" style="margin-left: 100px;" required>  2 - Customer
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txt_email">Email</label>
                              <input type="email" class="form-control form-control-user" placeholder="Email" name="txt_email" value="" required>
                            </div>
                            <div class="form-group">
                              <label for="txt_nama">Nama Lengkap</label>
                              <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="" required>
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
                              <input type="password" class="form-control form-control-user" placeholder="Password" name="txt_pass" value="" id="myInput" required>
                              <input type="checkbox" onclick="myFunctionInput()" style="margin-left: 10px; margin-top: 10px;"><span style="font-size: 14px; margin-left: 10px;">Show Password</span>
                            </div>            
                            <div class="form-group">
                              <label for="gambar">Foto Profil</label>
                              <input type="file" class="form-control form-control-user" name="gambar" accept="image/jpg, image/jpeg, image/png"> 
                            </div>  
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="create" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Create -->

                  <!-- Modal Edit -->
                  <div class="modal fade" id="exampleModalEdit<?php echo $d['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="user.php" method="POST" class="user" enctype='multipart/form-data'>
                          <div class="modal-body">
                            <input type="hidden" class="text-center" hidden name="txt_id" value="<?php echo $d['id_user']; ?>">
                            <div class="form-group">
                              <label for="txt_email">Email</label>
                              <input type="email" class="form-control form-control-user"  placeholder="Email" name="txt_email" value="<?php echo $d['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label for="txt_nama">Nama Lengkap</label>
                              <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="<?php echo $d['nama_user']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="txt_alamat">Alamat</label>
                              <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $d['alamat']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="txt_nohp">No. Handphone</label>
                              <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="<?php echo $d['nohp']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="txt_pass">Password</label>
                              <input type="password" class="form-control form-control-user" placeholder="Password" name="txt_pass" value="<?php echo $d['password']; ?>" id="myEdit">
                              <input type="checkbox" onclick="myFunctionEdit()" style="margin-left: 10px; margin-top: 10px;"><span style="font-size: 14px; margin-left: 10px;">Show Password</span>
                            </div>
                            <div class="form-group">
                              <label for="gambar">Foto Profil</label>
                              <input type="file" class="form-control form-control-user" name="txt_gambar" accept="image/jpg, image/jpeg, image/png">
                              <input type="hidden" name="old" value="<?php echo $d['gambar']; ?>">
                            </div>  
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Edit -->

                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          
        </div>
        <br>
          <nav>
                <ul class="pagination justify-content-center">
                  <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>> < </a>
                  </li>
                  <?php 
                  for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                  }
                  ?>        
                  <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>> </a>
                  </li>
                </ul>
              </nav>
      </div>
    </div>
  </div>
</div>

<!--- Show Password Create --->
<script>
  function myFunctionInput() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<!--- Show Password Edit --->
<script>
  function myFunctionEdit() {
  var x = document.getElementById("myEdit");
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