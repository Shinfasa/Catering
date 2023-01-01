<?php 
require ('../../../koneksi.php');

$id_pembayaran = $_GET['id_pembayaran'];
$sql = "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'";
$result = mysqli_query($koneksi,$sql);
header("location:pembayaran.php");
?>