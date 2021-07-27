<?php
  error_reporting(0);
  include "cek.php";
  $id = $_POST['id'];
  $isi  = $_POST['isi'];
  $judul = $_POST['judul'];
  $tgl  = $_POST['tgl'];
  $temp  = $_FILES['gambar']['tmp_name'];
  $file   = $_FILES['gambar']['name'];
  move_uploaded_file($temp, '../images/foto/'.$file);
  $mysqli  = "UPDATE `berita` SET `id_berita`='$id',`isi_berita`='$isi',`judul_berita`='$judul',`tgl_berita`='$tgl' WHERE id_berita=$id";
  $rst=mysqli_query($conn, $mysqli);
  $sql = mysqli_query($conn, "SELECT * FROM berita INNER JOIN foto ON berita.id_foto = foto.id_foto WHERE id_berita=$id ");
      $row = mysqli_fetch_assoc($sql);
      $id_foto = $row['id_foto'];
  if($file == "")
  {
    $mysqli2 = "$file";
  }
  else{
    $mysqli2  =  "UPDATE `foto` SET `foto`='$file' WHERE id_foto=$id_foto";
  }
  $rst1=mysqli_query($conn, $mysqli2);
  if($rst && $rst1){
    echo '<script language="javascript">alert("UPDATE berhasil!");document.location="../admin/berita.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("UPDATE berhasil!");document.location="../admin/berita.php";</script>';
  }
?>