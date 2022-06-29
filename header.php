<?php 
// memulai sesi eksekusi
session_start();
// menghubungkan file koneksi.php ke dalam file
include 'koneksi/koneksi.php';
// memeriksa apakah variabel kd_cs sudah diatur atau belum
if(isset($_SESSION['kd_cs'])){
	$kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- memmbuat nama pada halaman website -->
    <title>Finder Bouquet</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- menambahkan informasi -->
    <div class="container-fluid">
        <div class="row top">
            <center>
                <div class="col-md-4" style="padding: 3px;">
                    <span> <i class="glyphicon glyphicon-earphone"></i>(+62)85732377015</span>
                </div>


                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-envelope"></i>finderbouquet@gmail.com</span>
                </div>


                <div class="col-md-4" style="padding: 3px;">
                    <span>Halaman Customer</span>
                </div>
            </center>
        </div>
    </div>

    <!-- Membuat taab menu yang dapat diklik oleh penggunan -->
    <nav class="navbar navbar-default" style="padding: 5px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: #ff8680"><b>FINDER BOUQUET</b></a>
            </div>

            <!-- mengarahkan masing-masing button sesuai dengan file yang dituju -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="produk.php">Produk</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                    <li><a href="manual.php">Bantuan</a></li>
                    <?php 
					// memeriksa apakah variabel kd_cs sudah ada atau belum
					if(isset($_SESSION['kd_cs'])){
					$kode_cs = $_SESSION['kd_cs'];
					$cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
					$value = mysqli_num_rows($cek);
					?>
                    <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i> <b>[
                                <?= $value ?>]</b></a></li>
                    <?php 
					}else{
						echo "
						<li><a href='keranjang.php'><i class='glyphicon glyphicon-shopping-cart'></i> [0]</a></li>

						";
					}
					// memeriksa apakah variabel user sudah ada atau belum
					if(!isset($_SESSION['user'])){
					?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!-- mengarahkan masing-masing button sesuai dengan file yang dituju -->
                            <li><a href="user_login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>
                        </ul>
                    </li>
                    <?php 
					}else{
						?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?>
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!-- mengarahkan masing-masing button sesuai dengan file yang dituju -->
                            <li><a href="proses/logout.php">Log Out</a></li>
                        </ul>
                    </li>

                    <?php 
						}
					?>
                </ul>
            </div>
        </div>
    </nav>