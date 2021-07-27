<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>LPDKU</title>

<link href="css/bootstrap1.min.css" rel="stylesheet">
<link href="css/simplesidebar.css" rel="stylesheet">
<link href="css/stylee.css" rel="stylesheet">
<link href="css/tabell.css" rel="stylesheet">
</head>
<body>
  <?php
      include "proses/cek.php";
      $id = $_GET['id'];
      $sql = mysqli_query($conn, "SELECT * FROM berita INNER JOIN foto ON berita.id_foto=foto.id_foto WHERE id_berita=$id");
      $row = mysqli_fetch_assoc($sql);
      ?>
<div id="wrapper.toggled">
  <div id="page-content-wrapper">
<div class="container-fluid">
<div style="margin-top:45px;"></div>         
</div>
<div class="container-fluid"> 
<ol class="breadcrumb">
  <li><a href="index.php">LPDKU</a></li>
  <li class="active">Berita</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:50px;color:#000000;padding-bottom: 1;"><b></span> <?php echo $row['judul_berita'];?></b></p>
    <p style="font-size:20px;color:#000000;margin-top: 1;"></span>Tanggal Posting <?php echo $row['tgl_berita'];?></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    <a href="index.php">
      <img src="<?php echo "images/foto/".$row['foto']; ?>" style="margin-top:10px;padding-right:50px" width="500px" align="left">
    </a>
    <div style="width:1630px;box-sizing: border-box;font-size:30px;color:#000000;word-wrap: break-word;text-align:justify;">
      <?php echo $row['isi_berita'];?>
    </div>
    </div>
</div>
<!-- Form -->
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
        <div style="margin-left:20px;"><a href="" id=""><img src="images/logo1.png" widht="200" height="50"></a></div>
      </div>
    </div>
  </nav>
</div>
</div>
</div>
<!-- Waktu -->
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>