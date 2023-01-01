<?php 
include "header.php";

$id_menu = $_GET['id_menu'];
$query = "SELECT * FROM menu WHERE id_menu = '$id_menu'";
$result = mysqli_query($koneksi, $query);
$detail = mysqli_fetch_array($result);
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
        <div class="row mt-1">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="assets/img/menu/<?php echo $detail['gambar']; ?>" id="maining" alt="">
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <h1 class="py-2" style="font-size: 28px;"><b><?php echo $detail['nama_menu']; ?></b></h1>
                    <h2 class="py-3" style="font-size: 23px;"><?php echo rupiah($detail['harga']); ?></h2>
                    <input type="number" value="1">
                    <button class="buy-btn"><a href="#" class="p-3" style="font-size: 20px;"><span class="bi-cart2 text-light" style="font-size: 20px;"></span></a><b>Add to Cart</b></button>
                    <h4 class="py-3"></h4>
                    <div class="detail-product-rating mb-2 d-flex">
                                    <div class="product-rating me-3" style="font-size: 15px;">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <span style="font-size: 15px;">5 / 5</span>
                    </div>
                    <h4 class="mt-5 mb-3" style="text-align: justify; font-size: 20px;">Description</h4>
                    <p style="text-align: justify; font-size:15px;"><?php echo $detail['detail'] ?></p>
                </div>
            </div>
        </div>
    </section>

</body>

<?php
include 'footer.php';
?>