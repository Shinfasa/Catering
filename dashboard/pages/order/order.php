<?php
//Memanggil Header
include('../header.php');

if(isset($_POST['accept'])){
  $nopesanan = ($_POST['txt_id']);
  $tglbayar = date('Y-m-d');
  $status = "Sedang Diproses";

  $update=mysqli_query($koneksi,"UPDATE orders SET tgl_bayar ='$tglbayar', status_pesanan = '$status' WHERE no_pesanan='$nopesanan'");
  if($update){
    echo "<script>alert('Bukti Diterima')</script>";
    echo "<script>location='order.php'</script>";
  }
}

//Fungsi Update
if(isset($_POST['update'])){
  $nopesanan = ($_POST['no_pesanan']);
  $nama = ($_POST['txt_nama']);
  $tglpesan = ($_POST['txt_tglpesan']);
  $tglpakai = ($_POST['txt_tglpakai']);
  $nama = ($_POST['txt_menu']);
  $catatan = ($_POST['txt_note']);
  $harga = ($_POST['txt_hrgsatuan']);
  $jumlah = ($_POST['txt_jml']);
  $total = ($_POST['txt_total']);
  $metode = ($_POST['txt_bayar']);
  $tglbayar = ($_POST['txt_tglbayar']);
  $status = ($_POST['txt_status']);

  $update=mysqli_query($koneksi,"UPDATE orders SET status_pesanan ='$status' WHERE id_order='$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='order.php'</script>";
  }
}

