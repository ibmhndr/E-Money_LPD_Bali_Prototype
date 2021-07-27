<?php
  error_reporting(0);
  include "cek.php";
  $nama = $_POST['nama'];
  $email  = $_POST['email'];
  $telp = $_POST['telp'];
  $kerja  = $_POST['kerja'];
  $alamat = $_POST['alamat'];
  $kab  = $_POST['kab'];
  $jk = $_POST['jk'];
  $tgl  = $_POST['tgl'];
  $tmp  = $_POST['tmp'];
  $pass  = $_POST['pass'];
  $mysqli  = "UPDATE `nasabah` SET `nama_nsb`='$nama',`telp_nsb`='$telp',`pekerjaan_nsb`='$kerja',`alamat_nsb`='$alamat' ,`kabkot_nsb`='$kab',`jk_nsb`='$jk',`tgllahir_nsb`='$tgl',`tmplahir_nsb`='$tmp',`email_nsb`='$email' WHERE `nasabah`.`email_nsb`='$email'";
  $rst=mysqli_query($conn, $mysqli);
   $mysqli1  = "UPDATE `user_login` SET `email_user`='$email',`password_user`='$pass' WHERE `user_login`.`email_user`='$email'";
  $rst1=mysqli_query($conn, $mysqli1);
  if($rst&&$rst1){
    echo '<script language="javascript">alert("UPDATE DATA NASABAH berhasil!");document.location="../admin/nasabah.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("UPDATE DATA NASABAH GAGAL!");document.location="../admin/edit_nsb.php";</script>';
  }
?>