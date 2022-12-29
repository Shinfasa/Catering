<?php 
require ('../../../koneksi.php');

$id_user = $_GET['id_user'];
$sql = "DELETE FROM user WHERE id_user='$id_user'";
$result = mysqli_query($koneksi,$sql);
header("location:user.php");
?>