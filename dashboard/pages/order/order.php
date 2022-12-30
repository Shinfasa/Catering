<?php
include('../header.php');
?>
    <div class="container-fluid py-4">
      <d class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Order</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Customer</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pesan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Pakai</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Catatan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga Satuan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pembayaran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tgl. Bayar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Pesanan</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $batas = 10;
                      $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                      $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  
 
                      $previous = $halaman - 1;
                      $next = $halaman + 1;
        
                      $data = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran;");
                      $jumlah_data = mysqli_num_rows($data);
                      $total_halaman = ceil($jumlah_data / $batas);
 
                      $data_order = mysqli_query($koneksi,"SELECT * FROM orders JOIN orderdetail ON orders.id_order = orderdetail.id_order JOIN user ON orders.id_user = user.id_user JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orderdetail.id_pembayaran = pembayaran.id_pembayaran LIMIT $halaman_awal, $batas");
                      $nomor = $halaman_awal+1;
                      while($d = mysqli_fetch_array($data_order)){
                    ?>
                      <tr>
                        <td class="text-center"><?php echo $nomor++; ?></td>
                        <td class="text-center"><h6 class="mb-0 text-sm"><?php echo $d['nama_user']; ?></h6></td>
                        <td class="text-center"><?php echo $d['tgl_pesan']; ?></td>
                        <td class="text-center"><?php echo $d['tgl_pakai']; ?></td>
                        <td class="text-center"><?php echo $d['nama_menu']; ?></td>
                        <td class="text-center"><?php echo $d['catatan_order']; ?></td>
                        <td class="text-center"><?php echo $d['harga_satuan']; ?></td>
                        <td class="text-center"><?php echo $d['jumlah']; ?></td>
                        <td class="text-center"><?php echo $d['total_harga']; ?></td>
                        <td class="text-center"><?php echo $d['metode_pembayaran']; ?></td>
                        <td class="text-center"><?php echo $d['tgl_bayar']; ?></td>
                        <td class="text-center"><?php echo $d['status_pesanan']; ?></td>
                        <td class="align-middle text-center">
                          <a href="edit_order.php?id_order=<?php echo $d['id_order'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit Order">
                          Edit
                          </a>
                          &nbsp;
                          <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Order?')" href="hapus_order.php?id_order=<?php echo $d['id_order'] ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Delete
                          </a>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
include('../footer.php')
?>