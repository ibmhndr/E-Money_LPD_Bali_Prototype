<?php session_start(); 
 if(!isset($_SESSION['email_user']))
  {
    header('location:../index.php');
    exit(); 
  }?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>NASABAH</title>
<link href="../css/bootstrap1.min.css" rel="stylesheet">
<link href="../css/simplesidebar.css" rel="stylesheet">
<link href="../css/stylee.css" rel="stylesheet">
</head>

<body>
<div id="wrapper">
<!-- side bar -->
<div id="sidebar-wrapper" style="padding-top:50px;">   
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <!-- Beranda -->
  <div class="pinggir"><br>
     <a href="data.php" style="text-decoration:none; color:white;">DATA</a><br><br>
      <div class="panel panel-default" style="color:black">
     <a href="informasisaldo.php" style="text-decoration:none; color:black;">INFORMASI SALDO</a></div><br>
          <a href="deposito.php" style="text-decoration:none; color:white;">DEPOSITO</a><br><br>
     <a href="kirimuanglpd.php" style="text-decoration:none; color:white;">KIRIM UANG</a><br>
     <div>
        <br><a style="text-decoration:none; color:white;" class="collapsed" data-toggle="collapse" href="#collapseTwo">PEMBAYARAN<br></a>
          <div id="collapseTwo" class="pinggir collapse">
            <div class="panel-body">
              <a  style="text-decoration:none; color:white;"href="pembayaranpulsa.php" role="button">PULSA</a><br><br>
              <a  style="text-decoration:none; color:white;"href="pembayaranlistrik.php">LISTRIK</a>
            </div>
          </div>
     </div>
  </div>
  </div>
</div>
<!-- content -->
</form>
<div id="page-content-wrapper">
<!-- title -->
<div class="container-fluid">
<div style="margin-top:45px;"></div>         
</div>
<!-- title -->
<div class="container-fluid"> 
<!-- breadcrumb -->
<ol class="breadcrumb">
  <li><a href="informasisaldo.php">Nasabah LPDKU</a></li>
  <li class="active">Informasi Saldo</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span> INFORMASI SALDO</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
<!-- Form -->
    <?php
    include "../proses/cek.php";
    $email=$_SESSION['email_user'];
    $sql = mysqli_query($conn, "SELECT * FROM nasabah INNER JOIN saldo ON nasabah.id_nsb=saldo.id_nsb WHERE nasabah.email_nsb='$email'");
    $row = mysqli_fetch_assoc($sql);
    $saldo = $row['total_saldo'];
    ?>
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-default">
  <!-- Default panel contents -->
  <!-- Panel 1 -->
  <div class="panel-heading">Rekening Tabungan</div>
  <div class="panel-body">
         <div class="row" style="margin-top:10px;font-size:13px;">
             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
              ID Anggota <font color="red"><b>*</b></font>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
              <input type="text" class="form-control" value="<?php echo $row['id_nsb']; ?>"readonly>
            </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Nomor Saldo <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input type="text" class="form-control" value="<?php echo $row['nomor_saldo']; ?>"readonly>
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Nama Rekening <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input type="text" class="form-control" value="<?php echo $row['nama_nsb']; ?>"readonly>
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            Jumlah Saldo <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
            <input type="text" class="form-control" value="<?php echo $row['total_saldo']; ?>"readonly>
          </div>
        </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
          <input class="btn btn-md btn-success collapsed" type="submit" value="Daftar Transaksi" href="#daftransaksi" data-toggle="collapse" aria-expanded="false">
        </div>
      </div>
    </div>
    <!-- Akhir Panel 1 -->
  </div>
    <!-- Panel 2 -->
    <div class="panel panel-default" id="daftransaksi" style="display: none;">
    <div class="panel-heading">Daftar Transaksi</div>
      <div class="panel-body">
       <table class="table" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">JENIS PEMBAYARAN </th>
              <th scope="col">WAKTU PEMBAYARAN</th>
              <th scope="col">JUMLAH PEMBAYARAN</th>
              <th scope="col">DISKON PEMBAYARAN</th>
              <th scope="col">TOTAL BAYAR</th>
            </tr>
            </thead>
            <tbody>
                  <?php
                  include "../proses/cek.php";
                  $email=$_SESSION['email_user']; 
                  $sql1 = mysqli_query($conn, "SELECT nomor_saldo FROM saldo INNER JOIN nasabah ON saldo.id_nsb=nasabah.id_nsb WHERE email_nsb='$email';");
                  $rst = mysqli_fetch_assoc($sql1);
                  $nomor= $rst['nomor_saldo'];
                  $sql = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN jenis_pembayaran ON pembayaran.id_jenis=jenis_pembayaran.id_jenis WHERE pembayaran.nomor_saldo='$nomor'");
                  $no=1;
                  $row = mysqli_fetch_assoc($sql);
                  foreach($sql as $row)
                  {
                    $total = $row["jumlah_pembayaran"] - $row["diskon_pembayaran"];
                  echo"<tr>
                      <td>$no</td>
                      <td>".$row["keterangan"]."</td>
                      <td>".$row["waktu_pembayaran"]."</td>
                      <td>".$row["jumlah_pembayaran"]."</td>
                      <td>".$row["diskon_pembayaran"]."</td>
                      <td>$total</td>
                      </tr>";
                  $no++;
                  }
                  ?>
            </tbody>
       </table>
      </div>
    </div>
    <!-- Akhir Panel 2 -->
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
              <li><a href="data.php">Pengaturan</a></li>
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