<?php 
require ('../  ../../koneksi.php');

$id_kategori = $_GET['id_kategori'];
$sql = "DELETE FROM kategori WHERE id_kategori='$id_kategori'";
$result = mysqli_query($koneksi,$sql);
header("location:kategori.php");
?>