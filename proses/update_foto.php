<?php
  session_start();
  error_reporting(0);
  include "cek.php";
  $temp  = $_FILES['foto']['tmp_name'];
  $file   = $_FILES['foto']['name'];
  $id = $_GET['id'];
  move_uploaded_file($temp, '../images/foto/'.$file);
    $mysqli  = "UPDATE `foto` SET `foto`='$file' WHERE `id_foto`='$id'";
    $rst = mysqli_query($conn, $mysqli);
  if($rst){
    echo '<script language="javascript">alert("FOTO berhasil DIPERBAHARUI!");document.location="../admin/galery.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("FOTO gagal DIPERBAHARUI!");document.location="../admin/galery.php";</script>';
  }
?>