<?php
include('../header.php');

if(isset($_POST['create'])){
  $nama = ($_POST['txt_nama']);
  $harga = ($_POST['txt_harga']);
  $detail = ($_POST['txt_detail']);
  $gambar = ($_POST['txt_gambar']);
  $kategori = ($_POST['txt_kategori']);

  $query=mysqli_query($koneksi,"INSERT INTO menu VALUES (NULL, '$nama', '$harga', '$detail', '$gambar', '$kategori')");
  if($query){
    echo "<script>alert('Data Ditambahkan')</script>";
    echo "<script>location='menu.php'</script>";
  }
}

?>

  <div class="container-fluid py-3">
    <div class="row">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h5 class="m-0 font-weight-bold">Tambah Data Menu</h5>
        </div>
        <div>
          <div class="m-4">
            <form action="add_menu.php" method="POST" class="menu">
              <div class="form-group">
                <input type="hidden" name="txt_id" value="">
              </div>
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
                <input type="file" class="form-control form-control-menu" placeholder="Gambar Menu" name="txt_gambar" value="">
              </div>
              <div class="form-group">
                <label for="txt_kategori">Kategori</label>
                <div style="font-size:15px;">
                  <input type="radio" name="txt_kategori" value="1" style="margin-left:20px;">  Harian
                  <input type="radio" name="txt_kategori" value="2" style="margin-left: 100px;">  Prasmanan
                  <input type="radio" name="txt_kategori" value="2" style="margin-left: 100px;">  Kotakan
                </div>
              </div>
              <button type="submit" name="create" class="btn btn-menu btn-block text-light" style="background-color: #E8853D;"><b>Simpan</b></button>
              <button class="btn btn-light btn-menu btn-block"><a href="menu.php">Kembali</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include('../footer.php');
?>