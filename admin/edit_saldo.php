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
      $id = $_GET['id'];
      $sql = mysqli_query($conn, "SELECT * FROM saldo WHERE id_nsb = '$id'");
      $row = mysqli_fetch_assoc($sql);
      $data = mysqli_fetch_array($sql);
      ?>
<div id="wrapper">
<!-- side bar -->
<div id="sidebar-wrapper" style="padding-top:50px;">   
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <!-- Beranda -->
  <div class="pinggir"><br>
    <a href="data_admin.php" style="text-decoration:none; color:white;">DATA ADMIN</a><br><br>
     <a href="berita.php" style="text-decoration:none; color:white;">BERITA</a><br><br>
     <a href="nasabah.php" style="text-decoration:none; color:white;">NASABAH</a><br><br>
     <div class="panel panel-default" style="color:black">
     <a href="saldo.php" style="text-decoration:none; color:black;">SALDO</a></div><br>
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
  <li><a href="saldo.php">Admin LPDKU</a></li>
  <li class="active">Saldo</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span> SALDO</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
<!-- Form -->
    <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">EDIT SALDO</div>
  <form action="../proses/update_saldo.php" method="POST" enctype="multipart/form-data">
  <div class="panel-body">
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Nomor Saldo<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="nomor" value="<?php echo $row['nomor_saldo']; ?>" class="form-control" required >
          </div>
        </div>
         <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            No KTP<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input name="noktp" class="form-control" required value="<?php echo $row['NoKTP']; ?>">
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Gambar Berita <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <div class="form-control" style="height:60px; ">
              <img src="<?php echo "../images/foto_ktp/".$row['FotoKTP']; ?>" style="margin-top:10px;" height="30px" align="left" >&nbsp
              <?php echo $row['FotoKTP']; ?>&nbsp
            <input type="file"  name="foto" align="center" style="padding-left:5px;">
          </div>
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Foto KTP<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input name="foto" class="form-control" required value="<?php echo $row['FotoKTP']; ?>">
          </div>
        </div>
       <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            PIN Saldo <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input type="text"  name="pin" value="<?php echo $row['pin_saldo']; ?>"class="form-control" required>
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Total Saldo<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input type="text" name="total" value="<?php echo $row['total_saldo']; ?>"class="form-control" required >
          </div>
        </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-11 col-md-offset-11">
          <input class="btn btn-md btn-success" type="submit" value="Kirim">
        </div>
      </div>
      </div>
      </div>
      </div>
    </div>
</div></form>
</div>
<!-- container fluid -->
</div>
<!-- test -->
<!-- end wrapper -->
</div>
<!-- end wrapper -->
<!--start navigasi-->
<!-- start navigasi -->
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