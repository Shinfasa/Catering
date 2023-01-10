<?php
//Memanggil Header
include('../header.php');
if ($_SESSION['akses'] == 1) {

  if(isset($_POST['reject'])){
    $id = ($_POST['nopesanan']);
    $oldfile = $_POST['gbr'];

    unlink("../../../assets/img/buktitf/".$oldfile);

    $update=mysqli_query($koneksi,"UPDATE orders SET bukti_pembayaran='NULL' WHERE no_pesanan='$id'"); 

    if($update){
      echo "<script>alert('Bukti Pembayaran Ditolak!')</script>";
      echo "<script>location='order.php'</script>";
    }
  }

  if(isset($_POST['accept'])){
    $id = ($_POST['nopesanan']);
    $tglbayar = date("Y-m-d");

    $update=mysqli_query($koneksi,"UPDATE orders SET tgl_bayar='$tglbayar', status_pesanan='Sedang Diproses' WHERE no_pesanan='$id'"); 

    if($update){
      echo "<script>alert('Bukti Pembayaran Diterima!')</script>";
      echo "<script>location='order.php'</script>";
    }
  }

  //Fungsi Update
  if(isset($_POST['update'])){
    $no_pesanan = ($_POST['nopesanan']);
    $status = ($_POST['status']);

    $update=mysqli_query($koneksi,"UPDATE orders SET status_pesanan='$status' WHERE no_pesanan='$no_pesanan'"); 

    if($update){
      echo "<script>alert('Data di Update')</script>";
      echo "<script>location='order.php'</script>";
    }
  }

//Fungsi Delete
  if(isset($_GET['no_pesanan'])){
    $no_pesanan = $_GET['no_pesanan'];
    $sql = "DELETE FROM orders WHERE no_pesanan='$no_pesanan'";
    $result = mysqli_query($koneksi,$sql);
    if($result){
      echo "<script>alert('Data di Delete')</script>";
      echo "<script>location='order.php'</script>";
    }
  }
  ?>

  <head>
    <style>
      .tabs-to-dropdown .nav-wrapper {
        padding: 10px;
      }
      .tabs-to-dropdown .nav-pills .nav-link.active {
        background-color: #E8853D;
        color:#ffffff;
      }
      .tabs-to-dropdown .dropdown-item {
        padding: 10px;
      }
      @media (min-width: 1280px) {
        .tabs-to-dropdown .nav-wrapper {
          padding: 15px 30px;
        }
      }
    </style>
  </head>

  <body>
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-12">
          <div class="card" style="height:100vh; max-height: 540px;">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center mb-3">
                <h6 class="mb-0">Order</h6>
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                  <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                  </div>
                </div>
              </div>
            </div>
            <div class="tabs-to-dropdown">
              <div class="nav-wrapper d-flex align-items-center justify-content-between">
                <ul class="nav nav-pills d-none d-md-flex" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-belum-dibayar-tab" data-toggle="pill" href="#belum-dibayar" role="tab" aria-controls="belum-dibayar" aria-selected="true">Belum Dibayar</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-sedang-diproses-tab" data-toggle="pill" href="#sedang-diproses" role="tab" aria-controls="sedang-diproses" aria-selected="false">Sedang Diproses</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-pesanan-selesai-tab" data-toggle="pill" href="#pesanan-selesai" role="tab" aria-controls="pesanan-selesai" aria-selected="false">Pesanan Selesai</a>
                  </li>
                </ul>
              </div>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="belum-dibayar" role="tabpanel" aria-labelledby="pills-belum-dibayar-tab">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $batas = 6;
                          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                          $previous = $halaman - 1;
                          $next = $halaman + 1;

                          $data = mysqli_query($koneksi,"SELECT * FROM orders");
                          $jumlah_data = mysqli_num_rows($data);
                          $total_halaman = ceil($jumlah_data / $batas);

                          $data_order = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran JOIN user ON orders.id_user = user.id_user LIMIT $halaman_awal, $batas");

                          $data_order1 = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, tgl_pakai, no_pesanan, status_pesanan, catatan, total_harga, tgl_bayar FROM orders WHERE status_pesanan='Belum Dibayar' LIMIT $halaman_awal, $batas");

                          $nomor = $halaman_awal+1;
                          while($d = mysqli_fetch_array($data_order1)){
                            ?>                    
                            <tr>
                              <td class="text-center"><?php echo $nomor++; ?></td>
                              <td class="text-center"><?php echo $d['no_pesanan']; ?></td>
                              <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalCust<?php echo $d['no_pesanan']; ?>">
                                  Lihat
                                </a>
                              </td>
                              <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalMenu<?php echo $d['no_pesanan']; ?>">
                                  Lihat
                                </a>
                              </td>
                              <td class="text-center"><?php echo rupiah($d['total_harga']); ?></td>
                              <td class="text-center"><?php echo $d['catatan']; ?></td>
                              <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalBukti<?php echo $d['no_pesanan']; ?>">
                                  Lihat
                                </a>
                              </td>
                              <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['no_pesanan']; ?>">
                                  Edit
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="order.php?no_pesanan=<?php echo $d['no_pesanan']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete order">
                                  Delete
                                </a>
                              </td>
                            </tr>

                            <!-- Modal Cust -->
                            <div class="modal fade" id="exampleModalCust<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Customer</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="order.php" method="POST">
                                    <div class="modal-body">
                                      <?php  
                                      $pesanan = $d['no_pesanan'];
                                      $data_cust = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user WHERE no_pesanan = '$pesanan'");
                                      $cust = mysqli_fetch_array($data_cust);
                                      ?>
                                      <div class="form-group">
                                        <label for="txt_email">Nama Customer</label>
                                        <input type="text" class="form-control form-control-user" name="txt_email" value="<?php echo $cust['nama_user']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_nama">Alamat</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="<?php echo $cust['alamat_lengkap']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_alamat">No. Handphone</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $cust['no_hp']; ?>">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal Cust -->

                            <!-- Modal Menu -->
                            <div class="modal fade" id="exampleModalMenu<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pesanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="order.php" method="POST">
                                      <?php 
                                      $pesanan = $d['no_pesanan'];
                                      $data_menu = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE no_pesanan= '$pesanan'");
                                      while($menu = mysqli_fetch_array($data_menu)){ ?>
                                        <br>
                                        <img width="100px" src="../../../assets/img/menu/<?php echo $menu['gambar']; ?>" alt="">
                                        <div class="form-group">
                                          <br>
                                          <label for="txt_nama">Nama Menu</label>
                                          <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $menu['nama_menu']; ?>">
                                        </div> 
                                        <div class="form-group">
                                          <label for="txt_desk">Deskripsi</label>
                                          <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($menu['harga_satuan']); ?> x <?php echo $menu['qty']; ?> = <?php echo rupiah($menu['subtotal_harga']); ?>">
                                        </div> 
                                      <?php } ?>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- End Modal Menu -->

                              <!-- Modal Bukti -->
                              <div class="modal fade" id="exampleModalBukti<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="order.php" method="POST" enctype='multipart/form-data'>
                                      <div class="modal-body">
                                        <?php  
                                        $pesanan = $d['no_pesanan'];
                                        $data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
                                        $bukti = mysqli_fetch_array($data_bukti);
                                        ?>
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="" name="nopesanan" value="<?php echo $pesanan; ?>">
                                        <div class="form-group">
                                          <label for="txt_gambar">Metode Pembayaran</label>
                                          <input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
                                          <br>
                                          <input type="text" class="form-control form-control-iklan" placeholder="no_rek" name="no_rek" value="<?php echo $bukti['no_rek']; ?>">                              
                                        </div>                          
                                        <div class="form-group">
                                          <br>
                                          <?php if($bukti['bukti_pembayaran']==NULL){?>
                                            Bukti Pembayaran Belum Ada
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      <?php }else{ ?>
                                        <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/buktitf/<?php echo $bukti['bukti_pembayaran'] ?>">
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="" name="gbr" value="<?php echo $bukti['bukti_pembayaran']; ?>">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name="reject" class="btn btn-danger"><i class="uil uil-times" style="font-size: 15px;"></i></button>
                                      <button type="submit" name="accept" class="btn btn-primary"><i class="uil uil-check" style="font-size: 15px;"></i></button>
                                    </div>
                                  <?php } ?>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- End Modal Bukti -->

                          <!-- Modal Edit -->
                          <div class="modal fade" id="exampleModalEdit<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="user.php" method="POST" class="user" enctype='multipart/form-data'>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="nopesanan">No. Pesanan</label>
                                      <input type="text" class="form-control form-control-user" name="nopesanan" value="<?php echo $d['no_pesanan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="tglpesan">Tgl. Pesan</label>
                                      <input type="text" class="form-control form-control-user" name="tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                    </div>
                                    <?php  
                                    $pesanan = $d['no_pesanan'];
                                    $data_cust = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user WHERE no_pesanan = '$pesanan'");
                                    $cust = mysqli_fetch_array($data_cust);
                                    ?>
                                    <div class="form-group">
                                      <label for="txt_nama">Nama Customer</label>
                                      <input type="text" class="form-control form-control-user" name="txt_nama" value="<?php echo $cust['nama_user']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_alamat">Alamat</label>
                                      <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $cust['alamat_lengkap']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_nohp">No. Handphone</label>
                                      <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="<?php echo $cust['no_hp']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                      <label for="tglpakai">Tgl.Pakai</label>
                                      <input type="text" class="form-control form-control-user" name="tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                    </div>

                                    <?php 
                                    $data_menu = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE no_pesanan= '$pesanan'");
                                    while($menu = mysqli_fetch_array($data_menu)){ ?>
                                      <br>
                                      <img width="100px" src="../../../assets/img/menu/<?php echo $menu['gambar']; ?>" alt="">
                                      <div class="form-group">
                                        <br>
                                        <label for="txt_nama">Nama Menu</label>
                                        <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $menu['nama_menu']; ?>" readonly>
                                      </div> 
                                      <div class="form-group">
                                        <label for="txt_desk">Deskripsi</label>
                                        <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($menu['harga_satuan']); ?> x <?php echo $menu['qty']; ?> = <?php echo rupiah($menu['subtotal_harga']); ?>" readonly>
                                      </div> 
                                    <?php } ?>

                                    <div class="form-group">
                                      <label for="total">Total Harga</label>
                                      <input type="text" class="form-control form-control-user" name="total" value="<?php echo $d['total_harga']; ?>" readonly>
                                    </div> 
                                    <div class="form-group">
                                      <label for="catatan">Catatan</label>
                                      <input type="text" class="form-control form-control-user" name="catatan" value="<?php echo $d['catatan']; ?>" readonly>
                                    </div> 
                                    <div class="form-group">
                                      <label for="tglbayar">Tgl. Bayar</label>
                                      <input type="text" class="form-control form-control-user" name="tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                    </div> 

                                    <?php  
                                    $pesanan = $d['no_pesanan'];
                                    $data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
                                    $bukti = mysqli_fetch_array($data_bukti);
                                    ?>
                                    <input type="hidden" class="form-control form-control-iklan" placeholder="" name="nopesanan" value="<?php echo $pesanan; ?>">
                                    <div class="form-group">
                                      <label for="txt_gambar">Metode Pembayaran</label>
                                      <input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
                                    </div>                          
                                    <div class="form-group">
                                      <br>
                                      <?php if($bukti['bukti_pembayaran']==NULL){?>
                                        Bukti Pembayaran Belum Ada
                                      </div>
                                    <?php }else{ ?>
                                      <div class="form-group">
                                        <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/buktitf/<?php echo $bukti['bukti_pembayaran'] ?>">
                                      </div>
                                    <?php } ?>

                                    <div class="form-group">
                                      <?php if($d['status_pesanan']=="Belum Dibayar"){ ?>
                                        <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;" checked>&nbsp;Belum Dibayar
                                        <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;">&nbsp;Sedang Proses
                                        <input type="radio" name="status" value="Selesai" style="margin-left:20px;">&nbsp;Selesai
                                      <?php }elseif($d['status_pesanan']=="Sedang Diproses"){ ?>
                                        <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;">&nbsp;Belum Dibayar
                                        <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;" checked>&nbsp;Sedang Proses
                                        <input type="radio" name="status" value="Selesai" style="margin-left:20px;">&nbsp;Selesai
                                      <?php }else{ ?>
                                        <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;">&nbsp;Belum Dibayar
                                        <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;">&nbsp;Sedang Proses
                                        <input type="radio" name="status" value="Selesai" style="margin-left:20px;" checked>&nbsp;Selesai
                                      <?php } ?>
                                    </div>  
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- End Modal Edit -->

                        <?php } ?>                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="sedang-diproses" role="tabpanel" aria-labelledby="pills-sedang-diproses-tab">
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pesanan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Customer</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Pesanan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                      </thead>
                      <tbody>                    
                        <?php 
                        $batas = 6;
                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                        $previous = $halaman - 1;
                        $next = $halaman + 1;

                        $data = mysqli_query($koneksi,"SELECT * FROM orders");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);

                        $data_order1 = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, tgl_pakai, no_pesanan, status_pesanan, catatan, total_harga, tgl_bayar FROM orders WHERE status_pesanan='Sedang Diproses' LIMIT $halaman_awal, $batas");

                        $nomor = $halaman_awal+1;
                        while($d = mysqli_fetch_array($data_order1)){
                          ?>                    
                          <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $d['no_pesanan']; ?></td>
                            <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                            <td class="text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalCust<?php echo $d['no_pesanan']; ?>">
                                Lihat
                              </a>
                            </td>
                            <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                            <td class="text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalMenu<?php echo $d['no_pesanan']; ?>">
                                Lihat
                              </a>
                            </td>
                            <td class="text-center"><?php echo rupiah($d['total_harga']); ?></td>
                            <td class="text-center"><?php echo $d['catatan']; ?></td>
                            <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                            <td class="text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalBukti<?php echo $d['no_pesanan']; ?>">
                                Lihat
                              </a>
                            </td>
                            <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                            <td class="text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['no_pesanan']; ?>">
                                Edit
                              </a>
                              &nbsp;
                              <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="order.php?no_pesanan=<?php echo $d['no_pesanan']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete order">
                                Delete
                              </a>
                            </td>
                          </tr>

                          <!-- Modal Cust -->
                          <div class="modal fade" id="exampleModalCust<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Data Customer</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="order.php" method="POST">
                                  <div class="modal-body">
                                    <?php  
                                    $pesanan = $d['no_pesanan'];
                                    $data_cust = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user WHERE no_pesanan = '$pesanan'");
                                    $cust = mysqli_fetch_array($data_cust);
                                    ?>
                                    <div class="form-group">
                                      <label for="txt_email">Nama Customer</label>
                                      <input type="text" class="form-control form-control-user" name="txt_email" value="<?php echo $cust['nama_user']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_nama">Alamat</label>
                                      <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="<?php echo $cust['alamat_lengkap']; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_alamat">No. Handphone</label>
                                      <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $cust['no_hp']; ?>">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- End Modal Cust -->

                          <!-- Modal Menu -->
                          <div class="modal fade" id="exampleModalMenu<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pesanan</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form action="order.php" method="POST">
                                    <?php 
                                    $pesanan = $d['no_pesanan'];
                                    $data_menu = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE no_pesanan= '$pesanan'");
                                    while($menu = mysqli_fetch_array($data_menu)){ ?>
                                      <br>
                                      <img width="100px" src="../../../assets/img/menu/<?php echo $menu['gambar']; ?>" alt="">
                                      <div class="form-group">
                                        <br>
                                        <label for="txt_nama">Nama Menu</label>
                                        <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $menu['nama_menu']; ?>">
                                      </div> 
                                      <div class="form-group">
                                        <label for="txt_desk">Deskripsi</label>
                                        <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($menu['harga_satuan']); ?> x <?php echo $menu['qty']; ?> = <?php echo rupiah($menu['subtotal_harga']); ?>">
                                      </div> 
                                    <?php } ?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal Menu -->

                            <!-- Modal Bukti -->
                            <div class="modal fade" id="exampleModalBukti<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="order.php" method="POST" enctype='multipart/form-data'>
                                    <div class="modal-body">
                                      <?php  
                                      $pesanan = $d['no_pesanan'];
                                      $data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
                                      $bukti = mysqli_fetch_array($data_bukti);
                                      ?>
                                      <input type="hidden" class="form-control form-control-iklan" placeholder="" name="nopesanan" value="<?php echo $pesanan; ?>">
                                      <div class="form-group">
                                        <label for="txt_gambar">Metode Pembayaran</label>
                                        <input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
                                        <br>
                                        <input type="text" class="form-control form-control-iklan" placeholder="no_rek" name="no_rek" value="<?php echo $bukti['no_rek']; ?>">                              
                                      </div>                          
                                      <div class="form-group">
                                        <br>
                                        <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/buktitf/<?php echo $bukti['bukti_pembayaran'] ?>">
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="" name="gbr" value="<?php echo $bukti['bukti_pembayaran']; ?>">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal Bukti -->

                            <!-- Modal Edit -->
                            <div class="modal fade" id="exampleModalEdit<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="user.php" method="POST" class="user" enctype='multipart/form-data'>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="nopesanan">No. Pesanan</label>
                                        <input type="text" class="form-control form-control-user" name="nopesanan" value="<?php echo $d['no_pesanan']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="tglpesan">Tgl. Pesan</label>
                                        <input type="text" class="form-control form-control-user" name="tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                      </div>
                                      <?php  
                                      $pesanan = $d['no_pesanan'];
                                      $data_cust = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user WHERE no_pesanan = '$pesanan'");
                                      $cust = mysqli_fetch_array($data_cust);
                                      ?>
                                      <div class="form-group">
                                        <label for="txt_nama">Nama Customer</label>
                                        <input type="text" class="form-control form-control-user" name="txt_nama" value="<?php echo $cust['nama_user']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_alamat">Alamat</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $cust['alamat_lengkap']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_nohp">No. Handphone</label>
                                        <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="<?php echo $cust['no_hp']; ?>" readonly>
                                      </div>

                                      <div class="form-group">
                                        <label for="tglpakai">Tgl.Pakai</label>
                                        <input type="text" class="form-control form-control-user" name="tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                      </div>

                                      <?php 
                                      $data_menu = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE no_pesanan= '$pesanan'");
                                      while($menu = mysqli_fetch_array($data_menu)){ ?>
                                        <br>
                                        <img width="100px" src="../../../assets/img/menu/<?php echo $menu['gambar']; ?>" alt="">
                                        <div class="form-group">
                                          <br>
                                          <label for="txt_nama">Nama Menu</label>
                                          <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $menu['nama_menu']; ?>" readonly>
                                        </div> 
                                        <div class="form-group">
                                          <label for="txt_desk">Deskripsi</label>
                                          <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($menu['harga_satuan']); ?> x <?php echo $menu['qty']; ?> = <?php echo rupiah($menu['subtotal_harga']); ?>" readonly>
                                        </div> 
                                      <?php } ?>

                                      <div class="form-group">
                                        <label for="total">Total Harga</label>
                                        <input type="text" class="form-control form-control-user" name="total" value="<?php echo $d['total_harga']; ?>" readonly>
                                      </div> 
                                      <div class="form-group">
                                        <label for="catatan">Catatan</label>
                                        <input type="text" class="form-control form-control-user" name="catatan" value="<?php echo $d['catatan']; ?>" readonly>
                                      </div> 
                                      <div class="form-group">
                                        <label for="tglbayar">Tgl. Bayar</label>
                                        <input type="text" class="form-control form-control-user" name="tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                      </div> 

                                      <?php  
                                      $pesanan = $d['no_pesanan'];
                                      $data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
                                      $bukti = mysqli_fetch_array($data_bukti);
                                      ?>
                                      <input type="hidden" class="form-control form-control-iklan" placeholder="" name="nopesanan" value="<?php echo $pesanan; ?>">
                                      <div class="form-group">
                                        <label for="txt_gambar">Metode Pembayaran</label>
                                        <input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
                                      </div>                          
                                      <div class="form-group">
                                        <br>
                                        <?php if($bukti['bukti_pembayaran']==NULL){?>
                                          Bukti Pembayaran Belum Ada
                                        </div>
                                      <?php }else{ ?>
                                        <div class="form-group">
                                          <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/buktitf/<?php echo $bukti['bukti_pembayaran'] ?>">
                                        </div>
                                      <?php } ?>

                                      <div class="form-group">
                                        <?php if($d['status_pesanan']=="Belum Dibayar"){ ?>
                                          <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;" checked>&nbsp;Belum Dibayar
                                          <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;">&nbsp;Sedang Proses
                                          <input type="radio" name="status" value="Selesai" style="margin-left:20px;">&nbsp;Selesai
                                        <?php }elseif($d['status_pesanan']=="Sedang Diproses"){ ?>
                                          <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;">&nbsp;Belum Dibayar
                                          <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;" checked>&nbsp;Sedang Proses
                                          <input type="radio" name="status" value="Selesai" style="margin-left:20px;">&nbsp;Selesai
                                        <?php }else{ ?>
                                          <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;">&nbsp;Belum Dibayar
                                          <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;">&nbsp;Sedang Proses
                                          <input type="radio" name="status" value="Selesai" style="margin-left:20px;" checked>&nbsp;Selesai
                                        <?php } ?>
                                      </div>  
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal Edit -->

                          <?php } ?>                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>  
                <div class="tab-pane fade" id="pesanan-selesai" role="tabpanel" aria-labelledby="pills-pesanan-selesai-tab">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          </tr>
                        </thead>
                        <tbody>                    
                          <?php 
                          $batas = 6;
                          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                          $previous = $halaman - 1;
                          $next = $halaman + 1;

                          $data = mysqli_query($koneksi,"SELECT * FROM orders");
                          $jumlah_data = mysqli_num_rows($data);
                          $total_halaman = ceil($jumlah_data / $batas);

                          $data_order1 = mysqli_query($koneksi,"SELECT DISTINCT tgl_pesan, tgl_pakai, no_pesanan, status_pesanan, catatan, total_harga, tgl_bayar FROM orders WHERE status_pesanan='Selesai' LIMIT $halaman_awal, $batas");

                          $nomor = $halaman_awal+1;
                          while($d = mysqli_fetch_array($data_order1)){
                            ?>                    
                            <tr>
                              <td class="text-center"><?php echo $nomor++; ?></td>
                              <td class="text-center"><?php echo $d['no_pesanan']; ?></td>
                              <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalCust<?php echo $d['no_pesanan']; ?>">
                                  Lihat
                                </a>
                              </td>
                              <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalMenu<?php echo $d['no_pesanan']; ?>">
                                  Lihat
                                </a>
                              </td>
                              <td class="text-center"><?php echo rupiah($d['total_harga']); ?></td>
                              <td class="text-center"><?php echo $d['catatan']; ?></td>
                              <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalBukti<?php echo $d['no_pesanan']; ?>">
                                  Lihat
                                </a>
                              </td>
                              <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['no_pesanan']; ?>">
                                  Edit
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="order.php?no_pesanan=<?php echo $d['no_pesanan']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete order">
                                  Delete
                                </a>
                              </td>
                            </tr>

                            <!-- Modal Cust -->
                            <div class="modal fade" id="exampleModalCust<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Customer</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="order.php" method="POST">
                                    <div class="modal-body">
                                      <?php  
                                      $pesanan = $d['no_pesanan'];
                                      $data_cust = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user WHERE no_pesanan = '$pesanan'");
                                      $cust = mysqli_fetch_array($data_cust);
                                      ?>
                                      <div class="form-group">
                                        <label for="txt_email">Nama Customer</label>
                                        <input type="text" class="form-control form-control-user" name="txt_email" value="<?php echo $cust['nama_user']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_nama">Alamat</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Nama Lengkap" name="txt_nama" value="<?php echo $cust['alamat_lengkap']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_alamat">No. Handphone</label>
                                        <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $cust['no_hp']; ?>">
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal Cust -->

                            <!-- Modal Menu -->
                            <div class="modal fade" id="exampleModalMenu<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pesanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="order.php" method="POST">
                                      <?php 
                                      $pesanan = $d['no_pesanan'];
                                      $data_menu = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE no_pesanan= '$pesanan'");
                                      while($menu = mysqli_fetch_array($data_menu)){ ?>
                                        <br>
                                        <img width="100px" src="../../../assets/img/menu/<?php echo $menu['gambar']; ?>" alt="">
                                        <div class="form-group">
                                          <br>
                                          <label for="txt_nama">Nama Menu</label>
                                          <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $menu['nama_menu']; ?>">
                                        </div> 
                                        <div class="form-group">
                                          <label for="txt_desk">Deskripsi</label>
                                          <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($menu['harga_satuan']); ?> x <?php echo $menu['qty']; ?> = <?php echo rupiah($menu['subtotal_harga']); ?>">
                                        </div> 
                                      <?php } ?>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- End Modal Menu -->

                              <!-- Modal Bukti -->
                              <div class="modal fade" id="exampleModalBukti<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Bukti Pembayaran</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="order.php" method="POST" enctype='multipart/form-data'>
                                      <div class="modal-body">
                                        <?php  
                                        $pesanan = $d['no_pesanan'];
                                        $data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
                                        $bukti = mysqli_fetch_array($data_bukti);
                                        ?>
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="" name="nopesanan" value="<?php echo $pesanan; ?>">
                                        <div class="form-group">
                                          <label for="txt_gambar">Metode Pembayaran</label>
                                          <input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
                                          <br>
                                          <input type="text" class="form-control form-control-iklan" placeholder="no_rek" name="no_rek" value="<?php echo $bukti['no_rek']; ?>">                              
                                        </div>                          
                                        <div class="form-group">
                                          <br>
                                          <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/buktitf/<?php echo $bukti['bukti_pembayaran'] ?>">
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!-- End Modal Bukti -->

                              <!-- Modal Edit -->
                              <div class="modal fade" id="exampleModalEdit<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="user.php" method="POST" class="user" enctype='multipart/form-data'>
                                      <div class="modal-body">
                                        <div class="form-group">
                                          <label for="nopesanan">No. Pesanan</label>
                                          <input type="text" class="form-control form-control-user" name="nopesanan" value="<?php echo $d['no_pesanan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="tglpesan">Tgl. Pesan</label>
                                          <input type="text" class="form-control form-control-user" name="tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                        </div>
                                        <?php  
                                        $pesanan = $d['no_pesanan'];
                                        $data_cust = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user WHERE no_pesanan = '$pesanan'");
                                        $cust = mysqli_fetch_array($data_cust);
                                        ?>
                                        <div class="form-group">
                                          <label for="txt_nama">Nama Customer</label>
                                          <input type="text" class="form-control form-control-user" name="txt_nama" value="<?php echo $cust['nama_user']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="txt_alamat">Alamat</label>
                                          <input type="text" class="form-control form-control-user" placeholder="Alamat" name="txt_alamat" value="<?php echo $cust['alamat_lengkap']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="txt_nohp">No. Handphone</label>
                                          <input type="number" class="form-control form-control-user" placeholder="No. Handphone" name="txt_nohp" value="<?php echo $cust['no_hp']; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                          <label for="tglpakai">Tgl.Pakai</label>
                                          <input type="text" class="form-control form-control-user" name="tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                        </div>

                                        <?php 
                                        $data_menu = mysqli_query($koneksi,"SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE no_pesanan= '$pesanan'");
                                        while($menu = mysqli_fetch_array($data_menu)){ ?>
                                          <br>
                                          <img width="100px" src="../../../assets/img/menu/<?php echo $menu['gambar']; ?>" alt="">
                                          <div class="form-group">
                                            <br>
                                            <label for="txt_nama">Nama Menu</label>
                                            <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_nama" value="<?php echo $menu['nama_menu']; ?>" readonly>
                                          </div> 
                                          <div class="form-group">
                                            <label for="txt_desk">Deskripsi</label>
                                            <input type="text" class="form-control form-control-menu" placeholder="Nama Menu" name="txt_desk" value="<?php echo rupiah($menu['harga_satuan']); ?> x <?php echo $menu['qty']; ?> = <?php echo rupiah($menu['subtotal_harga']); ?>" readonly>
                                          </div> 
                                        <?php } ?>

                                        <div class="form-group">
                                          <label for="total">Total Harga</label>
                                          <input type="text" class="form-control form-control-user" name="total" value="<?php echo $d['total_harga']; ?>" readonly>
                                        </div> 
                                        <div class="form-group">
                                          <label for="catatan">Catatan</label>
                                          <input type="text" class="form-control form-control-user" name="catatan" value="<?php echo $d['catatan']; ?>" readonly>
                                        </div> 
                                        <div class="form-group">
                                          <label for="tglbayar">Tgl. Bayar</label>
                                          <input type="text" class="form-control form-control-user" name="tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                        </div> 

                                        <?php  
                                        $pesanan = $d['no_pesanan'];
                                        $data_bukti = mysqli_query($koneksi,"SELECT * FROM orders JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$pesanan'");
                                        $bukti = mysqli_fetch_array($data_bukti);
                                        ?>
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="" name="nopesanan" value="<?php echo $pesanan; ?>">
                                        <div class="form-group">
                                          <label for="txt_gambar">Metode Pembayaran</label>
                                          <input type="text" class="form-control form-control-iklan" placeholder="Metode Pembayaran" name="metode" value="<?php echo $bukti['metode_pembayaran']; ?>">
                                        </div>                          
                                        <div class="form-group">
                                          <br>
                                          <?php if($bukti['bukti_pembayaran']==NULL){?>
                                            Bukti Pembayaran Belum Ada
                                          </div>
                                        <?php }else{ ?>
                                          <div class="form-group">
                                            <img class="img-account-profile rounded-circle-1 m-4" style="border:1px; border-color:#444444;" width="150px" src="assets/img/buktitf/<?php echo $bukti['bukti_pembayaran'] ?>">
                                          </div>
                                        <?php } ?>

                                        <div class="form-group">
                                          <?php if($d['status_pesanan']=="Belum Dibayar"){ ?>
                                            <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;" checked>&nbsp;Belum Dibayar
                                            <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;">&nbsp;Sedang Proses
                                            <input type="radio" name="status" value="Selesai" style="margin-left:20px;">&nbsp;Selesai
                                          <?php }elseif($d['status_pesanan']=="Sedang Diproses"){ ?>
                                            <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;">&nbsp;Belum Dibayar
                                            <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;" checked>&nbsp;Sedang Proses
                                            <input type="radio" name="status" value="Selesai" style="margin-left:20px;">&nbsp;Selesai
                                          <?php }else{ ?>
                                            <input type="radio" name="status" value="Belum Dibayar" style="margin-left:20px;">&nbsp;Belum Dibayar
                                            <input type="radio" name="status" value="Sedang Diproses" style="margin-left:20px;">&nbsp;Sedang Proses
                                            <input type="radio" name="status" value="Selesai" style="margin-left:20px;" checked>&nbsp;Selesai
                                          <?php } ?>
                                        </div>  
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!-- End Modal Edit -->

                            <?php } ?>                      
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>            
            </div>
          </div>
        </div>
      </div>

    </body>

    <!-- partial -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>

    <?php
  }else{

    echo "<script>alert('Anda adalah Customer!')</script>";
    echo "<script>location='../../../index.php'</script>"; 
  }
//Memanggil Footer
  include('../footer.php')
?>