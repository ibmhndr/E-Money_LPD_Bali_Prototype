<?php
  error_reporting(0);
  include "cek.php";
  $email  = $_POST['email'];
  $pass  = ($_POST['pass']);
  $pass1 = ($_POST['pass1']);
  $nama  = $_POST['nama'];
  $telp = ($_POST['telp']);
  $id  = "2";
  $tanggal  = date('y-m-d');

  $mysqli  = "INSERT INTO user_login (email_user, password_user, id_role, waktu_daftar) VALUES ('$email', '$pass', '$id', '$tanggal')";
  $rst = mysqli_query($conn, $mysqli);
  $mysqlii  = "UPDATE nasabah SET nama_nsb = '$nama', telp_nsb = '$telp' WHERE email_nsb = '$email'";
  $rst1 = mysqli_query($conn, $mysqlii);

  if($rst && $rst1){
    echo '<script language="javascript">alert("Anda Berhasil Mendaftar!");document.location="../index.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("Anda Gagal Mendaftar!");document.location="../index.php";</script>';
  }
  
?>