<?php
include 'cek.php';
$id = $_GET['id'];
$query="DELETE from user_login where email_user='$id'";
mysqli_query($conn, $query);
header("location:../admin/nasabah.php");
?>