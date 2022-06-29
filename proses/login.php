<?php 
//untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
session_start();
// menghubungkan file koneksi.php ke dalam file ini
include '../koneksi/koneksi.php';
// membuat variabel untuk pengisian login
$username = $_POST['username'];
$password = $_POST['pass'];

// pengecekan username dan password dari tabel customer
$cek = mysqli_query($conn, "SELECT * FROM customer where username = '$username'");
$jml = mysqli_num_rows($cek);
$row = mysqli_fetch_assoc($cek);

if($jml ==1){
	// jika password dan username benar maka masuk pada index.php
	if(password_verify($password, $row['password'])){
		$_SESSION['user'] = $row['nama'];
		$_SESSION['kd_cs'] = $row['kode_customer'];
		header('location:../index.php');
	}else{
		// jika salah, maka akan memunculkan alert dan kembali pada user_login.php
		echo "
		<script>
		alert('USERNAME/PASSWORD SALAH');
		window.location = '../user_login.php';
		</script>
		";
		die;
	}
}else{
	// menampilkan alert jika tidak mengisi username dan password
	echo "
	<script>
	alert('USERNAME/PASSWORD SALAH');
	window.location = '../user_login.php';
	</script>
	";
	die;
}

?>