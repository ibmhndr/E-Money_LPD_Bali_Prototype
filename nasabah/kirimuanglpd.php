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
     <a href="informasisaldo.php" style="text-decoration:none; color:white;">INFORMASI SALDO</a><br><br>
     <a href="deposito.php" style="text-decoration:none; color:white;">DEPOSITO</a><br><br>
     <div class="panel panel-default" style="color:black">
     <div class="panel-heading" id="headingOne">
     <a href="kirimuanglpd.php" style="text-decoration:none; color:black;">KIRIM UANG</a></div>
     </div>
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
  <li><a href="kirimuang.php">Nasabah LPDKU</a></li>
  <li class="active">Kirim Uang</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span> KIRIM UANG</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
<?php
      include "../proses/cek.php";
      $email=$_SESSION['email_user'];
      $sql = mysqli_query($conn, "SELECT * FROM nasabah INNER JOIN saldo ON nasabah.id_nsb=saldo.id_nsb WHERE nasabah.email_nsb='$email'");
      $row = mysqli_fetch_assoc($sql);
      $saldo = $row['total_saldo'];
      ?>
<!-- Form  -->
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <!-- Panel LPD -->
  <div class="panel panel-default">
  <div class="panel-heading" id="rekening">Antar Rekening LPD</div>
  <div class="panel-body">
    <form action="../proses/kirimuang.php" method="POST" onsubmit="return cek()" enctype="multipart/form-data">
         <div class="row" style="margin-top:10px;font-size:13px;">
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              Nomor Saldo <font color="red"><b>*</b></font>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
              <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $row['nomor_saldo']; ?>" readonly>
            </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Nomor Saldo Penerima<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="text" name="id_penerima" class="form-control" >
          </div>
        </div>
        
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Jumlah Uang <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="text" name="jumlah_pembayaran" id="jumlah" class="form-control" >
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            PIN<font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="password" id="pin" class="form-control" >
          </div>
        </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-11 col-md-offset-10">
          <input class="btn btn-md btn-success" type="submit" value="Kirim">
        </div>
      </div>
    </form>
  </div>
  </div>
  </div>
</div>

<!-- Tabel Dropdown -->

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

// Cek
function cek(){
   var input = document.getElementById("pin").value;
   var jumlah = document.getElementById("jumlah").value;
   <?php
      include "../proses/cek.php";
      $email=$_SESSION['email_user'];
      $sql = mysqli_query($conn, "SELECT saldo.total_saldo, saldo.pin_saldo FROM saldo INNER JOIN nasabah ON nasabah.id_nsb=saldo.id_nsb WHERE nasabah.email_nsb='$email'");
      $row = mysqli_fetch_assoc($sql);
      $saldo = $row['total_saldo'];
      $pin= $row['pin_saldo'];
      ?>
    var saldo = <?php echo $saldo; ?>;
    var pin = <?php echo $pin; ?>;
    if(saldo >= jumlah)
    {
      if(pin == input)
      {
        if (confirm("Apakah Data Telah Sesuai?")) 
        {
          return true;
        } 
        else {
          alert("Transaksi Dibatalkan !");
          return false;
        }
      }
      else
      {
        alert("PIN Tidak Sesuai !");
        return false;
      }
    }
    else
    {
        alert("Saldo Tidak Mencukupi Untuk Melakukan Pengiriman !");
        return false;
    }
 }

</script>
</body>
</html>