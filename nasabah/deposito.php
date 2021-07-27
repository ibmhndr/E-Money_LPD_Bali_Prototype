<?php session_start(); 
 if(!isset($_SESSION['email_user']))
  {
    header('location:../index.php');
    exit(); 
  } 
  ?>
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
<body onload="cekstatus()">
<div id="wrapper">
<!-- side bar -->
<div id="sidebar-wrapper" style="padding-top:50px;">  
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <!-- Beranda -->
  <div class="pinggir"><br>
     <a href="data.php" style="text-decoration:none; color:white;">DATA</a><br><br>
     <a href="informasisaldo.php" style="text-decoration:none; color:white;">INFORMASI SALDO</a><br><br>
    <div class="panel panel-default" style="color:black">
      <div class="panel-heading" id="headingOne">
      <a href="deposito.php" style="text-decoration:none; color:black;">DEPOSITO</a>
      </div>
    </div>
     <br><a href="kirimuanglpd.php" style="text-decoration:none; color:white;">KIRIM UANG</a><br>
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
  <li class="active">Deposito</li>
</ol>
<!-- title -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p style="font-size:23px;color:#000000;"><b></span>DEPOSITO UANG</b></p>
    <hr style="border:1px solid #000000;padding:0;margin:0px 0px 20px 0px;">
    </div>
</div>
    <?php
    include "../proses/cek.php";
    $email=$_SESSION['email_user'];
    $sql = mysqli_query($conn, "SELECT * FROM nasabah INNER JOIN saldo ON nasabah.id_nsb=saldo.id_nsb WHERE nasabah.email_nsb='$email'");
    $row = mysqli_fetch_assoc($sql);
    $saldo = $row['total_saldo'];
    $nomsal = $row['nomor_saldo'];
    $sqldeposit = mysqli_query($conn, "SELECT * FROM deposito INNER JOIN jenis_deposito ON deposito.id_jdeposit = jenis_deposito.id_jdeposit WHERE nomor_saldo='$nomsal' ORDER BY id_deposit desc");
    $deposit = mysqli_fetch_assoc($sqldeposit);
    $nilai = ($deposit["jumlah_deposito"] * $deposit["persen_deposito"]/100);
    $tgldeposit = $deposit["waktu_penarikan"];
    $tglnow = date("Y-m-d H:i:s");

    // Update Status Deposito
    if($tgldeposit < $tglnow)
    {
      $updatetgl = "UPDATE deposito SET status_deposito='Inaktif' WHERE id_deposit = (SELECT MAX(id_deposit) FROM deposito WHERE nomor_saldo='$nomsal')"; 
    }
    ?>
<!-- Form  -->
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!-- Jika Tidak Ada Deposito -->
<div class="panel panel-default" id="belumdeposit">
  <div class="panel-heading">Daftar Deposito</div>
    <div class="panel-body">
      <form action="../proses/masukdatadeposito.php" method="POST" onsubmit="return cek()" enctype="multipart/form-data">
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
                Jumlah Deposit <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="jumlah_deposit" id="jumlah" placeholder="Rp.5.000.000-Rp.50.000.000">
              </div>
          </div>
          <div class="row" style="margin-top:10px;font-size:13px;">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              Waktu Deposit <font color="red"><b>*</b></font>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
              <select class="form-control" name="id_jdeposit" id="waktu">
              <option value="1">Deposito Dasar    -- (1 Bulan)</option>
              <option value="2">Deposito Rendah   -- (3 Bulan)</option>
              <option value="3">Deposito Menengah -- (6 Bulan)</option>
              <option value="4">Deposito Tinggi   -- (12 Bulan)</option>
            </select>
            </div>
          </div>
          <div class="row" style="margin-top:10px;font-size:13px;">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              PIN<font color="red"><b>*</b></font>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12 col-xs-12">
              <input type="password" id="pin" class="form-control" >
            </div>
          </div>
          <div class="row" style="margin-top:10px;font-size:13px;">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-lg-offset-9 col-md-offset-2">
              <input class="btn btn-md btn-success collapsed" type="button" value="History Deposito" href="#dafdeposito" data-toggle="collapse" aria-expanded="false">
              <input class="btn btn-md btn-success" type="submit" value="Kirim">
            </div>
          </div>
      </form>
    </div>
  </div>
    <!-- <div class="panel panel-default">
      <div class="panel-heading">Info Deposito</div>
        <div class="panel-body">
          <form action="">
            <div class="row" style="margin-top:10px;font-size:13px;">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Nomor Saldo <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $row['nomor_saldo']; ?>" readonly>
              </div>
            </div>
            <div class="row" style="margin-top:10px;font-size:13px;">
              <  
            </div>
          </form>
        </div>
      </div>-->
      <!-- Akhir Info Deposito -->
    </div>
  </div>
    <!-- Akhir Deposito -->
    <!-- Awal Info Deposito -->
  </div>
