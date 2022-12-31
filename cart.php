<?php
include 'header.php';
?>

<br>
<br>

<body>

<!-- popular section starts  -->
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Keranjang Saya</h2>
    </div>
    
    <!-- DataTables -->
    <div class="row">                        
        <div class="card-body col-8">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="color: #384046;">Checklist</th>
                            <th class="text-center" style="color: #384046;">Menu</th>
                            <th class="text-center" style="color: #384046;">Harga</th>
                            <th class="text-center" style="color: #384046;">Qty</th>
                            <th class="text-center" style="color: #384046;">Total Harga</th>
                            <th class="text-center" style="color: #384046;">Hapus</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center" style="color: #384046;"><input type="checkbox" name="" id=""></td>
                            <td class="text-center" style="color: #384046;"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center" style="color: #384046;">Rp 10000</td>
                            <td class="text-center" style="color: #384046;"><input type="number" class="w-25" value="1"></td>
                            <td class="text-center" style="color: #384046;">Rp 10000</td>
                            <td class="text-center" style="color: #384046;"><a href="" class="btn"><i class="bi bi-trash"></i></a></td>
                        </tr>                                       
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card col-md-3" style="margin-left: 30px; border-radius: 0;">
                <div>
                    <h5 class="text-center pt-3"><b>Total</b></h5>
                    <hr style="padding: 2px; margin: 10px;">
                    <div class="d-flex justify-content-between p-2">
                        <p style="color: #384046;">1 menu</p>
                        <p style="color: #384046;">Rp 50.000</p>
                    </div>
                    <hr style="padding: 2px; margin: 10px;">
                    <a href="checkout.php" class="btn mb-3" style="margin-left: 120px;">Check Out</a>
                </div>
            </div>
  </div>

</section>
<!-- End Section -->

</body>
<br>
<?php
include 'footer.php';
?>
</html>