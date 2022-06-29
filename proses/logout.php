<?php 
//untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
session_start();
// memutuskan variabel user dari database
unset($_SESSION['user']);
// memutuskan variabel password dari database
unset($_SESSION['kd_cs']);
// masuk pada halaman user_login.php
header('location:../user_login.php');
?>