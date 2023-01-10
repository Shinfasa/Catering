<?php
include('../header.php');

if(isset($_POST['create'])){
  $nama = ($_POST['txt_nama']);
  $harga = ($_POST['txt_harga']);
  $detail = ($_POST['txt_detail']);
  $fileName = $_FILES['gambar']['name'];
  $kategori = ($_POST['txt_kategori']);

// Simpan di Folder Gambar
  move_uploaded_file($_FILES['gambar']['tmp_name'], "../../../assets/img/menu/".basename($_FILES['gambar']['name']));

  $query=mysqli_query($koneksi,"INSERT INTO menu VALUES (NULL, '$nama', '$harga', '$detail', '$filename', '$kategori')");
  if($query){
    echo "<script>alert('Data Ditambahkan')</script>";
    echo "<script>location='menu.php'</script>";
  }
}

if(isset($_POST['update'])){
  $id = ($_POST['txt_id']); 
  $nama = ($_POST['txt_nama']);
  $harga = ($_POST['txt_harga']);
  $detail = ($_POST['txt_detail']);
  $kategori = ($_POST['txt_kategori']);
  $oldfile = $_POST['old'];
  $file = $_FILES['txt_gambar']['name'];

  if($file!="") {
    move_uploaded_file($_FILES['txt_gambar']['tmp_name'], "../../../assets/img/menu/".basename($_FILES['txt_gambar']['name']));
    if($oldfile != NULL){
    unlink("../../../assets/img/menu/".$oldfile);
    }
    $update=mysqli_query($koneksi,"UPDATE menu SET nama_menu='$nama', harga='$harga', detail='$detail', gambar='$file', id_kategori='$kategori' WHERE id_menu='$id'");

    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='menu.php'</script>";
    }
  }else{
    $update=mysqli_query($koneksi,"UPDATE menu SET nama_menu='$nama', harga='$harga', detail='$detail', id_kategori='$kategori' WHERE id_menu='$id'");

    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='menu.php'</script>";
    }
  }
}

if (isset($_GET['id_menu'])) {
  $id_menu = $_GET['id_menu'];
  $sql = "DELETE FROM menu WHERE id_menu='$id_menu'";
  $result = mysqli_query($koneksi,$sql);
  if($result){
    echo "<script>alert('Data di Hapus')</script>";
    echo "<script>location='menu.php'</script>";
  }
}
?>
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card" style="height:130vh; max-height: 1000px;">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0">Menu</h6>
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
              </div>
              <button class="btn btn-outline-primary btn-xs mb-0" style="margin-left: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModalCreate"><i class="uil uil-plus" style="font-size: 15px;"></i></button>
            </div>         
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Menu</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
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

                $data = mysqli_query($koneksi,"SELECT * FROM menu JOIN kategori ON menu.id_kategori = kategori.id_kategori;");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_pegawai = mysqli_query($koneksi,"SELECT * FROM menu JOIN kategori ON menu.id_kategori = kategori.id_kategori LIMIT $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                while($d = mysqli_fetch_array($data_pegawai)){
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $nomor++; ?></td>
                    <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_menu']; ?></h6></td>
                    <td class="text-center"><?php echo $d['harga']; ?></td>
                    <td class="text-truncate" style="max-width: 200px;"><?php echo $d['detail']; ?></td>
                    <td class="text-center">
                      <div>
                        <img src="../../../assets/img/menu/<?php echo $d['gambar']; ?>" class="avatar avatar-xxl me-3">
                      </div></td>
                      <td class="text-center"><?php echo $d['nama_kategori']; ?></td>
                      <td class="align-middle text-center">
                        <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit menu" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['id_menu']; ?>">
                          Edit
                        </a>
                        &nbsp;
                        <a onclick="return confirm('Anda Yakin Ingin Menghapus Data User')" href="menu.php?id_menu=<?php echo $d['id_menu']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete menu">
                          Delete
                        </a>
                      </td>
                    </tr>

                    <!-- Modal Create -->
                    <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="menu.php" method="POST" class="menu" enctype='multipart/form-data'>
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="txt_nama">Nama Menu</label>
                                <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="">
                              </div> 
                              <div class="form-group">
                                <label for="txt_harga">Harga Menu</label>
                                <input type="number" class="form-control form-control-menu" placeholder="Harga Menu" name="txt_harga" value="">
                              </div>
                              <div class="form-group">
                                <label for="txt_detail">Detail Menu</label>
                                <input type="text" class="form-control form-control-menu" placeholder="Detail Menu" name="txt_detail" value="">
                              </div>
                              <div class="form-group">
                                <label for="txt_gambar">Gambar Menu</label>
                                <input type="file" class="form-control form-control-menu" placeholder="Gambar Menu" name="gambar" value="">
                              </div>
                              <div class="form-group">
                                <label for="txt_kategori">Kategori</label>

                                <div style="font-size:15px;">
                                  <?php 
                                  $data = mysqli_query($koneksi,"SELECT * FROM kategori");
                                  while($u = mysqli_fetch_array($data)){
                                    ?>
                                    <input type="radio" name="txt_kategori" value="<?php echo $u['id_kategori']; ?>" style="margin-left:20px;">  <?php echo $u['nama_kategori']; ?>

                                    <?php 
                                  } 
                                  ?>
                                </div>
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
                    <div class="modal fade" id="exampleModalEdit<?php echo $d['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="menu.php" method="POST" class="menu" enctype='multipart/form-data'>
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" name="txt_id" value="<?php echo $d['id_menu']; ?>">
                              </div>
                              <img src="../../../assets/img/menu/<?php echo $d['gambar']; ?>"  style="width: 200px;">
                              <div class="form-group">
                                <br>
                                <input type="text" class="form-control form-control-user" name="old" value="<?php echo $d['gambar']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                <label for="txt_nama">Nama Menu</label>
                                <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $d['nama_menu']; ?>">
                              </div> 
                              <div class="form-group">
                                <label for="txt_harga">Harga Menu</label>
                                <input type="number" class="form-control form-control-menu" placeholder="Harga Menu" name="txt_harga" value="<?php echo $d['harga']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="txt_detail">Detail Menu</label>
                                <textarea class="form-control form-control-menu" name="txt_detail" placeholder="Detail Menu"><?php echo $d['detail']; ?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="txt_kategori">Kategori</label>

                                <div style="font-size:15px;">
                                  <?php 
                                  $data = mysqli_query($koneksi,"SELECT * FROM kategori");
                                  while($u = mysqli_fetch_array($data)){
                                    ?>

                                    <input type="radio" name="txt_kategori" value="<?php echo $d['id_kategori']; ?>" style="margin-left:20px;" <?php if($d['id_kategori']==$u['id_kategori']){ echo "checked";}else{echo "";} ?>>  <?php echo $u['nama_kategori']; ?>

                                    <?php 
                                  } 
                                  ?>
                                </div>
                              </div>  
                              <div class="form-group">
                                <label for="txt_gambar">Gambar Menu</label>
                                <input type="file" class="form-control form-control-menu" placeholder="Gambar Menu" name="txt_gambar" accept="image/jpg, image/jpeg, image/png" value="<?php echo $d['gambar']; ?>">
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
  </div>
  <?php
  include('../footer.php');
  ?>
