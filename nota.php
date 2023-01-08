<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body style="padding: 0 20;">
    <div>
        <?php 
        include "koneksi.php";
        include('function/rupiah.php');
        session_start();
        $idUser   =  $_SESSION['name'];
        $userMail =  $_SESSION['email'] ;
        $no_pesanan = $_GET['resi'];
        $select = mysqli_query($koneksi, "SELECT * FROM orders JOIN menu ON orders.id_menu = menu.id_menu JOIN pembayaran ON orders.id_pembayaran = pembayaran.id_pembayaran WHERE no_pesanan = '$no_pesanan'");
        $select2 = mysqli_query($koneksi, "SELECT * FROM orders WHERE no_pesanan = '$no_pesanan'");
        $data1 = mysqli_fetch_array($select2);
        ?>
        <section class="content">
            <div class="row">
                <div>
                    <div class="span12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><h2><strong>No. Pesanan </strong>#<?php echo $data1['no_pesanan']; ?> </h2></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pakai :</strong><?php echo $data1['tgl_pakai']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Admin
                  <address>
                    <strong>WM Hana Asri</strong><br>
                    Jl. Sudirman No.3012, Palembang<br>
                    Kec. Palembang Raya, Palembang,<br>
                    Sumatera selatan 30961<br>
                    Phone: (804) 123-5432<br>
                    Email: info@sahretech.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Customer
              <address>
                <strong><?php echo $idUser; ?></strong><br>
                <?php echo $data1['alamat']; ?><br>
                Phone: <?php echo $data1['nohp']; ?><br>
                Email: <?php echo $userMail; ?>
            </address>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama menu</th>
                  <th>harga</th>
                  <th>qty</th>
                  <th>sub total harga</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            $no=1;
            $grand_total = 0;
            while($data = mysqli_fetch_array($select)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_menu']; ?></td>
                    <td><?php echo rupiah($data['harga_satuan']); ?></td>
                    <td><?php echo $data['qty']; ?></td>
                    <td><?php echo rupiah($sub_total = ($data['harga_satuan'] * $data['qty'])); ?></td>
                </tr>
                <?php 
                $grand_total += $sub_total;
            } 
            ?>
            <tr>
                <td colspan="3"></td>
                <td><b>Total Harga</b></td>
                <td><b><?php echo rupiah($grand_total); ?></b></td>
            </tr>

        </tbody>
    </table>
</div>
</section>
</div>
</body>
<script>
  window.print()
</script>