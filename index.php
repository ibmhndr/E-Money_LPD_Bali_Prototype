<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LPDKU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/styl.css">
  </head>
  <body onload="checkberita()">
  	<nav id="navbar" class="navbar">
		  <ul class="nav-menu">
		    <li>
		      <a data-scroll="home" href="#home" class="dot active">
		        <span>Home</span>
		      </a>
		    </li>
		    <li>
		      <a data-scroll="news" href="#news" class="dot">
		        <span>News</span>
		      </a>
		    </li>
		    <li>
		      <a data-scroll="galery" href="#galery" class="dot">
		        <span>Galery</span>
		      </a>
		    </li>
		    <li>
		      <a data-scroll="about" href="#about" class="dot">
		        <span>About</span>
		      </a>
		    </li>
		    <li>
		      <a data-scroll="join" href="#join" class="dot">
		        <span>login</span>
		      </a>
		    </li>
		  </ul>
		</nav>
		<!-- End Nav Section -->

		<!-- Start Home Section -->
		<section id="home" class="hero-wrap js-fullheight" style="background-image: url(images/bg-1.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-lg-7 ftco-animate d-flex align-items-center">
          	<div class="text text-center">
          		<span> 
          			<img src="images/LOGO.png" width="350" height="350"></span>
		  			<h1 class="mb-4">We Make New <br>Experience of LPD</h1>
		  			<p class="mb-4">Lembaga Perkreditan Desa Berbasis Website dengan dilengkapi fasilitas "digital Money"</p>
		  			<p class="mt-5"><a href="#join" class="btn-custom">Login <span class="ion-ios-arrow-round-forward"></p></a>
		  		</span>
            </div>
          </div>
        </div>
      </div>
    </section>
		<!-- End Home Section -->
    
		<!-- Start news Section -->
		<section id="news" class="ftco-section">
		  <div class="container">
		  	<div class="row">
		  		<div class="col-md-9">
		  			<div class="row">
				  		<div class="col-md-5 heading-section ftco-animate pb-5">
		            <h2 class="mb-4">Berita</h2>
		            <p>Menampilkan berita-berita terkini seputar LPD.</p>
		          </div>
				  	</div>				  	
		  			<div class="row" id="berita">
		  			 <?php
				      include "proses/cek.php";
      				  $sql = mysqli_query($conn, "SELECT * FROM berita INNER JOIN foto ON berita.id_foto=foto.id_foto");
      				  $row = mysqli_fetch_assoc($sql);
    				  $num_char=200;
    				  $no = 0;
				      foreach ($sql as $row) 
				      {
				      	$tu = $row['isi_berita'];
	    				$isi=substr($tu,0,$num_char).'...';
				      	$id = $row['id_berita'];
					    $foto = $row['foto'];
					    $judul = $row['judul_berita'];
					    $no++;
					    if($no<=3)
					    {
			        	?>
						<!-- Berita -->
			        	<div class="col-md-4" id="isiberita">
			        		<a  href="berita.php?id=<?php echo $id;?>">
			        		<div class="media block-6 services d-block ftco-animate">
				              <div class="icon"><span><img src="images/foto/<?php echo $foto; ?>" widht="150" height="90" align="center"></span></div><br>
				              	<div class="media-body">
			                  	 <h3 class="heading mb-3"><?php echo $judul; ?></h3>
			                  	 <p><?php echo $isi ;?></p>
			                    </div>
			              	 </div></a>
			            </div>
			        	<!-- Akhir berita  -->
			        	<?php
				        }
				      }
				      ?>
	        		</div>
	        		 <div class="col-md-5 offset-9" id="ceknext">
	        		 	<?php $awal=0; ?>
						  <ul class="pagination">
						    <li class="page-item" id="pre"><a class="page-link" href="javascript:prevPage()">Previous</a></li>
						    <li class="page-item" id="next"><a class="page-link" href="javascript:nextPage()">Next</a></li>
						    <span id="page"></span>
						  </ul>
					 </div> 
	       		   </div>
	        <div class="col-md-31 d-flex align-items-stretch">
	        	<div class="img w-100" style="background-image: url(images/about.jpg);"></div>
	        </div>
        </div>
		  </div>
		</section>  
		<!-- End news Section -->

		<!-- Start galery Section -->
		<section id="galery" class="ftco-section">
		  <div class="container">
		  	<div class="row justify-content-center">
		  		<div class="col-md-4 heading-section text-center ftco-animate pb-5">
            <h2 class="mb-4">GALERY</h2>
            <p>Menampilkan foto - foto galeri seputar LPD</p>
          </div>
		  	</div>
		  </div> 
		  <div class="container-fluid px-md-0">
        <div class="row no-gutters">
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-1.jpg);">
            	<a href="images/model-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 1</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-2.jpg);">
            	<a href="images/model-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 2</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-3.jpg);">
            	<a href="images/model-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 3</a></h2>
	              </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-4.jpg);">
            	<a href="images/model-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 4</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-5.jpg);">
            	<a href="images/model-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 5</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-6.jpg);">
            	<a href="images/model-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 6</a></h2>
	              </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-7.jpg);">
            	<a href="images/model-7.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 7</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-8.jpg);">
            	<a href="images/model-8.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 8</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-9.jpg);">
            	<a href="images/model-9.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 9</a></h2>
	              </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-10.jpg);">
            	<a href="images/model-10.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 10</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-11.jpg);">
            	<a href="images/model-11.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 11</a></h2>
	              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="model img d-flex align-items-end" style="background-image: url(images/model-12.jpg);">
            	<a href="images/model-12.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            	<div class="desc w-100 px-4">
	              <div class="text w-100 mb-3">
	              	<span>Galery</span>
	              	<h2><a href="work-single.html">Foto 12</a></h2>
	              </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
		</section>
		<!-- End galery Section -->
		<!-- Start About Section -->
		<section class="ftco-about img ftco-section" id="about">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
    					<div class="overlay"></div>
	    				<div class="img img-video d-flex align-self-stretch align-items-center" style="background-image:url(images/about-2.jpg);">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 pl-md-5">
	          <div class="heading-section ftco-animate">
	            <h2 class="mb-4">ABOUT LPDKU</h2>
	            <p>LPDKU adalah sebuah platform baru untuk memperkenalkan LPD (Lembaga Perkreditan desa) kepada penduduk. LPDKU hadir dalam bentuk website yang menampilakan informasi seputar LPD, Selain itu di dalam LPDKU juga tersedia layanan "Digital Money" bagi user yang telah terdaftar di LPD ataupun mendaftar melalui website ini</p>
	            <div class="counter-wrap ftco-animate d-flex my-md-4">
	              <div class="text">
	              	<p class="mb-4">
	              		<?php 
	              		include "proses/cek.php";
	              		$sql = mysqli_query($conn,"SELECT COUNT(id_nsb) AS id_nsb FROM nasabah");
	              		$row = mysqli_fetch_assoc($sql); ?>
		                <span class="number" data-number="<?php echo $row['id_nsb']; ?>">0</span>
		                <span>User Terdaftar</span>
	                </p>
	              </div>
		          </div>
		          <div class="d-flex w-100">
		            <div class="img img-about-2 mr-2" style="background-image: url(images/about-4.jpg);"></div>
		            <div class="img img-about-2 ml-2" style="background-image: url(images/about-3.jpg);"></div>
		          </div>
		          <blockquote class="blockquote mt-5">
		          	<p class="mb-2">"Buat apa penuhi DOMPETMU, selagi teknologi bisa menyimpan UANGMU"</p>
		          	<span>&mdash; Admin LPDKU</span>
		          </blockquote>
	          </div>
	        </div>
        </div>
    	</div></section>


		<!-- End About Section -->
		<!-- Start join Section -->
        <section class="ftco-section contact-section" id="join">
        <div class="container">
        	<h2 class="mb-4" align="center">Login</h2>
            <p align="center">Silahkan login dengan user LPDKU anda</p><br>
        <div class="row block-9">
          <div class="col-md-6 ftco-animate">
             <div class="row mb-5">
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Address</h3>
		            <p>Jl. Bukit Jimbaran no 10</p>
		          </div>
	          </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Contact Number</h3>
		            <p><a href="tel://089686380483">089686380483</a></p>
	            </div>
	          </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Email Address</h3>
		            <p><a href="mailto:info@yoursite.com">lpdku@gmail.com</a></p>
		          </div>
	          </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
          	<div class="align-self-stretch box text-center p-4">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<div>
	          		<h3 class="mb-4">Website</h3>
		            <p><a href="#">lpdku.com</a></p>
	            </div>
	          </div>
          </div>
        </div>
          </div>

           <div class="col-md-6 ftco-animate">
          <form action="proses/login.php" class="contact-form p-4 p-md-5 py-md-5" method="post">
            	<h2 class="mb-6" align="center">Login User</h2>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Masukan Email">
              </div>
              <div class="form-group">
                <input type="password" name="pass" class="form-control" placeholder="Masukan Password">
              </div>
              <div class="form-group">
                <input type="submit" value="SUBMIT" class="btn btn-primary py-3 px-5"><a class="nav-link" data-toggle="modal" data-target="#daftar" style="cursor: pointer; color: white;">Daftar Baru?</a>
              </div>
            </form>
          </div>
        </div>
    </div>
    </div>
    </section>
		<!-- End join Section -->


		<!-- Start Footer Section -->
		<footer class="ftco-footer py-5">
		  <div class="container text-center">
		    <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> LPDKU </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

					  <ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
		  </div>
		</footer>
		<!-- End Footer Section -->
   

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>

  <form name="daftar" onsubmit="return checkform()" method="post" action="proses/masukdatanasabah.php">
    <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Pendaftaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
   	    	  <div class="form-group">
		        <label>Email</label>
				<input type="text" name="email" class="form-control1" placeholder="Masukan e-mail" required>
		      </div>
		      <div class="form-group">
				<label for="">Nama Lengkap</label>
				<input type="text" name="nama" class="form-control1" placeholder="Masukan Nama Lengkap" required>
		      </div>
		      <div class="form-group">
				 <label for="">No Telp</label>
				 <input type="text" name="telp" class="form-control1" placeholder="Masukan Nomor Telepon" required>
			  </div>
			  <div class="form-group">
				 <label for="">Password</label>
				 <input type="password" name="pass" id="cekpas1" class="form-control1" placeholder="Masukan Password" required>
			  </div>
			  <div class="form-group">
				 <label for="">Confirm Password</label>
				 <input type="password" name="pass1" id="cekpas2" class="form-control1" placeholder="Masukan Kembali Password" required>
			  </div>
			  <div class="checkbox">
			  <label>
				 <input type="checkbox" required> I accept the Terms of Use & Privacy Policy.
				 <span class="checkmark"></span>
			  </label>
			  <div id="error"></div>
			  </div>
          </div>
          <div class="modal-footer">
            <button type="Reset" class="btn btn-danger text-white">Reset</button>
            <button type="submit" class="btn btn-success text-white">Daftar</button>
          </div>
        </div>
      </div>
    </div>
    </form>

    <script type="text/javascript">
    	function checkform()
    	{
    		var pas1 = document.getElementById("cekpas1").value;
    		var pas2 = document.getElementById("cekpas2").value;
    		if(pas1.length < '6')
    		{
    			alert("Password Input Minimal Berjumlah 6 !");
    			return false;
    		}
    		
    		else{
    		 if(pas1==pas2)
    		 {
    		 	return true;
    		 }
    		 else{
    		 	alert("Password Input Tidak Sama !");
    		 	return false;
    		 }
    		}
    	}

    	function checkberita()
    	{
    	  <?php
		  include "proses/cek.php";
      	  $sql = mysqli_query($conn, "SELECT COUNT(id_berita) AS id_berita FROM berita");
      	  $row = mysqli_fetch_assoc($sql);
      	  $id = $row['id_berita'];
      	  ?>
      	  var cek = "<?php echo $id; ?>";
    	  var show = document.getElementById("ceknext");
    		if(cek <= 3)
    		{
	        	show.style.display = "none";
    		}
    		else
    		{
    		    show.style.display = "block";
    		}    		
    	}

    	function prevPage(nilai)
    	{
    		var isi = nilai;
    		<?php
			include "proses/cek.php";
      		$sql = mysqli_query($conn, "SELECT * FROM berita INNER JOIN foto ON berita.id_foto=foto.id_foto LIMIT isi,3");
      		$row = mysqli_fetch_assoc($sql);
    		$num_char=200;
    		$no = 0;
			foreach ($sql as $row) 
			{
			  $tu = $row['isi_berita'];
	    	  $isi = substr($tu,0,$num_char).'...';
			  $id = $row['id_berita'];
			  $foto = $row['foto'];
			  $judul = $row['judul_berita'];
			  $no++;
			  if($no<=3)
			  {
			?>
		   var isi = document.getElementById("isiberita").innerHTML;
  		   document.getElementById("berita").innerHTML = x;
			<?php
			  }
			}
			?>	
    	}

    	function nextPage(nilai)
    	{
    		
    	}
    </script>
</html>