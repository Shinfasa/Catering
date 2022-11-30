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
        background: #fdce36;
        color: #fff;
        border: none;
        padding: 8px;
        opacity: 1;
        transition: 0.3s all;
    }
</style>
</head>

<?php
include 'header.php';
?>

<br>
<br>

<body>
    <section class="container sproduct my-5 pt-1">
        <div class="row mt-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Nasi Kuning</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nasi Kuning</li>
                </ol>
            </nav>
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="img/nasi_kuning.jpg" id="maining" alt="">
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <h2 class="py-2">Nasi Kuning</h3>
                    <h4 class="py-3">Rp 12.000</h4>
                    <input type="number" value="1">
                    <button class="buy-btn"><b>Add to Cart</b></button>
                    <h4 class="mt-5 mb-3">Description</h4>
                    <p style="text-align: justify;">Kali ini Warung Makan Hana Asri lagi bikin paket 4 nasi kuning dengan beberapa varian di dalamnya yaitu ada telur, ayam, sambal, sayuran, dan sambal goreng kering.
                </div>
            </div>
    <?php
    include 'footer.php';
    ?>