<?php
//Memanggil Header  
include('../header.php');

//Fungsi Update
if(isset($_POST['update'])){
  $id = ($_POST['txt_id']);
  $oldfile = $_POST['old'];
  $file = $_FILES['txt_gambar']['name'];
  if($file!="") {
    move_uploaded_file($_FILES['txt_gambar']['tmp_name'], "../../../assets/img/iklan/".basename($_FILES['txt_gambar']['name']));
    $update=mysqli_query($koneksi,"UPDATE carousel SET gambar='$file' WHERE id_car='$id'"); 
    unlink("../../../assets/img/iklan/".$oldfile);
    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='iklan.php'</script>";
    }
  }
}

?>
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card" style="height:100vh; max-height: 552px;">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0">Iklan</h6>
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $batas = 10;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
                
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($koneksi,"SELECT * FROM carousel;");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                
                $data_pegawai = mysqli_query($koneksi,"SELECT * FROM carousel LIMIT $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                //Menampilkan List
                while($d = mysqli_fetch_array($data_pegawai)){
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $nomor++; ?></td>
                    <td class="text-center" hidden><?php echo $d['id_car']; ?></td>
                    <td class="text-center">
                      <div>
                        <img src="../../../assets/img/iklan/<?php echo $d['gambar']; ?>"  style="width: 200px;">
                      </div></td>
                      <td class="align-middle text-center">
                        <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Iklan" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['id_car']; ?>">
                          Edit
                        </a>
                        &nbsp;
                        <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Iklan')" href="iklan.php?id_car=<?php echo $d['id_car'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete Iklan">
                          Delete
                        </a>
                      </td>
                    </tr>

                    <!-- Modal Create -->
                    <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Iklan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="iklan.php" method="POST" class="iklan">
                            <div class="modal-body">
                              <div class="form-group">
                                <label for="txt_gambar">Gambar</label>
                                <input type="file" class="form-control form-control-iklan" placeholder="Gambar" name="gambar" value="">
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
                    <div class="modal fade" id="exampleModalEdit<?php echo $d['id_car'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Iklan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="iklan.php" method="POST" class="iklan" enctype='multipart/form-data'>
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" name="txt_id" value="<?php echo $d['id_car']; ?>">
                              </div>
                              <img src="../../../assets/img/iklan/<?php echo $d['gambar']; ?>"  style="width: 200px;">
                              <div class="form-group">
                                <br>
                                <input type="text" class="form-control form-control-user" name="old" value="<?php echo $d['gambar']; ?>" disabled>
                              </div>
                              <div class="form-group">
                                <br>
                                <label for="txt_gambar">Gambar</label>
                                <input type="file" class="form-control form-control-pembayaran" placeholder="Gambar" name="txt_gambar" accept="image/jpg, image/jpeg, image/png">
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
                    //End Menampilkan List
                  ?>

                </tbody>
              </table>
            </div>
          </div>
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
  <?php
  include('../footer.php')
?>