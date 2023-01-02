<?php 
require ('../../../koneksi.php');

$id_car = $_GET['id_car'];
$sql = "DELETE FROM carousel WHERE id_car='$id_car'";
$result = mysqli_query($koneksi,$sql);
header("location:iklan.php");
?>