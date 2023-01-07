<?php
include('header.php');

if(isset($_POST['pay'])){
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

<!--Main layout -->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <div class="section-title">
      <br><br>
      <h2>Pembayaran</h2>
    </div>

    <!--Card-->
    <div class="card mb-3">
      <div class="m-4">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group pb-3">                
            <h6 style="text-align: center;">Upload Bukti Transfer</h6>
            <br>
            <input type="file" name="bukti" class="form-control form-control-user">
          </div>
        </form>
        <a href="order.php" class="btn btn-user btn-block" style="color: #E8853D;"><b>Kembali</b></a>
        <button type="submit" name="pay" class="btn btn-user btn-block text-light font-weight-bold" style="background-color: #E8853D;">Upload</button>
      </div>
    </div>
  </main>
  <!--Main layout-->


  <?php
  include('footer.php');
?>