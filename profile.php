<?php
  include('header.php');
?>

<br>
<br>

<body>

<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  
<div class="container">

  <div class="section-title">
      <h2>Edit Profile</h2>
  </div>

  <div class="row">
    <div>
      <div class="card">
        <div>
          <div class="m-4">
            <form action="" method="POST" class="user">
              <div class="form-group pb-3 text-center">
                <img class="img-account-profile rounded-circle m-4" width="150px" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                <br>
                <button type="submit" name="submit" class="btn btn-user btn-block" style="color: #E8853D;"><b>Ubah Profil</b></button>
              </div>
              <div class="form-group pb-3">
                <label for="txt_nama">Email</label>
                <input type="text" class="form-control form-control-user" placeholder="Email@gmail.com" name="txt_nama" value="" readonly>
              </div> 
              <div class="form-group pb-3">
                <label for="txt_harga">Username</label>
                <input type="text" class="form-control form-control-user" placeholder="Username" name="txt_harga" value="">
              </div>
              <div class="form-group pb-3">
                <label for="txt_detail">Alamat</label>
                <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_detail" value="">
              </div>
              <div class="form-group pb-3">
                <label for="txt_gambar">No. Handphone</label>
                <input type="text" class="form-control form-control-user" placeholder="628*****" name="txt_gambar" value="">
              </div>
              <div class="form-group pb-3">
                <label for="txt_gambar">Password</label>
                <input type="password" class="form-control form-control-user" placeholder="***" name="txt_gambar" value="">
              </div>
              <button type="submit" name="submit" class="btn btn-user btn-block text-light" style="background-color: #E8853D;"><b>Update</b></button>
              <button type="submit" name="submit" class="btn btn-user btn-block" style="color: #E8853D;"><b>Kembali</b></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

</section>

  <!--   Core JS Files   -->
  <script src="../Catering/dashboard/assets/js/core/popper.min.js"></script>
  <script src="../Catering/dashboard/assets/js/core/bootstrap.min.js"></script>
  <script src="../Catering/dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../Catering/dashboard/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Catering/dashboard/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>

<?php
include 'footer.php';
?>