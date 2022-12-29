<?php
include('header.php');

if(isset($_POST['create'])){
  $nama = ($_POST['txt_nama']);
  $deskripsi = ($_POST['txt_des']);

  $query=mysqli_query($koneksi,"INSERT INTO kategori VALUES (NULL, '$nama', '$deskripsi')");
    if($query){
      echo "<script>alert('Data Ditambahkan')</script>";
      echo "<script>location='kategori.php'</script>";
    }
  }

  ?>

  <div class="container-fluid py-3">
    <div class="row">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold">Tambah Data Kategori</h5>
        </div>
        <div>
          <div class="m-4">
            <form action="add_kategori.php" method="POST" class="kategori">
              <div class="form-group">
                <input type="hidden" name="txt_id" value="">
              </div>
              <div class="form-group">
                <label for="txt_nama">Nama Kategori</label>
                <input type="text" class="form-control form-control-kategori" placeholder="Nama Kategori" name="txt_nama" value="">
              </div>
              <div class="form-group">
                <label for="txt_des">Deskripsi</label>
                <input type="text" class="form-control form-control-kategori" placeholder="Deskripsi" name="txt_des" value="">
              </div> 
              <button type="submit" name="create" class="btn btn-kategori btn-block text-light" style="background-color: #E8853D;"><b>Simpan</b></button>
              <button class="btn btn-light btn-kategori btn-block"><a href="kategori.php">Kembali</button>
              </form>
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