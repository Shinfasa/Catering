<head>    
    <style>
    #cart-container {
        overflow-x: auto;
    }
    #cart-container table {
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
        white-space: nowrap;
    }
    #cart-container thead {
        font-weight: 700;
    }
    #cart-container table thead td {
        background: #62c3e7;
        color: #fff;
        border: none;
        padding: 6px 0;
    }
    #cart-container table td {
        border: 1px solid #b6b3b3;
        text-align: center;
    }
    #cart-container table td:nth-child(1){
        width: 100px;
    }
    #cart-container table td:nth-child(2),
    #cart-container table td:nth-child(3) {
        width: 200px;
    }
    #cart-container table td:nth-child(4),
    #cart-container table td:nth-child(5),
    #cart-container table td:nth-child(6) {
        width: 170px;
    }
    #cart-container table tbody img {
        width: 100px;
        height: 80px;
        object-fit: cover;
    }
    #cart-container table tbody i {
        color: #8d8c89;
    }
    #cart-bottom .coupon>div,
    #cart-bottom .total>div {
        border: 1px solid #b6b3b3;
    }
    #cart-bottom .coupon h5,
    #cart-bottom .total h5 {
        background: #62c3e7;
        color: #fff;
        border: none;
        padding: 6px 12px;
        font-weight: 700;
    }
    #cart-bottom .coupon p,
    #cart-bottom .coupon input {
        padding: 0 12px;
    }
    #cart-bottom .coupon input {
        height: 40px;
    }
    #cart-bottom .coupon input,
    #cart-bottom .coupon button {
        margin: 0 0 20px 12px;
    }
    #cart-bottom .coupon button {
        background-color: #62c3e7;
        color: #fff;
        border: none;
        padding: 7px 10px;
    }
    #cart-bottom .total div>div {
        padding: 0 12px;
    }
    #cart-bottom .total h6 {
        color: #2a2a2a;
    }
    .second-hr {
        background: #b6b3b3;
        width: 100%;
        height: 1px;
    }
    #cart-bottom .total div>button {
        background-color: #62c3e7;
        border: none;
        color: #fff;
        padding: 10px 15px;
        margin: 0 0 20px 12px;
        display: flex;
        justify-content: flex-end;
    }
</style>
</head>

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
                            <th class="text-center">Checklist</th>
                            <th class="text-center">Menu</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Total Harga</th>
                            <th class="text-center">Hapus</th>
                        </tr>
                    </thead>                                    
                    <tbody> 
                        <tr>
                            <td class="text-center"><input type="checkbox" name="" id=""></td>
                            <td class="text-center"><img src="assets/img/p-1.jpg" width="100px"><span style="margin-left: 10px;">Tasty Burger</span></td>
                            <td class="text-center">Rp 10000</td>
                            <td class="text-center"><input type="number" class="w-25" value="1"></td>
                            <td class="text-center">Rp 10000</td>
                            <td class="text-center"><a href="" class="btn"><i class="bi bi-trash"></i></a></td>
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
                        <p>1 menu</p>
                        <p>Rp 50.000</p>
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