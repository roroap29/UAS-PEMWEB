<?php 
//untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
session_start();
//menyertakan file koneksi.php di dalam file ini
include '../../koneksi/koneksi.php';
// memanggil method post user dan password
$username = $_POST['user'];
$pass = $_POST['pass'];
// melakukan cek kesesuaian user dan password
$result = mysqli_query($conn, "SELECT * FROM admin where username = '$username'");
$row = mysqli_fetch_assoc($result);
$user = $row['username'];
$ps = $row['password'];
if($username == $user){
	if(password_verify($pass, $ps)){
		$_SESSION["admin"] = true;
		header('location:../halaman_utama.php');
	}
	else{
		echo "
		<script>
		alert('USERNAME/PASSWORD SALAH');
		window.location = '../index.php';
		</script>
		";
	}
}
else{
	echo "
	<script>
	alert('USERNAME/PASSWORD SALAH');
	window.location = '../index.php';
	</script>
	";
}

?>