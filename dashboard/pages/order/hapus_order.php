<?php 
require ('../../../koneksi.php');

$id_order = $_GET['id_order'];
$sql = "DELETE orders FROM orders JOIN orderdetail ON orderdetail.id_order = orders.id_order WHERE orders.id_order = '$id_order';";
$result = mysqli_query($koneksi,$sql);
header("location:order.php");
?>