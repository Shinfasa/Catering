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
<section id="menu" class="what-we-do">
  <div class="container">

    <div class="section-title">
      <h2>Keranjang Saya</h2>
    </div>
</div>
</section>

    <section id="cart-container" class="container my-5">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>
                        <img src="image/Matcha.png" alt="">
                    </td>
                    <td>
                        <h6>Ice Cream Cone</h6>
                        <p>Matcha</p>
                    </td>
                    <td>Rp 10.000</td>
                    <td><input class="w-25 pl-1" value="1" type="number"></td>
                    <td>Rp 10.000</td>
                    <td>
                        <i class="fas fa-trash-alt" style=" color: #62c3e7"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="image/Strawberry.png" alt="">
                    </td>
                    <td>
                        <h6>Ice Cream Cone</h6>
                        <p>Strawberry</p>
                    </td>
                    <td>Rp 10.000</td>
                    <td><input class="w-25 pl-1" value="1" type="number"></td>
                    <td>Rp 10.000</td>
                    <td>
                        <i class="fas fa-trash-alt" style=" color: #62c3e7"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="image/Vanilla.png" alt="">
                    </td>
                    <td>
                        <h6>Ice Cream Cone</h6>
                        <p>Vanilla</p>
                    </td>
                    <td>Rp 10.000</td>
                    <td><input class="w-25 pl-1" value="1" type="number"></td>
                    <td>Rp 10.000</td>
                    <td>
                        <i class="fas fa-trash-alt" style=" color: #62c3e7"></i>
                    </td>
                </tr>
                <tr>
                    <td><img src="image/Chocolate.png" alt=""></td>
                    <td>
                        <h6>Ice Cream Cone</h6>
                        <p>Chocolate</p>
                    </td>
                    <td>Rp 10.000</td>
                    <td><input class="w-25 pl-1" value="1" type="number"></td>
                    <td>Rp 10.000</td>
                    <td>
                        <i class="fas fa-trash-alt" style=" color: #62c3e7"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <section id="cart-bottom" class="container">
        <div class="row">
            <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                <div>
                    <h5>COUPON</h5>
                    <p>Enter your coupon code if you have one.</p>
                    <input type="text" placeholder="Coupon Code">
                    <button>APPLY COUPON</button>
                </div>
            </div>
            <div class="total col-lg-6 col-md-6 col-12">
                <div>
                    <h5>CART TOTAL</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Subtotal</h6>
                        <p>Rp 40.000</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Discount</h6>
                        <p>Rp 10.000</p>
                    </div>
                    <hr style="margin: 10px;">
                    <div class="d-flex justify-content-between">
                        <h6>Shipping</h6>
                        <p>Rp 10.000</p>
                    </div>
                    <hr style="padding: 2px; margin: 10px;">
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p>Rp 50.000</p>
                    </div>
                    <button onclick="window.location.href='check_out.php'">CHECKOUT</button>
                </div>
            </div>
        </div>
    </section>
</body>
<br>
<?php
include 'footer.php';
?>
</html>