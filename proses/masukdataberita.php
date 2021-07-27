<?php
  session_start();
  error_reporting(0);
  include "cek.php";
  $judul = $_POST['judul'];
  $isi  = $_POST['isi'];
  $tanggal  = date('y-m-d');
  $temp  = $_FILES['gambar']['tmp_name'];
  $file   = $_FILES['gambar']['name'];
  $id = $_SESSION['id_admin'];
  echo $id;
  move_uploaded_file($temp, '../images/foto/'.$file);
    $mysqli  = "INSERT INTO berita (judul_berita, isi_berita, tgl_berita, id_admin) VALUES ('$judul', '$isi', '$tanggal', '$id')";
    $rst = mysqli_query($conn, $mysqli);
    $mysqli1  = "INSERT INTO foto (foto, id_admin) VALUES ('$file', '$id')";
    $rst1 = mysqli_query($conn, $mysqli1);
  if($rst && $rst1){
    echo '<script language="javascript">alert("BERITA berhasil DITAMBAH!");document.location="../proses/masukid.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("BERITA gagal DITAMBAH!");document.location="../admin/berita.php";</script>';
  }
?>