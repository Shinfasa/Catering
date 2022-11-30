<?php
    $host       = "localhost";
    $username   = "root"; 
    $password   = "";
    $db         = "catering";

    $koneksi = mysqli_connect($host, $username, $password, $db);

    //$koneksi = mysqli_connect("localhost", "root", "", "user");

    if (mysqli_connect_errno()) {
        echo "Koneksi Gagal";
    } //else { echo "Koneksi Berhasil"; }
?>