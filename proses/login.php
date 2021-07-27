<?php
  error_reporting(0);
   session_start();
   require_once("cek.php");
   $email_user = $_POST['email'];
   $password = $_POST['pass'];
   $cekuser = mysqli_query($conn,"SELECT * FROM user_login WHERE email_user = '$email_user' and password_user = '$password'");
   $hasil = mysqli_fetch_array($cekuser);
   $role = $hasil['id_role'];
   $rst = mysqli_query($conn, $mysqli);
   if(mysqli_num_rows($cekuser) > 0) {
       if($role == '1'){
       $cek = mysqli_query($conn,"SELECT * FROM user_login INNER JOIN admin ON user_login.email_user=admin.email_admin WHERE email_user = '$email_user' and password_user = '$password'");
       $hasil2 = mysqli_fetch_array($cek);
       $_SESSION['email_user'] = $hasil2['email_user'];
       $_SESSION['id_admin'] = $hasil2['id_admin'];
       echo '<script language="javascript">alert("Anda berhasil LOGIN sebagai Admin!");document.location="../admin/data_admin.php";</script>';
     }
      else if($role == '2'){
        $_SESSION['email_user'] = $hasil['email_user'];
        echo '<script language="javascript">alert("Anda berhasil LOGIN sebagai Nasabah!");document.location="../nasabah/data.php";</script>';
      }
    }
   else
       echo '<script language="javascript">alert("PASSWORD atau USERNAME Anda salah!"); document.location="../index.php";</script>';
?>