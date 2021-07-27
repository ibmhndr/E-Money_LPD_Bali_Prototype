<?php
include 'cek.php';
$id = $_GET['id'];
$query="DELETE from berita where id_berita='$id'";
mysqli_query($conn, $query);
header("location:../admin/berita.php");
?>