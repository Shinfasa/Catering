<?php
include('../header.php');

if(isset($_POST['simpan'])){
  $id = ($_POST['txt_id']);
  $user = ($_POST['txt_nama']);
  $alamat = ($_POST['txt_alamat']);
  $nohp = ($_POST['txt_nohp']);
  $password = ($_POST['txt_pass']);

  $update=mysqli_query($koneksi,"UPDATE user SET nama_user='$user', alamat='$alamat', nohp='$nohp', password='$password' WHERE id_user='$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='profile.php'</script>";
  }
}
?>
    <div class="card shadow-lg mx-4 ">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../../../assets/img/user/<?php echo $gambar; ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                <?php echo $userName; ?>
              </h5>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="ni ni-app"></i>
                    <span class="ms-2">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2">Messages</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-settings-gear-65"></i>
                    <span class="ms-2">Settings</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-md-8">
          <div class="card" style="height:130vh; max-height: 580px;">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm ms-auto">Simpan</button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" name="txt_nama" value="<?php echo $userName; ?>">
                    <input class="form-control" type="hidden" name="txt_id" value="<?php echo $idUser; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" name="txt_email" value="<?php echo $userMail; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">No. Hp</label>
                    <input class="form-control" type="text" name="txt_nohp" value="<?php echo $nohp ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" type="text" name="txt_pass" value="<?php echo $userPass ?>">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Contact Information</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input class="form-control" type="text" name="txt_alamat" value="<?php echo $alamat; ?>">
                  </div>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Alamat</label>
                    <input type="file" class="form-control form-control-user" name="gambar">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Roles</p>
              <div class="row">
                <div class="col-md-12">
                  <?php 
                    if ($akses == 1) {
                  ?>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Akses</label><br>
                    <input type="radio" name="txt_akses" value="1" style="margin-left:20px;" checked disabled>  1 - Admin
                    <input type="radio" name="txt_akses" value="2" style="margin-left: 100px;" disabled>  2 - Customer
                  </div>
                  <?php  
                    }elseif($akses == 2){
                  ?>
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Akses</label><br>
                    <input type="radio" name="txt_akses" value="1" style="margin-left:20px;" disabled>  1 - Admin
                    <input type="radio" name="txt_akses" value="2" style="margin-left: 100px;" checked disabled>  2 - Customer
                  </div>
                  <?php  
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-profile">
            <img src="../../assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                  <a href="javascript:;">
                    <img src="../../assets/img/team-2.jpg" class="rounded-circle img-fluid border border-2 border-white">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              <div class="d-flex justify-content-between">
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i class="ni ni-collection"></i></a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i class="ni ni-email-83"></i></a>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="d-flex justify-content-center">
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">22</span>
                      <span class="text-sm opacity-8">Friends</span>
                    </div>
                    <div class="d-grid text-center mx-4">
                      <span class="text-lg font-weight-bolder">10</span>
                      <span class="text-sm opacity-8">Photos</span>
                    </div>
                    <div class="d-grid text-center">
                      <span class="text-lg font-weight-bolder">89</span>
                      <span class="text-sm opacity-8">Comments</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-4">
                <h5>
                  Mark Davis<span class="font-weight-light">, 35</span>
                </h5>
                <div class="h6 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Bucharest, Romania
                </div>
                <div class="h6 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>University of Computer Science
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
include('../footer.php')
?>