//Fungsi Delete
if(isset($_GET['no_pesanan'])){
  $nopesanan = $_GET['no_pesanan'];
  $sql = "DELETE orders FROM orders WHERE no_pesanan = '$nopesanan';";
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
        <div class="card" style="height:100vh; max-height: 552px;">
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
              <div class="tab-pane fade show active" id="belum-dibayar" role="tabpanel" aria-labelledby="pills-tab-1">
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pesanan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
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

                        $data = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Belum Dibayar'");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);

                        $data_order = mysqli_query($koneksi,"SELECT DISTINCT no_pesanan, nama_user,tgl_pesan,tgl_pakai,metode_pembayaran, tgl_bayar,status_pesanan, catatan FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Belum Dibayar' LIMIT $halaman_awal, $batas");

                        $data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Belum Dibayar' LIMIT $halaman_awal, $batas");

                        $nomor = $halaman_awal+1;

                      //Menampilkan List
                          while($d = mysqli_fetch_array($data_order)){
                          ?>                    
                          <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $d['no_pesanan']; ?></td>
                            <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6></td>
                            <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                            <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                            <td class="text-center" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $d['catatan']; ?></td>
                            <td class="text-center"><?php echo $d['metode_pembayaran']; ?></td>
                            <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                            <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                            <td class="text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalBukti<?php echo $d['no_pesanan'] ?>">Lihat</a>
                            </td>
                            <td class="align-middle text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['no_pesanan']; ?>"> 
                                Edit
                              </a>
                              &nbsp;
                              <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="hapus_order.php?no_pesanan=<?php echo $d['no_pesanan']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order">
                                Delete
                              </a>
                            </td>
                          </tr>
                          <!-- Modal Bukti -->
                          <div class="modal fade" id="exampleModalBukti<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="order.php" method="POST" class="order">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <?php if (isset($d['bukti_pembayaran'])){ ?>
                                        <img src="assets/img/bukti/<?php echo $d['bukti_pembayaran']; ?>" style="width: 200px;">
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="Gambar" name="gambar" value="<?php echo $d['bukti_pembayaran'] ?>">
                                      <?php }else{ ?>
                                        Bukti Pembayaran Belum Ada!
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="reject" class="btn btn-danger"><i class="uil uil-times" style="font-size: 15px;"></i></button>
                                    <button type="submit" name="accept" class="btn btn-primary"><i class="uil uil-check" style="font-size: 15px;"></i></button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- End Modal Bukti -->

                          <!-- Modal Edit -->
                          <div class="modal fade" id="exampleModalEdit<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="order.php" method="POST" class="order" enctype='multipart/form-data'>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="txt_nama">Nama Customer</label>
                                      <input type="nama" class="form-control form-control-order" placeholder="Nama Customer" name="txt_nama" value="<?php echo $d['nama_user']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_tglpesan">Tanggal Pemesanan</label>
                                      <input type="date" class="form-control form-control-order" name="txt_tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_tglpakai">Tanggal Pemakaian</label>
                                      <input type="datetime-local" class="form-control form-control-order" name="txt_tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                      <label for="txt_menu">Nama Menu</label>
                                      <input type="text" class="form-control form-control-order" id="exampleFisrtName" placeholder="Nama Menu" name="txt_menu" value="<?php echo $d['nama_menu']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_hrgsatuan">Harga Satuan</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_hrgsatuan" value="<?php echo $d['harga_satuan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_jml">Jumlah Pesanan</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_jml" value="<?php echo $d['jumlah']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_total">Total Harga</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Total Harga" name="txt_total" value="<?php echo $d['total_harga']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_note">Catatan</label>
                                      <input type="text" class="form-control form-control-order" placeholder="Catatan" name="txt_note" value="<?php echo $d['catatan_order']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_bayar">Metode Pembayaran</label>
                                      <?php 

                                      $data = mysqli_query($koneksi,"SELECT * FROM pembayaran");
                                      while($u = mysqli_fetch_array($data)){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="<?php echo $u['id_pembayaran'] ?>" style="margin-left:20px;" <?php if($d['id_pembayaran']==$u['id_pembayaran']){ echo "checked";}else{echo "";} ?> disabled>   <?php echo $u['metode_pembayaran']; ?>
                                        </div>

                                        <?php
                                      }
                                      ?>   
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_tglbayar">Tanggal Pembayaran</label>
                                      <input type="date" class="form-control form-control-order" placeholder="Tanggal Pembayaran" name="txt_tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_status">Status Pesanan</label>
                                      <?php 
                                      if($d['status_pesanan'] == "Belum Dibayar" ){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;" checked>  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                        </div>
                                        <?php 
                                      }elseif($d['status_pesanan'] == "Sedang Diproses"){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;" checked>  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                        </div>
                                        <?php 
                                      }elseif($d['status_pesanan'] == "Selesai"){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;" checked>  Selesai
                                        </div>

                                        <?php
                                      }
                                      ?>
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
                            <?php
                          }
                          
                    //End Menampilkan List
                          ?>                      
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <br>
                  <!-- Pagination -->
                  <nav>
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>> < </a>
                      </li>
                      <?php 
                      for($x=1;$x<=$total_halaman;$x++){
                        ?> 
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                      }
                      ?>        
                      <li class="page-item">
                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>> </a>
                      </li>
                    </ul>
                  </nav>
                </div>

                <div class="tab-pane fade" id="sedang-diproses" role="tabpanel" aria-labelledby="pills-tab-2">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
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

                         $data = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Sedang Diproses'");
                         $jumlah_data = mysqli_num_rows($data);
                         $total_halaman = ceil($jumlah_data / $batas);

                         $data_order = mysqli_query($koneksi,"SELECT DISTINCT no_pesanan, nama_user,tgl_pesan,tgl_pakai,metode_pembayaran, tgl_bayar,status_pesanan, catatan FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Sedang Diproses' LIMIT $halaman_awal, $batas");

                         $data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Sedang Diproses' LIMIT $halaman_awal, $batas");

                         $nomor = $halaman_awal+1;

                      //Menampilkan List
                         while($d = mysqli_fetch_array($data_order)){
                          ?>                    
                          <tr>
                            <td class="text-center"><?php echo $nomor++; ?></td>
                            <td class="text-center"><?php echo $d['no_pesanan']; ?></td>
                            <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6></td>
                            <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                            <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                            <td class="text-center" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $d['catatan']; ?></td>
                            <td class="text-center"><?php echo $d['metode_pembayaran']; ?></td>
                            <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                            <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                            <td class="text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalBukti<?php echo $d['no_pesanan'] ?>">Lihat</a>
                            </td>
                            <td class="align-middle text-center">
                              <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['no_pesanan']; ?>"> 
                                Edit
                              </a>
                              &nbsp;
                              <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="hapus_order.php?no_pesanan=<?php echo $d['no_pesanan']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order">
                                Delete
                              </a>
                            </td>
                          </tr>
                          <!-- Modal Bukti -->
                          <div class="modal fade" id="exampleModalBukti<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="order.php" method="POST" class="order">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <?php if (isset($d['bukti_pembayaran'])){ ?>
                                        <img src="assets/img/bukti/<?php echo $d['bukti_pembayaran']; ?>" style="width: 200px;">
                                        <input type="hidden" class="form-control form-control-iklan" placeholder="Gambar" name="gambar" value="<?php echo $d['bukti_pembayaran'] ?>">
                                      <?php }else{ ?>
                                        Bukti Pembayaran Belum Ada!
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="reject" class="btn btn-danger"><i class="uil uil-times" style="font-size: 15px;"></i></button>
                                    <button type="submit" name="accept" class="btn btn-primary"><i class="uil uil-check" style="font-size: 15px;"></i></button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- End Modal Bukti -->

                          <!-- Modal Edit -->
                          <div class="modal fade" id="exampleModalEdit<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="order.php" method="POST" class="order" enctype='multipart/form-data'>
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label for="txt_nama">Nama Customer</label>
                                      <input type="nama" class="form-control form-control-order" placeholder="Nama Customer" name="txt_nama" value="<?php echo $d['nama_user']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_tglpesan">Tanggal Pemesanan</label>
                                      <input type="date" class="form-control form-control-order" name="txt_tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_tglpakai">Tanggal Pemakaian</label>
                                      <input type="datetime-local" class="form-control form-control-order" name="txt_tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_menu">Nama Menu</label>
                                      <input type="text" class="form-control form-control-order" id="exampleFisrtName" placeholder="Nama Menu" name="txt_menu" value="<?php echo $d['nama_menu']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_note">Catatan</label>
                                      <input type="text" class="form-control form-control-order" placeholder="Catatan" name="txt_note" value="<?php echo $d['catatan_order']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_hrgsatuan">Harga Satuan</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_hrgsatuan" value="<?php echo $d['harga_satuan']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_jml">Jumlah Pesanan</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_jml" value="<?php echo $d['jumlah']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_total">Total Harga</label>
                                      <input type="number" class="form-control form-control-order" placeholder="Total Harga" name="txt_total" value="<?php echo $d['total_harga']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_bayar">Metode Pembayaran</label>
                                      <?php 

                                      $data = mysqli_query($koneksi,"SELECT * FROM pembayaran");
                                      while($u = mysqli_fetch_array($data)){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_bayar" value="<?php echo $u['id_pembayaran'] ?>" style="margin-left:20px;" <?php if($d['id_pembayaran']==$u['id_pembayaran']){ echo "checked";}else{echo "";} ?> disabled>   <?php echo $u['metode_pembayaran']; ?>
                                        </div>

                                        <?php
                                      }
                                      ?>   
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_tglbayar">Tanggal Pembayaran</label>
                                      <input type="date" class="form-control form-control-order" placeholder="Tanggal Pembayaran" name="txt_tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="txt_status">Status Pesanan</label>
                                      <?php 
                                      if($d['status_pesanan'] == "Belum Dibayar" ){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;" checked>  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                        </div>
                                        <?php 
                                      }elseif($d['status_pesanan'] == "Sedang Diproses"){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;" checked>  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                        </div>
                                        <?php 
                                      }elseif($d['status_pesanan'] == "Selesai"){
                                        ?>
                                        <div style="font-size:15px;">
                                          <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                          <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                          <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;" checked>  Selesai
                                        </div>

                                        <?php
                                      }
                                      ?>
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
                            <?php
                          }
                          //End Menampilkan List
                          ?>                    
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <br>
                  <!-- Pagination -->
                  <nav>
                    <ul class="pagination justify-content-center">
                      <li class="page-item">
                        <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>> < </a>
                      </li>
                      <?php 
                      for($x=1;$x<=$total_halaman;$x++){
                        ?> 
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                        <?php
                      }
                      ?>        
                      <li class="page-item">
                        <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>> </a>
                      </li>
                    </ul>
                  </nav>
                </div>  

                <div class="tab-pane fade" id="pesanan-selesai" role="tabpanel" aria-labelledby="pills-tab-3">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bukti Pembayaran</th>
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

                          $data = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Selesai'");
                          $jumlah_data = mysqli_num_rows($data);
                          $total_halaman = ceil($jumlah_data / $batas);

                          $data_order = mysqli_query($koneksi,"SELECT DISTINCT no_pesanan, nama_user,tgl_pesan,tgl_pakai,metode_pembayaran, tgl_bayar,status_pesanan, catatan FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Selesai' LIMIT $halaman_awal, $batas");

                          $data_order1 = mysqli_query($koneksi,"SELECT * FROM orders JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE status_pesanan='Selesai' LIMIT $halaman_awal, $batas");

                          $nomor = $halaman_awal+1;

                      //Menampilkan List
                          while($d = mysqli_fetch_array($data_order)){
                            ?>                    
                            <tr>
                              <td class="text-center"><?php echo $nomor++; ?></td>
                              <td class="text-center"><?php echo $d['no_pesanan']; ?></td>
                              <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6></td>
                              <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                              <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                              <td class="text-center" style="word-wrap: break-word;min-width: 160px;max-width: 160px;white-space:normal;"><?php echo $d['catatan']; ?></td>
                              <td class="text-center"><?php echo $d['metode_pembayaran']; ?></td>
                              <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                              <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                              <td class="text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#exampleModalBukti<?php echo $d['no_pesanan'] ?>">Lihat</a>
                              </td>
                              <td class="align-middle text-center">
                                <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order" data-bs-toggle="modal" data-bs-target="#exampleModalEdit<?php echo $d['no_pesanan']; ?>"> 
                                  Edit
                                </a>
                                &nbsp;
                                <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="hapus_order.php?no_pesanan=<?php echo $d['no_pesanan']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order">
                                  Delete
                                </a>
                              </td>
                            </tr>
                            <!-- Modal Bukti -->
                            <div class="modal fade" id="exampleModalBukti<?php echo $d['no_pesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="order.php" method="POST" class="order">
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <?php if (isset($d['bukti_pembayaran'])){ ?>
                                          <img src="assets/img/bukti/<?php echo $d['bukti_pembayaran']; ?>" style="width: 200px;">
                                          <input type="hidden" class="form-control form-control-iklan" placeholder="Gambar" name="gambar" value="<?php echo $d['bukti_pembayaran'] ?>">
                                        <?php }else{ ?>
                                          Bukti Pembayaran Belum Ada!
                                        <?php } ?>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" name="reject" class="btn btn-danger"><i class="uil uil-times" style="font-size: 15px;"></i></button>
                                      <button type="submit" name="accept" class="btn btn-primary"><i class="uil uil-check" style="font-size: 15px;"></i></button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- End Modal Bukti -->

                            <!-- Modal Edit -->
                            <div class="modal fade" id="exampleModalEdit<?php echo $d['no_pesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="order.php" method="POST" class="order" enctype='multipart/form-data'>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <label for="txt_nama">Nama Customer</label>
                                        <input type="nama" class="form-control form-control-order" placeholder="Nama Customer" name="txt_nama" value="<?php echo $d['nama_user']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_tglpesan">Tanggal Pemesanan</label>
                                        <input type="date" class="form-control form-control-order" name="txt_tglpesan" value="<?php echo $d['tgl_pesan']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_tglpakai">Tanggal Pemakaian</label>
                                        <input type="datetime-local" class="form-control form-control-order" name="txt_tglpakai" value="<?php echo $d['tgl_pakai']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_menu">Nama Menu</label>
                                        <input type="text" class="form-control form-control-order" id="exampleFisrtName" placeholder="Nama Menu" name="txt_menu" value="<?php echo $d['nama_menu']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_note">Catatan</label>
                                        <input type="text" class="form-control form-control-order" placeholder="Catatan" name="txt_note" value="<?php echo $d['catatan_order']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_hrgsatuan">Harga Satuan</label>
                                        <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_hrgsatuan" value="<?php echo $d['harga_satuan']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_jml">Jumlah Pesanan</label>
                                        <input type="number" class="form-control form-control-order" placeholder="Harga Satuan" name="txt_jml" value="<?php echo $d['jumlah']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_total">Total Harga</label>
                                        <input type="number" class="form-control form-control-order" placeholder="Total Harga" name="txt_total" value="<?php echo $d['total_harga']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_bayar">Metode Pembayaran</label>
                                        <?php 

                                        $data = mysqli_query($koneksi,"SELECT * FROM pembayaran");
                                        while($u = mysqli_fetch_array($data)){
                                          ?>
                                          <div style="font-size:15px;">
                                            <input type="radio" name="txt_bayar" value="<?php echo $u['id_pembayaran'] ?>" style="margin-left:20px;" <?php if($d['id_pembayaran']==$u['id_pembayaran']){ echo "checked";}else{echo "";} ?> disabled>   <?php echo $u['metode_pembayaran']; ?>
                                          </div>

                                          <?php
                                        }
                                        ?>   
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_tglbayar">Tanggal Pembayaran</label>
                                        <input type="date" class="form-control form-control-order" placeholder="Tanggal Pembayaran" name="txt_tglbayar" value="<?php echo $d['tgl_bayar']; ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="txt_status">Status Pesanan</label>
                                        <?php 
                                        if($d['status_pesanan'] == "Belum Dibayar" ){
                                          ?>
                                          <div style="font-size:15px;">
                                            <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;" checked>  Belum Dibayar
                                            <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                            <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                          </div>
                                          <?php 
                                        }elseif($d['status_pesanan'] == "Sedang Diproses"){
                                          ?>
                                          <div style="font-size:15px;">
                                            <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                            <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;" checked>  Sedang Diproses
                                            <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;">  Selesai
                                          </div>
                                          <?php 
                                        }elseif($d['status_pesanan'] == "Selesai"){
                                          ?>
                                          <div style="font-size:15px;">
                                            <input type="radio" name="txt_status" value="Belum Dibayar" style="margin-left:20px;">  Belum Dibayar
                                            <input type="radio" name="txt_status" value="Sedang Diproses" style="margin-left: 50px;">  Sedang Diproses
                                            <input type="radio" name="txt_status" value="Selesai" style="margin-left: 50px;" checked>  Selesai
                                          </div>

                                          <?php
                                        }
                                        ?>
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
                              <?php
                            }
                    //End Menampilkan List
                            ?>                                  
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <br>
                    <!-- Pagination -->
                    <nav>
                      <ul class="pagination justify-content-center">
                        <li class="page-item">
                          <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>> < </a>
                        </li>
                        <?php 
                        for($x=1;$x<=$total_halaman;$x++){
                          ?> 
                          <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                          <?php
                        }
                        ?>        
                        <li class="page-item">
                          <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>> </a>
                        </li>
                      </ul>
                    </nav>
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
//Memanggil Footer
    include('../footer.php')
  ?>