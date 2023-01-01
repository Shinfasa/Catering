<?php
    include('header.php');    
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
            <form action="" method="POST" class="user">
              <div class="form-group pb-3">                
                <h6 style="text-align: center;">Upload Bukti Transfer</h6>
                <br>
                <input type="file" class="form-control form-control-user">
              </div>
            </form>
            <a href="order.php" class="btn btn-user btn-block text-light font-weight-bold" style="background-color: #E8853D;">Upload</a>
              <button type="submit" name="submit" class="btn btn-user btn-block" style="color: #E8853D;"><b>Kembali</b></button>
        </div>
    </div>
</main>
<!--Main layout-->


<?php
    include('footer.php');
?>