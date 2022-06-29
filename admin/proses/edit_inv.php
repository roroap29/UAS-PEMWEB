<?php 
//menyertakan file koneksi.php di dalam file ini
include '../../koneksi/koneksi.php';

// membuat variabel untuk dimasukkan ke dalam database
$kode = $_POST['kd_material'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$tanggal = date("y-m-d");

// menampung hasil update pada database
$result = mysqli_query($conn, "UPDATE inventory SET kode_bk = '$kode', nama='$nama', qty = '$stok', satuan='$satuan', harga='$harga',tanggal='$tanggal' where kode_bk = '$kode'");

// jika berhasil maka kaan muncul alert
if($result){
	echo "
	<script>
	alert('DATA BERHASIL DIUPDATE');
	window.location = '../inventory.php';
	</script>
	";
}

?>