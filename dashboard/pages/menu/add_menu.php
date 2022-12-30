<?php
include('../header.php');

if(isset($_POST['input'])){
  $password = ($_POST['password']);

  $query=mysqli_query($koneksi,"INSERT INTO menu VALUES ('".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."','".$_POST['level']."')");
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
            <form action="edit_user.php" method="POST" class="user">
              <div class="form-group">
                <input type="hidden" name="txt_id" value="">
              </div>
              <div class="form-group">
                <label for="txt_nama">Nama Menu</label>
                <input type="text" class="form-control form-control-user" placeholder="Nama Menu" name="txt_nama" value="">
              </div> 
              <div class="form-group">
                <label for="txt_harga">Harga Menu</label>
                <input type="number" class="form-control form-control-user" placeholder="Harga Menu" name="txt_harga" value="">
              </div>
              <div class="form-group">
                <label for="txt_detail">Detail Menu</label>
                <input type="text" class="form-control form-control-user" placeholder="Detail Menu" name="txt_detail" value="">
              </div>
              <div class="form-group">
                <label for="txt_gambar">Gambar Menu</label>
                <input type="file" class="form-control form-control-user" placeholder="Gambar Menu" name="txt_gambar" value="">
              </div>
              <div class="form-group">
                <label for="txt_kategori">Kategori</label>
                <div style="font-size:15px;">
                  <input type="radio" name="txt_kategori" value="1" style="margin-left:20px;">  Harian
                  <input type="radio" name="txt_kategori" value="2" style="margin-left: 100px;">  Prasmanan
                  <input type="radio" name="txt_kategori" value="2" style="margin-left: 100px;">  Kotakan
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
              <button class="btn btn-light btn-user btn-block"><a href="menu.php">Kembali</button>
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