<?php
  session_start();
  error_reporting(0);
  include "cek.php";
  $nomorsaldo = $_POST['nomor_saldo'];
  $idprovider  = $_POST['id_provider'];
  $no_meteran  = $_POST['no_meteran'];
  $jumlah  = $_POST['jumlah_pembayaran'];
  $jenis = '2';
  $diskon = '0';

  // insert pembayaran
  $mysqli  = "INSERT INTO pembayaran(nomor_saldo, id_jenis, waktu_pembayaran, jumlah_pembayaran, diskon_pembayaran) VALUES ('$nomorsaldo', '$jenis', now(), '$jumlah', '$diskon')";
  $rst = mysqli_query($conn, $mysqli);

  // select id
  $mysqli1 = mysqli_query($conn,"SELECT id_pembayaran from pembayaran WHERE nomor_saldo='$nomorsaldo' AND waktu_pembayaran = (SELECT MAX(waktu_pembayaran) FROM pembayaran WHERE nomor_saldo='$nomorsaldo')");
  $row = mysqli_fetch_assoc($mysqli1);
  $idpembayaran = $row['id_pembayaran'];
  
  // insert pembayaran detail
  $sql = "INSERT INTO pembayaran_listrik_detail (id_pembayaran, no_meteran) VALUES ('$idpembayaran', '$no_meteran')";
  $rst1 = mysqli_query($conn, $sql);
  
  if($rst && $rst1){
    $rst1 = mysqli_query($conn, $update);  
    echo '<script language="javascript">alert("Transaksi Berhasil!");document.location="../nasabah/pembayaranlistrik.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("Transaksi Gagal!");document.location="../nasabah/pembayaranlistrik.php";</script>';
  }
?>  