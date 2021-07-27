<?php
  error_reporting(0);
  include "cek.php";
  $nomor = $_POST['nomor'];
  $noktp  = $_POST['noktp'];
  $foto = $_POST['foto'];
  $pin  = $_POST['pin'];
  $total = $_POST['total'];
  $temp  = $_FILES['foto']['tmp_name'];
  $file   = $_FILES['foto']['name'];
  move_uploaded_file($temp, '../images/foto_ktp/'.$file);
  if($file == "")
  {
    $mysqli = "UPDATE `saldo` SET `nomor_saldo`='$nomor',`NoKTP`='$nomor',`pin_saldo`='$pin' ,`total_saldo`='$total' WHERE `nomor_saldo`='$nomor'";
  }
  else{
    $mysqli  =  "UPDATE `saldo` SET `nomor_saldo`='$nomor',`NoKTP`='$nomor',`FotoKTP`='$file',`pin_saldo`='$pin' ,`total_saldo`='$total' WHERE `nomor_saldo`='$nomor'";
  }
  $rst=mysqli_query($conn, $mysqli);
  if($rst){
    echo '<script language="javascript">alert("UPDATE  SALDO berhasil!");document.location="../admin/saldo.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("UPDATE SALDO GAGAL!");document.location="../admin/edit_saldo.php";</script>';
  }
?>