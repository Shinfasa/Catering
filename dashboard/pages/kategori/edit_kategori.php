<?php
    include('../header.php');

    if(isset($_POST['update'])){
        $id = ($_POST['txt_id']);
        $kategori = ($_POST['txt_nama']);
        $deskripsi = ($_POST['txt_des']);
      
        $update=mysqli_query($koneksi,"UPDATE kategori SET nama_kategori='$kategori', deskripsi='$deskripsi' WHERE id_kategori='$id'");
        if($update){
          echo "<script>alert('Data di Update')</script>";
          echo "<script>location='kategori.php'</script>";
        }
      }
    
    $id_kategori = $_GET['id_kategori'];
    $query = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $result = mysqli_query($koneksi, $query);
    $u = mysqli_fetch_array($result);
?>

<div class="container-fluid py-3">
  <div class="row">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold">Edit Kategori</h5>
      </div>
      <div>
        <div class="m-4">
          <form action="edit_kategori.php" method="POST" class="kategori">
            <div class="form-group">
              <input type="hidden" name="txt_id" value="">
            </div>
            <input type="text" class="text-center" hidden name="txt_id" value="<?php echo $u['id_kategori']; ?>">
            <div class="form-group">
              <label for="txt_nama">Nama Kategori</label>
              <input type="nama_kategori" class="form-control form-control-kategori"  placeholder="Nama Kategori" name="txt_nama" value="<?php echo $u['nama_kategori']; ?>">
            </div>
            <div class="form-group">
              <label for="txt_des">Deskripsi</label>
              <input type="deskripsi" class="form-control form-control-kategori" placeholder="Deskripsi" name="txt_des" value="<?php echo $u['deskripsi']; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-kategori btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
            <button class="btn btn-light btn-kategori btn-block"><a href="kategori.php">Kembali</button>
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