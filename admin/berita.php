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
    <div class="panel panel-default" style="color:black">
     <a href="berita.php" style="text-decoration:none; color:black;">BERITA</a></div><br>
     <a href="nasabah.php" style="text-decoration:none; color:white;">NASABAH</a><br><br>
     <a href="saldo.php" style="text-decoration:none; color:white;">SALDO</a><br><br>
     <a href="galery.php" style="text-decoration:none; color:white;">GALERY</a><br><br> 
</div></div></div></form>
<div id="page-content-wrapper">
<!-- title -->
<div class="container-fluid">
<div style="margin-top:45px;"></div>         
</div>
<!-- title -->
<div class="container-fluid"> 
<!-- breadcrumb -->
<ol class="breadcrumb">
  <li>Admin LPDKU</li>
  <li class="active">Berita</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span> BERITA</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
<!-- Form -->
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">TAMBAH BERITA</div>
  <form action="../proses/masukdataberita.php" method="POST" enctype="multipart/form-data">
  <div class="panel-body">
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Judul Berita<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="text" name="judul" class="form-control" required >
          </div>
        </div>
        
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Gambar Berita <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="file"  name="gambar" class="form-control" required>
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Isi Berita<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <textarea type="text" name="isi" class="form-control" style="height:200px;" required></textarea>
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
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">DATA BERITA</div>
  <div class="panel-body">
         <table class="tabel" border="1">
       <tr><th>NO</th><th>ID BERITA</th><th>ISI BERITA </th><th>JUDUL BERITA</th><th>TANGGAL BERITA</th><th>FOTO BERITA</th><th>ACTION</th></tr>
       <?php
       include "../proses/cek.php";
      $sql1 = mysqli_query($conn, "SELECT * FROM berita INNER JOIN foto ON berita.id_foto = foto.id_foto");
      $no=1;
      foreach ($sql1 as $row){
        $id_berita = $row['id_berita'];
        echo "<tr>";
          echo  "<td>$no</td>";
          echo  "<td>".$row['id_berita']."</td>";
          echo  "<td style='text-align:left;'>".$row['isi_berita']."</td>";
          echo  "<td>".$row['judul_berita']."</td>";
          echo  "<td>".$row['tgl_berita']."</td>";
          echo  "<td><img src='../images/foto/".$row['foto']."' width='50' style='float:left;'>".$row['foto']."</td>";
          echo  "<td align='center'> <a href='../admin/edit_berita.php?id=$id_berita'><img src='../images/edit.png' width='30px' >&nbsp&nbsp&nbsp&nbsp<a href='../proses/delete_berita.php?id=$id_berita'><img src='../images/delete.png' width='30px'></a></td>";
              "</tr>";
        $no++;
      }
      ?>
    </table>
      </div>
      </div>
    </form>
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