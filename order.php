<?php
    include "header.php";

    session_start();

    if(!isset($_SESSION['id'])) {
        $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini';
        header('Location: login.php');
    }

    $sesID      = $_SESSION['id'];
    $sesName    = $_SESSION['name'];
    $sesLevel   = $_SESSION['level'];
?>

<br>
<br>

<body>
    
<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Pesanan Saya</h2>
    </div>

    <!-- DataTables -->
    <div>                        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Tanggal Pemesanan</th>
                            <th class="text-center">Tanggal Pemakaian</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Nama Menu</th>
                            <th class="text-center">Jumlah Pesanan</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">29/12/2022</td>
                            <td class="text-center">31/12/2022 10:00:00 AM</td>
                            <td class="text-center"><img src="assets/img/p-1.jpg" width="100px"></td>
                            <td class="text-center">Tasty Burger</td>
                            <td class="text-center">1</td>
                            <td class="text-center">Rp 10000</td>
                            <td class="text-center">Sedang Diproses</td>
                        </tr>                                       
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</section>
<!-- End Section -->

</body>

<?php
    include "footer.php";
?>