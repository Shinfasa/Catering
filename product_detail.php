<?php 
include "header.php";
?>
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
        background: #62c3e7;
        color: #fff;
        border: none;
        padding: 8px;
        opacity: 1;
        transition: 0.3s all;
    }
</style>
</head>


<br>
<br>

<body>
    <section class="container sproduct my-5 pt-1">
    <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Harian</li>
                </ol>
            </nav>
        <div class="row mt-1">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="assets/img/p-1.jpg" id="maining" alt="">
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <h2 class="py-2">Tasty Burger</h3>
                    <h4 class="py-3">Rp 10.000</h4>
                    <select class="my-3">
                        <option>Pilih Paket</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
                        <option>Sabtu</option>
                    </select>
                    <input type="number" value="1">
                    <button class="buy-btn"><b>Add to Cart</b></button>
                    <h4 class="py-3"></h4>
                    <div class="detail-product-rating mb-2 d-flex">
                                    <div class="product-rating me-3">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div><span>5 / 5</span>
                    </div>
                    <h4 class="mt-5 mb-3">Description</h4>
                    <p style="text-align: justify;">Ice Cream Cone is a crumbly cone-shaped cookie, usually made of wafers whose texture is similar to a waffle so that the ice cream can be picked up and eaten without a bowl or spoon. We provide four of the best flavors for you, there are matcha, strawberry, vanilla, and chocolate.</p>
                </div>
            </div>
        </section>
        <script>
            var maining = document.getElementById('maining');
            var smalling = document.getElementsByClassName('small-img');
            smalling[0].onclick = function() {
                maining.src = smalling[0].src;
            }
            smalling[1].onclick = function() {
                maining.src = smalling[1].src;
            }
            smalling[2].onclick = function() {
                maining.src = smalling[2].src;
            }
            smalling[3].onclick = function() {
                maining.src = smalling[3].src;
            }
        </script>
    <?php
    include 'footer.php';
    ?>