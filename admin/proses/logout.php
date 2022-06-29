<?php 
//untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
session_start();
// membuang variabel admin
unset($_SESSION['admin']);
//memeriksa apakah variabel admin sudah ada atau tidak
if(!isset($_SESSION['admin'])){
	header('location:../index.php');
}
?>