<?php
  session_start();
  error_reporting(0);
  include "cek.php";
  $temp  = $_FILES['foto']['tmp_name'];
  $file   = $_FILES['foto']['name'];
  $id = $_SESSION['id_admin'];
  move_uploaded_file($temp, '../images/foto/'.$file);
    $mysqli  = "INSERT INTO foto (foto) VALUES ('$file')";
    $rst = mysqli_query($conn, $mysqli);
  if($rst){
    echo '<script language="javascript">alert("BERITA berhasil DITAMBAH!");document.location="../admin/galery.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("BERITA gagal DITAMBAH!");document.location="../admin/galery.php";</script>';
  }
?>