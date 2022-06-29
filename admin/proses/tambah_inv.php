<?php 
	//menyertakan file koneksi.php di dalam file ini
	include '../../koneksi/koneksi.php';

	// membuat variabel yang akan digunakan untuk menambahkan inventory dan masuk ke dalam database
	$kode = $_POST['kd_material'];
	$nama = $_POST['nama'];
	$stok = $_POST['stok'];
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$tanggal = date("y-m-d");

	// menampung data yang dimasukkan ke dalam database
	$result = mysqli_query($conn, "INSERT INTO inventory VALUES('$kode','$nama','$stok', '$satuan', '$harga', '$tanggal')");

	// jika berhasil maka akan muncul alert
	if($result){
		echo "
			<script>
				alert('DATA BERHASIL DITAMBAHKAN');
				window.location = '../inventory.php';
			</script>
		";
	}
?>