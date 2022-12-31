<?php
    include "header.php";
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
                            <th class="text-center">Menu</th>
                            <th class="text-center">Jumlah Pesanan</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Nota</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">29/12/2022</td>
                            <td class="text-center"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center">1</td>
                            <td class="text-center">Rp 10000</td>
                            <td class="text-center">Sedang Diproses</td>
                            <td class="text-center">
                                <a class="btn" href="nota.php"><i class="bi bi-printer" style="color: #E8853D;"></i></a>
                            </td>
                        </tr>                                       
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</section>
<!-- End Section -->

<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Riwayat Pesanan</h2>
    </div>
    
    <!-- DataTables -->
    <div>                        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Tanggal Selesai</th>
                            <th class="text-center">Menu</th>
                            <th class="text-center">Jumlah Pesanan</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Nota</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">31/12/2022</td>
                            <td class="text-center"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center">1</td>
                            <td class="text-center">Rp 10000</td>
                            <td class="text-center">Selesai</td>
                            <td class="text-center">
                                <a class="btn" href="nota.php"><i class="bi bi-printer" style="color: #E8853D;"></i></a>
                            </td>
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