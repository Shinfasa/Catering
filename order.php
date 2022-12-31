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
                            <th class="text-center" style="color: #384046;">No.</th>
                            <th class="text-center" style="color: #384046;">Tanggal Pemesanan</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Jumlah Pesanan</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Status</th>
                            <th class="text-center" style="color: #384046;">Nota</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center" style="color: #384046;">1</td>
                            <td class="text-center" style="color: #384046;">29/12/2022</td>
                            <td class="text-center" style="color: #384046;"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center" style="color: #384046;">1</td>
                            <td class="text-center" style="color: #384046;">Rp 10000</td>
                            <td class="text-center" style="color: #384046;">Sedang Diproses</td>
                            <td class="text-center" style="color: #384046;">
                                <a class="btn" href="nota.php"><i class="bi bi-printer"></i></a>
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
                            <th class="text-center" style="color: #384046;">No.</th>
                            <th class="text-center" style="color: #384046;">Tanggal Selesai</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Jumlah Pesanan</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Status</th>
                            <th class="text-center" style="color: #384046;">Nota</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center" style="color: #384046;">1</td>
                            <td class="text-center" style="color: #384046;">31/12/2022</td>
                            <td class="text-center" style="color: #384046;"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center" style="color: #384046;">1</td>
                            <td class="text-center" style="color: #384046;">Rp 10000</td>
                            <td class="text-center" style="color: #384046;">Selesai</td>
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