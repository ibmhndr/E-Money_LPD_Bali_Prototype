<?php
  session_start();
  error_reporting(0);
  include "cek.php";
  $nomorsaldo = $_POST['nomor_saldo'];
  $nomorpenerima  = $_POST['id_penerima'];
  $jumlah  = $_POST['jumlah_pembayaran'];
  $jenis = '3';
  $diskon = '0';

  // select penerima
  $sqlpenerima = mysqli_query($conn,"SELECT nomor_saldo from saldo WHERE nomor_saldo='$nomorpenerima'");
  $row = mysqli_fetch_assoc($sqlpenerima);
  $ncari = $row['nomor_saldo'];

  if($nomorpenerima == $ncari)
  {
    // insert pembayaran
    $mysqli  = "INSERT INTO pembayaran(nomor_saldo, id_jenis, waktu_pembayaran, jumlah_pembayaran, diskon_pembayaran) VALUES ('$nomorsaldo', '$jenis', now(), '$jumlah', '$diskon')";
    $rst = mysqli_query($conn, $mysqli);

    // select id
    $mysqli1 = mysqli_query($conn,"SELECT id_pembayaran from pembayaran WHERE nomor_saldo='$nomorsaldo' AND waktu_pembayaran = (SELECT MAX(waktu_pembayaran) FROM pembayaran WHERE nomor_saldo='$nomorsaldo')");
    $row = mysqli_fetch_assoc($mysqli1);
    $idpembayaran = $row['id_pembayaran'];

    // insert pembayaran detail
    $sql = "INSERT INTO pembayaran_transfer_detail (id_pembayaran, id_penerima) VALUES ('$idpembayaran', '$nomorpenerima')";
    $rst1 = mysqli_query($conn, $sql);
  }

  else{
      echo '<script language="javascript">alert("Nomor Penerima Tidak Ditemukan, Transaksi Dibatalkan!");document.location="../nasabah/kirimuanglpd.php";</script>';
  }
  
    if($rst && $rst1){
      $update = "UPDATE saldo SET total_saldo = total_saldo + $jumlah WHERE nomor_saldo = $nomorpenerima";
      $rst1 = mysqli_query($conn, $update);  
      echo '<script language="javascript">alert("Transaksi Berhasil!");document.location="../nasabah/kirimuanglpd.php";</script>';
    }
    else{
      echo '<script language="javascript">alert("Transaksi Gagal!");document.location="../nasabah/kirimuanglpd.php";</script>';
    }
?>  