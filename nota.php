<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body style="padding: 0 20;">
    <div>
    <?php 
        include "koneksi.php";
        session_start();
        $idUser   =  $_SESSION['name'];
        $no_pesanan = $_GET['resi'];
        $select = mysqli_query($koneksi, "SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$no_pesanan'");
        
    ?>
      <section class="content">
        <div class="row">
            <div>
                <div class="span12">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><h2><strong>No. Pesanan </strong>#<?php echo $data['no_pesanan']; ?> </h2></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin Sahretech</strong><br>
                Jl. Sudirman No.3012, Palembang<br>
                Kec. Palembang Raya, Palembang,<br>
                Sumatera selatan 30961<br>
                Phone: (804) 123-5432<br>
                Email: info@sahretech.com
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $idUser; ?></strong><br>
                Jl. Sudirman No. 3012, Palembang<br>
                Kec. Palembang Raya, Palembang,<br>
                Sumatera selatan 30961<br>
                Phone: (555) 539-1037<br>
                Email: nbelputra437@gmail.com
              </address>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>No. Pesanan</th>
                  <th>Tgl Pakai</th>
                  <th>Nama menu</th>
                  <th>harga</th>
                  <th>qty</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                    while($data = mysqli_fetch_array($select)){
                    ?>
                    <tr>
                        <td><?php echo $data['no_pesanan']; ?></td>
                        <td><?php echo $data['tgl_pakai']; ?></td>
                        <td><?php echo $data['nama_menu']; ?></td>
                        <td><?php echo $data['harga_satuan']; ?></td>
                        <td><?php echo $data['qty'].'%'; ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td><b>Total Biaya</b></td>
                        <td><b><?php echo "0" ?></b></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
          </div>
      </section>
    </div>
  </body>
   <script>
      window.print()
  </script>