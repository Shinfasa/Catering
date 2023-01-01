<?php
include('../header.php');

if(isset($_POST['create'])){
    $pembayaran = ($_POST['txt_metode']);
  
    $query=mysqli_query($koneksi,"INSERT INTO pembayaran VALUES (NULL, '$pembayaran')");
      if($query){
        echo "<script>alert('Data Ditambahkan')</script>";
        echo "<script>location='pembayaran.php'</script>";
      }
    }
  ?>

  <div class="container-fluid py-3">
    <div class="row">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold">Tambah Data Metode Pembayaran</h5>
        </div>
        <div>
          <div class="m-4">
            <form action="add_pembayaran.php" method="POST" class="pembayaran">
              <div class="form-group">
                <input type="hidden" name="txt_id" value="">
              </div>
              <div class="form-group">
                <label for="txt_metode">Metode Pembayaran</label>
                <input type="text" class="form-control form-control-pembayaran" placeholder="Metode Pembayaran" name="txt_metode" value="">
              </div>

              <button type="submit" name="create" class="btn btn-pembayaran btn-block text-light" style="background-color: #E8853D;"><b>Simpan</b></button>
              <button class="btn btn-light btn-pembayaran btn-block"><a href="pembayaran.php">Kembali</button>
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