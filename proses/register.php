<?php 
// menghubungkan file koneksi.php ke dalam file ini
include '../koneksi/koneksi.php';
// membuat variabel untuk menampung data customer dalam melakukan regristasi
$kode = mysqli_query($conn, "SELECT kode_customer from customer order by kode_customer desc");
// mengambil data dari variabel kode
$data = mysqli_fetch_assoc($kode);
// mengambil sebagian nilai dari database
$num = substr($data['kode_customer'], 1, 4);
// membuat variabel add dengan jumlah yang bertambah 1
$add = (int) $num + 1;
// pembuatan format id customer
if(strlen($add) == 1){
	$format = "C000".$add;
}else if(strlen($add) == 2){
	$format = "C00".$add;
}
else if(strlen($add) == 3){
	$format = "C0".$add;
}else{
	$format = "C".$add;
}

// membuat variabel yang dibutuhkan untuk regristasi
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$tlp = $_POST['telp'];
$konfirmasi = $_POST['konfirmasi'];

// memasukkan password
$hash = password_hash($password, PASSWORD_DEFAULT);
// melakukan pengecekan password dan username
if($password == $konfirmasi){
	$cek = mysqli_query($conn, "SELECT username from customer where username = '$username'");;
	$jml = mysqli_num_rows($cek);
	// jika username pernah digunakan, maka akan muncul alert
	if($jml == 1){
		echo "
		<script>
		alert('USERNAME SUDAH DIGUNAKAN');
		window.location = '../register.php';
		</script>
		";
		die;
	}
	// kode untuk input dalam database
	$result = mysqli_query($conn, "INSERT INTO customer VALUES('$format','$nama', '$email', '$username', '$hash', '$tlp')");
	// jika sudah memasukkan data dengan benar, maka akan muncul alert
	if($result){
		echo "
		<script>
		alert('REGISTER BERHASIL');
		window.location = '../user_login.php';
		</script>
		";
	}
}else{
	// jika password dan username tidak sama, maka akan muncul alert
	echo "
	<script>
	alert('KONFIRMASI PASSWORD TIDAK SAMA');
	window.location = '../register.php';
	</script>
	";
}
?>