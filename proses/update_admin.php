<?php
  include "cek.php";
  session_start();
  $tes = $_SESSION['email_user'];
  $id = $_POST['id_admin'];
  $nama  = $_POST['nama'];
  $kelamin  = $_POST['kelamin'];
  $telp  = $_POST['telp'];
  $pass  = $_POST['pass'];
  $temp  = $_FILES['foto']['tmp_name'];
  $file   = $_FILES['foto']['name'];
  move_uploaded_file($temp, '../images/foto_admin/'.$file);
  $mysqli1  = "UPDATE `user_login` SET `password_user`='$pass' WHERE `email_user`='$tes'";
  $rst1 = mysqli_query($conn, $mysqli1);
  if($file == "")
  {
    $mysqli  = "UPDATE `admin` SET `nama_admin`='$nama',`jk_admin`='$kelamin', `telp_admin`='$telp' WHERE `id_admin`= '$id'";
  }
  else{
    $mysqli  = "UPDATE `admin` SET `nama_admin`='$nama',`jk_admin`='$kelamin', `telp_admin`='$telp',`foto_admin`='$file' WHERE `id_admin`= '$id'";
  }
  
  $rst = mysqli_query($conn, $mysqli);
  if($rst && $rst1){
    if($rst1){
        echo '<script language="javascript">alert("UPDATE DATA ADMIN berhasil!");document.location="../admin/data_admin.php";</script>';
      }
  }
  else{
    echo '<script language="javascript">alert("UPDATE DATA ADMIN GAGAL!");document.location="../admin/data_admin.php";</script>';
  }
?>