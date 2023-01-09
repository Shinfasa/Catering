<?php 
    include('header.php');
?>

<!--Main layout -->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <div class="section-title">
      <br><br>
      <h2>Lupa Password</h2>
    </div>

    <!--Card-->
    <div class="card mb-3">
      <div class="m-4">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group pb-3">                
            <h5 class="text-center">Masukkan Email</h4>
            <br>
            <input type="email" name="txt_email" class="form-control form-control-user" placeholder="email@gmail.com">
          </div>
        </form>
        <a href="login.php" class="btn btn-user btn-block" style="color: #E8853D; text-align:left;"><b>Kembali</b></a>
        <button type="submit" name="pay" class="btn btn-user btn-block text-light font-weight-bold" style="background-color: #E8853D;">Lanjutkan</button>
      </div>
    </div>
  </main>
  <!--Main layout-->

<?php 
include ('footer.php');
?>