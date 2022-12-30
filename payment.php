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
        <div>
          <div class="m-4">
            <div>
              <h6 style="text-align: right;">Upload Bukti Pembayaran</h6>
            </div>            
            <form action="" method="POST" class="user">
              <div class="form-group pb-3">
                <label for="txt_harga">Username</label>
                <input type="text" class="form-control form-control-user" placeholder="Username" name="txt_harga" value="">
              </div>
              <div class="form-group pb-3">
                <label for="txt_detail">Alamat</label>
                <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_detail" value="">
              </div>
              <div class="form-group">
                <label for="txt_gambar">No. Handphone</label>
                <input type="text" class="form-control form-control-user" placeholder="628*****" name="txt_gambar" value="">
              </div>     
            </form>
          </div>
        </div>
    </div>
</main>
<!--Main layout-->


<?php
    include('footer.php');
?>