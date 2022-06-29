<?php 
//untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
session_start(); 
//menyertakan file koneksi.php di dalam file ini
include '../koneksi/koneksi.php'; 
// memeriksa apakah variabel admin sudah ada atau tidak, jika sudah ada maka lokasi header adalah index.php
if(!isset($_SESSION['admin'])){
	header('location:index.php');
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--memberikan judul pada halaman akses-->
    <title>(adm)Finder Bouquet</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default" style="padding: 5px;">
        <!--Membuat menu-menu header yang akan digunakan dalam website admin-->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-folder-close"></i> Data Master <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="m_produk.php">Master Produk</a></li>
                            <li><a href="m_customer.php">Master Customer</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-retweet"></i> Data Transaksi <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="produksi.php">Pesanan Masuk</a></li>
                            <li><a href="inventory.php">Inventory</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-stats"></i> Laporan <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="laporan_penjualan.php">Laporan Penjualan</a></li>
                            <li><a href="grafik_penjualan.php">Diagram Penjualan</a></li>
                        </ul>
                    </li>
                    <li><a href="halaman_utama.php">Dashboard</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-cog"></i> Pemeliharaan <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="../DATABASE/retrieve.php">Retrieve Database</a></li>
                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Admin <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="proses/logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>