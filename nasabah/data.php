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
      <div class="panel panel-default" style="color:black">
     <a href="data.php" style="text-decoration:none; color:black;">DATA</a>
      </div><br>
     <a href="informasisaldo.php" style="text-decoration:none; color:white;">INFORMASI SALDO</a><br><br>
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
  <li><a href="data.php">Nasabah LPDKU</a></li>
  <li class="active">Data Anggota LPDKU</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span> DATA ANGGOTA LPDKU</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
<!-- Form -->
<?php
      include "../proses/cek.php";
      $email=$_SESSION['email_user'];
      $sql = mysqli_query($conn, "SELECT * FROM user_login INNER JOIN nasabah ON user_login.email_user = nasabah.email_nsb INNER JOIN saldo ON nasabah.id_nsb = saldo.id_nsb WHERE nasabah.email_nsb = '$email'");
      $row = mysqli_fetch_assoc($sql);
      $data = mysqli_fetch_array($sql);
      ?>
<form action="../proses/updatedata.php" method="POST" onsubmit="return cek()" enctype="multipart/form-data">
<div style="text-align:right;">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div class="row" style="margin-top:10px;font-size:13px;">
             <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              ID Anggota <font color="red"><b>*</b></font>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
              <input type="text" name="id_user" class="form-control" value="<?php echo $row['id_nsb']; ?>" readonly>
            </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Nama Lengkap <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="text" name="nama_user"class="form-control" value="<?php echo $row['nama_nsb']; ?>">
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Tempat/Tgl Lahir <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <input type="text" name="tmplahir_user"class="form-control" value="<?php echo $row['tmplahir_nsb']; ?>">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <input type="date" name="tgllahir_user" class="form-control" value="<?php echo $row['tgllahir_nsb']; ?>" >
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Jenis Kelamin <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="text-align:left;">
            <?php
          if($row['jk_nsb']=="Laki-laki")
          {
            echo "<input type='radio'  name='kelamin'  value='Laki-laki' checked=''>
            Laki-laki
            <input type='radio' name='kelamin'value='Perempuan' >
            Perempuan"; 
          }else if($row['jk_nsb']=="Perempuan"){ 
          echo "<input type='radio'  name='kelamin'  value='Laki-laki' >
            Laki-laki
            <input type='radio' name='kelamin' value='Perempuan' checked='' >
            Perempuan"; 
          }
          else{
            echo "<input type='radio'  name='kelamin'  value='Laki-laki'>
            Laki-laki
            <input type='radio' name='kelamin' value='Perempuan'>
            Perempuan";  
          }
          ?>

          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Kabupaten/Kota <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
            <select class="form-control" name="kabkot_user" >
            <option hidden><?php echo $row['kabkot_nsb']; ?></option>
            <option>Denpasar</option>
            <option>Buleleng</option>
            <option>Karangasem</option>
            <option>Klungkung</option>
            <option>Gianyar</option>
            <option>Badung</option>
            <option>Bangli</option>
            <option>Tabanan</option>
            <option>Jembrana</option>
          </select>
          </div>
        </div>
        <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            Alamat <font color="red"><b>*</b></font>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <input type="text" name="alamat" class="form-control" style="height:100px;" value="<?php echo $row['alamat_nsb']; ?>">
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
          No. Telp <font color="red"><b>*</b></font>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <input type="text" name="telp_user" class="form-control" value="<?php echo $row['telp_nsb']; ?>">
        </div>
      </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          No. KTP<font color="red"><b>*</b></font>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <input type="text" name="ktp_user" class="form-control" value="<?php echo $row['NoKTP']; ?>">
        </div>
      </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          Pekerjaan <font color="red"><b>*</b></font>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <input type="text" name="pekerjaan_user" class="form-control"value="<?php echo $row['pekerjaan_nsb']; ?>">
        </div>
      </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          Password <font color="red"><b>*</b></font>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <input type="text" name="pass" class="form-control" value="<?php echo $row['password_user']; ?>">
        </div>
      </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          PIN <font color="red"><b>*</b></font>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <input type="text" name="pin_user" class="form-control" value="<?php echo $row['pin_saldo']; ?>">
        </div>
      </div>
       <div class="row" style="margin-top:10px;font-size:13px;">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          Foto KTP <font color="red"><b>*</b></font>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="form-control" style="height:100px; ">
          <img src="<?php echo "../images/foto_ktp/".$row['FotoKTP']; ?>" height="50px" align="left"><br>
          <input type="file" name="ktp" value="<?php echo $row['FotoKTP']; ?>"></div>
        </div>
      </div>
      <div class="row" style="margin-top:10px;font-size:13px;">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-4">
          <input class="btn btn-md btn-success" type="submit" value="Simpan">
        </div>
      </div>
      </div>
    </div>
</div>
</div></form>
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
              <li><a href="../nasabah/data.php">Pengaturan</a></li>
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
<script type="text/javascript">
  function cek()
  {
    if (confirm("Apakah Data Telah Sesuai?")) 
    {
      return true;
    } 
    else 
    {
      alert("Perubahan Dibatalkan !");
      return false;
    }
  }
</script>
</body>
</html>