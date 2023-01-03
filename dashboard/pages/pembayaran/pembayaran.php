<?php
//Memanggil Header
include('../header.php');

//Fungsi Create
if(isset($_POST['create'])){
  $pembayaran = ($_POST['txt_metode']);
  $no = ($_POST['txt_no']);
  
  $query=mysqli_query($koneksi,"INSERT INTO pembayaran VALUES (NULL, '$pembayaran', '$no')");
  if($query){
    echo "<script>alert('Data Ditambahkan')</script>";
    echo "<script>location='pembayaran.php'</script>";
  }
}

//Fungsi Update
if(isset($_POST['update'])){
  $id = ($_POST['txt_id']);
  $pembayaran = ($_POST['txt_metode']);
  $no = ($_POST['txt_no']);

  $update=mysqli_query($koneksi,"UPDATE pembayaran SET metode_pembayaran='$pembayaran', no_rek='$no' WHERE id_pembayaran='$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='pembayaran.php'</script>";
  }
}

//Fungsi Delete
if(isset($_GET['id_pembayaran'])){
  $id_pembayaran = $_GET['id_pembayaran'];
  $sql = "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
  $result = mysqli_query($koneksi,$sql);
  if($result){
    echo "<script>alert('Data di Delete')</script>";
    echo "<script>location='pembayaran.php'</script>";
  }
}
?>

<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card" style="height:100vh; max-height: 540px;">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0">Metode Pembayaran</h6>
            <div class="text-end" style="flex: 0 0 auto; width: 83%;">
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
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metode Pembayaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Rekening</th>
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

                $data = mysqli_query($koneksi,"SELECT * FROM pembayaran;");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_pegawai = mysqli_query($koneksi,"SELECT * FROM pembayaran LIMIT $halaman_awal, $batas");
                $nomor = $halaman_awal+1;

                //Menampilkan List
                while($d = mysqli_fetch_array($data_pegawai)){
                  ?>
                  <tr>
                    <td class="text-center"><?php echo $nomor++; ?></td>
                    <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['metode_pembayaran']; ?></h6></td>
                    <td class="text-center"><?php echo $d['no_rek']; ?></td>
                    <td class="align-middle text-center">
                      <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Pembayaran" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['id_pembayaran']; ?>">
                        Edit
                      </a>
                      &nbsp;
                      <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Pembayaran')" href="pembayaran.php?id_pembayaran=<?php echo $d['id_pembayaran'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Pembayaran">
                        Delete
                      </a>
                    </td>
                  </tr>

                  <!-- Modal Create -->
                  <div class="modal fade" id="exampleModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Pembayaran</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="pembayaran.php" method="POST" class="pembayaran">
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" name="txt_id" value="">
                            </div>
                            <div class="form-group">
                              <label for="txt_metode">Metode Pembayaran</label>
                              <input type="text" class="form-control form-control-pembayaran" placeholder="Metode Pembayaran" name="txt_metode" value="">
                            </div>
                            <div class="form-group">
                              <label for="txt_metode">No. Rekening</label>
                              <input type="text" class="form-control form-control-pembayaran" placeholder="No. Rekening" name="txt_no" value="">
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
                  <div class="modal fade" id="exampleModalEdit<?php echo $d['id_pembayaran'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pembayaran</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="pembayaran.php" method="POST" class="pembayaran">
                          <div class="modal-body">
                            <div class="form-group">
                              <input type="hidden" name="txt_id" value="<?php echo $d['id_pembayaran']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="txt_metode">Metode Pembayaran</label>
                              <input type="text" class="form-control form-control-pembayaran" placeholder="Nama Metode Pembayaran" name="txt_metode" value="<?php echo $d['metode_pembayaran']; ?>">
                            </div>
                            <div class="form-group">
                              <label for="txt_no">No. Rekening</label>
                              <input type="text" class="form-control form-control-pembayaran" placeholder="No Rekening" name="txt_no" value="<?php echo $d['no_rek']; ?>">
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
//Memanggil Footer
include('../footer.php')
?>