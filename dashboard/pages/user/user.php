<?php
include('../header.php')
?>
<div class="container-fluid py-3">
  <div class="row">
    <div class="col-12">
      <div class="card" style="height:100vh; max-height: 540px;">
        <div class="card-header pb-0">
          <div class="d-flex align-items-center mb-3">
            <h6 class="mb-0">User</h6>
            <div class="text-end" style="flex: 0 0 auto; width: 96%;">
              <a href="add_user.php" class="btn btn-outline-primary btn-xs mb-0">+</a>
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
                $batas = 10;
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
                        <div>
                          <img src="../../../assets/img/user/<?php echo $d['gambar']; ?>" class="avatar avatar-sm me-3">
                        </div>
                        <h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6>
                      </div>
                    </td>
                    <td class="text-center"><?php echo $d['email']; ?></td>
                    <td class="text-center"><?php echo $d['password']; ?></td>
                    <td class="text-center"><?php echo $d['alamat']; ?></td>
                    <td class="text-center"><?php echo $d['nohp']; ?></td>
                    <td class="text-center"><?php echo $d['hak_akses']; ?></td>
                    <td class="align-middle text-center">
                      <a href="edit_user.php?id_user=<?php echo $d['id_user'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                      &nbsp;
                      <a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="hapus_user.php?id_user=<?php echo $d['id_user'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete user">
                        Delete
                      </a>
                    </td>
                  </tr>
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
                <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>> <i class="ni ni-bold-left"></i> </a>
              </li>
              <?php 
              for($x=1;$x<=$total_halaman;$x++){
                ?> 
                <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
              }
              ?>        
              <li class="page-item">
                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>><i class="ni ni-bold-right"></i> </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('../footer.php')
?>