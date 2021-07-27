<?php
  include "cek.php";
  session_start();
  $tes = $_SESSION['email_user'];
  $id = $_POST['id_user'];
  $nama_user  = $_POST['nama_user'];
  $tmplahir_user = $_POST['tmplahir_user'];
  $tgllahir_user = $_POST['tgllahir_user'];
  $kabkot_user  = $_POST['kabkot_user'];
  $jk_nsb  = $_POST['kelamin'];
  $alamat  = $_POST['alamat'];
  $telp_user  = $_POST['telp_user'];
  $ktp_user  = $_POST['ktp_user'];
  $pekerjaan_user  = $_POST['pekerjaan_user'];
  $pass  = $_POST['pass'];
  $pin_user  = $_POST['pin_user'];
  $temp  = $_FILES['ktp']['tmp_name'];
  $file   = $_FILES['ktp']['name'];
  move_uploaded_file($temp, '../images/foto_ktp/'.$file);
  $mysqli  = "UPDATE `nasabah` SET `nama_nsb`='$nama_user',`tmplahir_nsb`='$tmplahir_user',`tgllahir_nsb`='$tgllahir_user',`kabkot_nsb`='$kabkot_user',`pekerjaan_nsb`='$pekerjaan_user',`jk_nsb`='$jk_nsb', `alamat_nsb`='$alamat', `telp_nsb`='$telp_user' WHERE `id_nsb`= $id";
  $rst = mysqli_query($conn, $mysqli);
  $mysqli1  = "UPDATE `user_login` SET `password_user`='$pass' WHERE `email_user`='$tes'";
  $rst1 = mysqli_query($conn, $mysqli1);
  if($file == "")
  {
    $mysqli2  = "UPDATE `saldo` SET `pin_saldo`='$pin_user',`NoKTP`='$ktp_user' WHERE `id_nsb`=$id";
  }
  else{
    $mysqli2  = "UPDATE `saldo` SET `pin_saldo`='$pin_user',`NoKTP`='$ktp_user',`FotoKTP`='$file' WHERE `id_nsb`=$id";
  }
  $rst2 = mysqli_query($conn, $mysqli2);
  if($rst && $rst1 && $rst2){
    if($rst1){
      if($rst2){
        echo '<script language="javascript">alert("UPDATE DATA berhasil!");document.location="../nasabah/data.php";</script>';
      }
    }
  }
  else{
    echo '<script language="javascript">alert("UPDATE DATA GAGAL!");document.location="../nasabah/data.php";</script>';
  }
?>