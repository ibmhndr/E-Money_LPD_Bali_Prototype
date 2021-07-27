<?php session_start(); 
error_reporting(0);
 if(!isset($_SESSION['email_user']))
  {
    header('location:../index.php');
    exit(); 
  }?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Admin</title>

<link href="../css/bootstrap1.min.css" rel="stylesheet">

<link href="../css/simplesidebar.css" rel="stylesheet">
<link href="../css/stylee.css" rel="stylesheet">
<link href="../css/tabell.css" rel="stylesheet">
</head>
<body>
 <?php
      include "../proses/cek.php";
      $email=$_SESSION['email_user'];
      $sql = mysqli_query($conn, "SELECT * FROM user.login INNER JOIN admin ON user.email_user = nasabah.email_admin WHERE nasabah.email_admin = '$email'");
      $row = mysqli_fetch_assoc($sql);
      ?>
<div id="wrapper">
<!-- side bar -->
<div id="sidebar-wrapper" style="padding-top:50px;">   
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <!-- Beranda -->
  <div class="pinggir"><br>
      <a href="data_admin.php" style="text-decoration:none; color:white;">DATA ADMIN</a><br><br>
     <a href="berita.php" style="text-decoration:none; color:white;">BERITA</a><br><br>
     <div class="panel panel-default" style="color:black">
     <a href="nasabah.php" style="text-decoration:none; color:black;">NASABAH</a></div><br>
     <a href="saldo.php" style="text-decoration:none; color:white;">SALDO</a><br><br>
     <a href="galery.php" style="text-decoration:none; color:white;">GALERY</a><br><br>
     </div>
</div></div></form>
<div id="page-content-wrapper">
<!-- title -->
<div class="container-fluid">
<div style="margin-top:45px;"></div>         
</div>
<!-- title -->
<div class="container-fluid"> 
<!-- breadcrumb -->
<ol class="breadcrumb">
  <li><a href="nasabah.php">Admin LPDKU</a></li>
  <li class="active">Nasabah</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span> NASABAH</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
<!-- Form -->
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">DAFTAR NASABAH</div>
  <div class="panel-body">
         <table class="tabel" border="1">
       <tr><th>NO</th><th>ID NASABAH</th><th>NAMA</th><th>EMAIL</th><th>NO TELP</th><th>PEKERJAAN</th><th>ALAMAT</th><th>KABUPATEN/KOTA</th><th>JENIS KELAMIN</th><th>TANGGAL LAHIR</th><th>TEMPAT LAHIR</th><th>PASSWORD</th><th>ACTION</th></tr>
       <?php
       include "../proses/cek.php";
      $sql1 = mysqli_query($conn, "SELECT * FROM user_login INNER JOIN nasabah ON user_login.email_user = nasabah.email_nsb");
      $no=1;
      foreach ($sql1 as $row){
        $id = $row['email_nsb'];
        echo "<tr>
            <td>$no</td>
            <td>".$row['id_nsb']."</td>
            <td>".$row['nama_nsb']."</td>
            <td>".$row['email_nsb']."</td>
            <td>".$row['telp_nsb']."</td>
            <td>".$row['pekerjaan_nsb']."</td>
            <td>".$row['alamat_nsb']."</td>
            <td>".$row['kabkot_nsb']."</td>
            <td>".$row['jk_nsb']."</td>
            <td>".$row['tgllahir_nsb']."</td>
            <td>".$row['tmplahir_nsb']."</td>
            <td>".$row['password_user']."</td>
            <td align='center'> <a href='../admin/edit_nsb.php?id=$id'><img src='../images/edit.png' width='30px'>&nbsp&nbsp&nbsp&nbsp<a href='../proses/delete_nsb.php?id=$id'><img src='../images/delete.png' width='30px'></a></td>
              </tr>";
        $no++;
      }
      ?>
    </table>
      </div>
    </div>
  </div>
</div>
  <nav class="navbar navbar-default navbar-fixed-top" id="navbar-color" style="font-size:13px;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <div style="margin-left:20px;"><a href="#menu-toggle" id="menu-toggle"><img src="../images/logo1.png" widht="200" height="50"></a></div>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li ><a href="#" id="navbar-color"><span id="clock"></span> </a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="navbar-color"><img src="../images/3.png" width="20" height="20"> Welcome,<?php echo $email; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../proses/logout.php">Keluar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
</div>
</div>
<!-- Waktu -->
<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
</script>
<script>
$("#menu-togglee").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
</script>
</body>
</html>