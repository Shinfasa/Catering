<?php
include('header.php');
?>
    <div class="container-fluid py-3">
      <div class="row">

          <div class="card" style="height:100vh; max-height: 540px;">
            <div class="card-header pb-0">
            <div class="d-flex align-items-center mb-3">
                  <h6 class="mb-0">Kategori</h6>
                  <div class="text-end" style="flex: 0 0 auto; width: 96%;">
                  <a href="add_kategori.php" class="btn btn-outline-primary btn-xs mb-0">+</a>
                  </div>
                
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Kategori</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
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
        
                      $data = mysqli_query($koneksi,"SELECT * FROM kategori;");
                      $jumlah_data = mysqli_num_rows($data);
                      $total_halaman = ceil($jumlah_data / $batas);
 
                      $data_pegawai = mysqli_query($koneksi,"SELECT * FROM kategori LIMIT $halaman_awal, $batas");
                      $nomor = $halaman_awal+1;
                      while($d = mysqli_fetch_array($data_pegawai)){
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $nomor++; ?></td>
                        <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_kategori']; ?></h6></td>
                        <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['deskripsi']; ?></h6></td>
                        <td class="align-middle text-center">
                          <a href="edit_kategori.php?id_kategori=<?php echo $d['id_kategori'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit kategori">
                          Edit
                          </a>
                          &nbsp;
                          <a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="hapus_kategori.php?id_kategori=<?php echo $d['id_kategori'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit kategori">
                            Delete
                          </a>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
                <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>> < </a>
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
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>