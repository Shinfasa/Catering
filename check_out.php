<?php
include 'header.php';
?>

<!--Main layout -->
<main class="mt-5 pt-4">
  <div class="container wow fadeIn">

    <!-- Heading -->
    <h2 class="my-5 h2 text-center">Checkout form</h2>

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-md-8 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <form class="card-body" action="" method="post" name="frmShopping" id="frmShopping" enctype="multipart/form-data">

            <!--Grid row-->
            <div class="row">

            </div>
            <!--Grid row-->
            <!--Username-->
            <div class="md-form input-group pl-0 mb-5">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control py-0" name="nama" id="nama" placeholder="Username" aria-describedby="basic-addon1">
            </div>

            <!--email-->
            <div class="md-form mb-5">
              <input type="text" name="email" id="email" class="form-control" placeholder="youremail@example.com">
              <label for="email" class="">Email (optional)</label>
            </div>

            <!--address-->
            <div class="md-form mb-5">
              <input type="text" name="alamat" id="alamat" class="form-control" placeholder="1234 Main St">
              <label for="alamat" class="">Address</label>
            </div>

            <div class="md-form mb-5">
              <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No Handphone">
              <label for="no_hp" class="">No HP</label>
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

          </form>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-4 mb-4">

        <!-- Cart -->
        <ul class="list-group mb-3 z-depth-1">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Ice Cream Cone</h6>
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



      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</main>
<!--Main layout-->
<?php
include 'footer.php';
?>