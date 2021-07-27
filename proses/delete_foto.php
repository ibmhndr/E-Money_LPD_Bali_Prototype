<?php
include 'cek.php';
$id = $_GET['id'];
$query="DELETE from foto where id_foto='$id'";
mysqli_query($conn, $query);
header("location:../admin/galery.php");
?>