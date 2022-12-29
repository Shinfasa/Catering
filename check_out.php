<?php
include 'header.php';
?>

<!--Main layout -->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <div class="section-title">
      <br><br>
      <h2>Chek Out</h2>
    </div>

        <!-- Cart -->
        <ul class="list-group mb-3 z-depth-1">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h4 class="my-0">Ice Cream Cone</h4>
              <p>Matcha</p>
            </div>
            <span class="text-muted">Rp.10.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Ice Cream Cone</h6>
              <p>Strawberry</p>
            </div>
            <span class="text-muted">Rp.10.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Ice Cream Cone</h6>
              <p>Vanilla</p>
            </div>
            <span class="text-muted">Rp.10.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Ice Cream Cone</h6>
              <p>Chocolate</p>
            </div>
            <span class="text-muted">Rp.10.000</span>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total (IDR)</span>
            <strong>Rp.40.000</strong>
          </li>
        </ul>
        <!-- Cart -->
        <!--Card-->
        <div class="card">

          <!--Card content-->
          <form class="card-body" action="" method="post" name="frmShopping" id="frmShopping" enctype="multipart/form-data">


            <!--Username-->
            <div class="md-form input-group pl-0 mb-5">
              <input type="text" class="form-control px-0" name="nama" id="nama" placeholder="Nama Lengkap" aria-describedby="basic-addon1">
            </div>

            <!--email-->
            <div class="md-form mb-5">
              <input type="text" name="email" id="email" class="form-control" placeholder="youremail@gmail.com">
              <label for="email" class="">Email</label>
            </div>

            <!--address-->
            <div class="md-form mb-5">
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="1234 Main St">
              <label for="alamat" class="">Alamat</label>
            </div>

            <div class="md-form mb-5">
              <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="08xxxxxxxxxx">
              <label for="no_hp" class="">No HP</label>
            </div>

            <label>Waktu Pengiriman</label><br>
            <div class="form-group">
              <div class='input-group date' id='datetimepicker'>
                <input type='text' class="form-control" name="tanggal_digunakan"
                value="<?php echo (!empty($_POST['tanggal_digunakan'])) ? $_POST['tanggal_digunakan'] : ''; ?>"
                required />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

          </form>

        </div>
        <!--/.Card-->



  </div>
</main>
<!--Main layout-->
<?php
include 'footer.php';
?>