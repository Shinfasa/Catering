<?php 
require ('../../../koneksi.php');

$id_menu = $_GET['id_menu'];
$sql = "DELETE FROM menu WHERE id_menu='$id_menu'";
$result = mysqli_query($koneksi,$sql);
header("location:menu.php");
?>