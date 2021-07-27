<?php
  session_start();
  error_reporting(0);
  include "cek.php";
    $email = $_SESSION['email_user'];
    $sql = mysqli_query($conn, "SELECT MAX(id_foto) AS id_foto FROM foto");
    $row = mysqli_fetch_assoc($sql);
    $id = $row['id_foto'];
    $mysqli1  = "UPDATE berita SET `id_foto`='$id' ORDER BY id_berita DESC LIMIT 1";
    $rst1 = mysqli_query($conn, $mysqli1);
    header("location:../admin/berita.php");
?>