</div>
    <div class="panel panel-default" id="sudahdeposit">
    <div class="panel-heading" id="belumdeposit2">Data Deposito</div>
    <div class="panel-body" id="belumdeposit3">
      <form enctype="multipart/form-data">
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                ID Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['id_deposit']; ?>" readonly>
              </div>
          </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Nomor Saldo <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['nomor_saldo']; ?>" readonly>
              </div>
           </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Jumlah Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['jumlah_deposito']; ?>" readonly>
              </div>
           </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Nilai Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $nilai ?>" readonly>
              </div>
           </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Jenis Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['nama_deposito']; ?>" readonly>
              </div>
           </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Waktu Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['waktu_deposito']; ?>" readonly>
              </div>
           </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Waktu Akhir Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['waktu_penarikan']; ?>" readonly>
              </div>
           </div>
           <div class="row" style="margin-top:10px;font-size:13px;">
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                Status Deposito <font color="red"><b>*</b></font>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <input type="text" class="form-control" name="nomor_saldo" value="<?php echo $deposit['status_deposito']; ?>" readonly>
                <br>
                <input class="btn btn-md btn-success collapsed" type="button" value="History Deposito" href="#dafdeposito" data-toggle="collapse" aria-expanded="false">
              </div>
           </div>
      </form>
    </div>
</div>

    <!-- History Deposito -->
    <!-- Panel 2 -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 offset-lg-1">
    <div class="panel panel-default" id="dafdeposito" style="display: none">
    <div class="panel-heading">History Deposito</div>
      <div class="panel-body">
       <table class="table" border="1">
          <thead class="thead-dark">
            <tr>
              <th scope="col">NO</th>
              <th scope="col">ID DEPOSITO</th>
              <th scope="col">NOMOR SALDO</th>
              <th scope="col">JUMLAH DEPOSITO</th>
              <th scope="col">NILAI DEPOSITO</th>
              <th scope="col">JENIS DEPOSITO</th>
              <th scope="col">WAKTU DEPOSITO</th>
              <th scope="col">WAKTU AKHIR DEPOSITO</th>
              <th scope="col">STATUS DEPOSITO</th>
            </tr>
            </thead>
            <tbody>
                  <?php
                  include "../proses/cek.php";
                  $email=$_SESSION['email_user'];
                  $sql = mysqli_query($conn, "SELECT * FROM nasabah INNER JOIN saldo ON nasabah.id_nsb=saldo.id_nsb WHERE nasabah.email_nsb='$email'");
                  $row = mysqli_fetch_assoc($sql);
                  $saldo = $row['total_saldo'];
                  $nomsal = $row['nomor_saldo'];
                  $sqldeposit = mysqli_query($conn, "SELECT * FROM deposito INNER JOIN jenis_deposito ON deposito.id_jdeposit = jenis_deposito.id_jdeposit WHERE nomor_saldo='$nomsal' ORDER BY id_deposit desc");
                  $deposit = mysqli_fetch_assoc($sqldeposit);
                  $nilai = ($deposit["jumlah_deposito"] * $deposit["persen_deposito"]/100);
                  $tgldeposit = $deposit["waktu_penarikan"];
                  $tglnow = date("Y-m-d H:i:s");
                  $no=1;
                  foreach($sqldeposit as $deposit)
                  {
                    $nilai = ($deposit["jumlah_deposito"] * $deposit["persen_deposito"]/100);
                    echo"<tr>
                    <td>$no</td>
                    <td>".$deposit["id_deposit"]."</td>
                    <td>".$deposit["nomor_saldo"]."</td>
                    <td>".$deposit["jumlah_deposito"]."</td>
                    <td>$nilai</td>                    
                    <td>".$deposit["nama_deposito"]."</td>
                    <td>".$deposit["waktu_deposito"]."</td>
                    <td>".$deposit["waktu_penarikan"]."</td>
                    <td>".$deposit["status_deposito"]."</td>
                    </tr>";
                    $no++;
                  }
                  ?>
            </tbody>
       </table>
      </div>
    </div>
  </div>
    <!-- Akhir Panel 2 -->
  <!-- Akhir History Deposito -->

<!-- container fluid -->
</div>
<!--test-->
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
<script type="text/javascript">
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
    if(jumlah >= 5000000)
    {
      if(saldo >= jumlah)
      {
        if(pin == input)
        {
            if (confirm("Apakah Data Telah Sesuai?")) 
            {
              return true;
            } 
            else 
            {
              alert("Deposito Dibatalkan !");
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
          alert("Saldo Tidak Mencukupi Untuk Melakukan Deposito !");
          return false;
      }
  }
  else
  {
    alert("Jumlah Deposito Kurang Dari Rp.5.000.000 !");
    return false;
  }
 }

  function cekstatus()
  {
     var cek = document.getElementById("belumdeposit");
     var cek2 = document.getElementById("sudahdeposit");
     <?php
      include "../proses/cek.php";
      $email=$_SESSION['email_user'];
      $sql = mysqli_query($conn, "SELECT * FROM saldo INNER JOIN nasabah ON saldo.id_nsb=nasabah.id_nsb WHERE nasabah.email_nsb='$email'");
      $row = mysqli_fetch_assoc($sql);
      $saldo = $row['nomor_saldo'];
      $cek = mysqli_query($conn, "SELECT status_deposito FROM deposito WHERE id_deposit = (SELECT MAX(id_deposit) FROM deposito WHERE nomor_saldo='$saldo')");
      $isi = mysqli_fetch_assoc($cek);
      $nilai = $isi['status_deposito'];
      ?>
      var status = "<?php echo $nilai; ?>";
      if(status == 'Aktif')
      {
        cek.style.display = "none";
        cek2.style.display = "block";
      }
      else
      {
        cek.style.display = "block";
        cek2.style.display = "none";
      }
  }
</script>
</script>
</body>
</html>