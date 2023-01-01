<?php 
include "header.php";
?>
<head>
    <style>
    .small-img-group {
        display: flex;
        justify-content: space-between;
    }
    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }
    .sproduct select {
        display: block;
        padding: 5px 10px;
    }
    .sproduct input {
        width: 50px;
        height: 40px;
        padding-left: 10px;
        font-size: 16px;
        margin-right: 10px;
    }
    .sproduct input:focus {
        outline: none;
    }
    .buy-btn {
        background: #E8853D;
        color: #fff;
        border: none;
        padding: 4px;
        opacity: 1;
        transition: 0.3s all;
    }
    </style>
</head>

<br>
<br>

<body>
    <section class="container sproduct my-5 pt-1">
        <!-- Heading -->
        <div class="section-title">
            <h2>Detail Menu</h2>
        </div>

        <div class="card p-3">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <img class="img-fluid pb-1 mt-2" style="margin-left: 150px;" width="250px" src="assets/img/menu/ayam_geprek.jpg" id="maining" alt="">
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <h3><b>Ayam Geprek</b></h2>
                    <h5>Rp 10.000</h5>
                    <br>
                    <input type="number" value="1">
                    <button class="buy-btn"><a href="cart.php" class="p-3 bi-cart2 text-light" style="font-size: 20px;"></a></button>               
                    <h4 class="mt-5 mb-3" style="text-align: justify; font-size: 20px;">Detail Menu:</h4>
                    <p style="text-align: justify; font-size:15px;">-----</p>
                </div>
            </div>
        </div>
    </section>

</body>

<?php
include 'footer.php';
?>