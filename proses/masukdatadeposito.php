<?php
  session_start();
  error_reporting(0);
  include "cek.php";
  $nomorsaldo = $_POST['nomor_saldo'];
  $jumlah_deposit  = $_POST['jumlah_deposit'];
  $id_jdeposit  = $_POST['id_jdeposit'];
  $status  = "Aktif";
  $waktu_deposito = date("Y-m-d H:i:s");
  if($id_jdeposit == '1')
  {
    $waktu_penarikan = date('Y-m-d H:i:s', strtotime($waktu_deposito. " + 1 month"));
  }
  else if($id_jdeposit == '2')
  {
    $waktu_penarikan = date('Y-m-d H:i:s', strtotime($waktu_deposito. " + 3 month")); 
  }
  else if($id_jdeposit == '3')
  {
    $waktu_penarikan = date('Y-m-d H:i:s', strtotime($waktu_deposito. " + 6 month"));
  }
  else
  {
    $waktu_penarikan = date('Y-m-d H:i:s', strtotime($waktu_deposito. " + 12 month"));  
  }

  // insert deposito
  $mysqli  = "INSERT INTO deposito(nomor_saldo, waktu_deposito, jumlah_deposito, id_jdeposit, waktu_penarikan, status_deposito) VALUES ('$nomorsaldo', '$waktu_deposito', '$jumlah_deposit', '$id_jdeposit', '$waktu_penarikan', '$status')";
  $rst = mysqli_query($conn, $mysqli);
  
  if($rst){ 
    echo '<script language="javascript">alert("Deposito Berhasil!");document.location="../nasabah/deposito.php";</script>';
  }
  else{
    echo '<script language="javascript">alert("Deposito Gagal!");document.location="../nasabah/deposito.php";</script>';
  }
?>  