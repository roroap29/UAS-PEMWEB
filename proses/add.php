<?php 
// menghubungkan file koneksi.php ke dalam file ini
include '../koneksi/koneksi.php';
// membuat variabel untuk dimasukkan ke database
$hal = $_GET['hal'];
$kode_cs = $_GET['kd_cs'];
$kode_produk = $_GET['produk'];
// memeriksa apakah variabel jumlah sudah ada atau tidak
if(isset($_GET['jml'])){
	$qty = $_GET['jml'];
}
// menampilkan data di tabel produk
$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
$row = mysqli_fetch_assoc($result);
$nama_produk = $row['nama'];
$kd = $row['kode_produk'];
$harga = $row['harga'];

// menampilkan data produk pesanan dari tabel keranjang
if($hal == 1){
	$cek = mysqli_query($conn, "SELECT * from keranjang where kode_produk = '$kode_produk' and kode_customer = '$kode_cs'");
	$jml = mysqli_num_rows($cek);
	$row1 = mysqli_fetch_assoc($cek);
	// jumlah akan bertambah dan kuantitas akan bertambah satu
	if($jml > 0){
		$set = $row1['qty']+1;
		// menampilkan perubahan kuantitas data dari tabel keranjang
		$update = mysqli_query($conn, "UPDATE keranjang SET qty = '$set' WHERE kode_produk = '$kode_produk' and kode_customer = '$kode_cs'");
		// jika pesanan berhasil ditambahkan, maka akan muncul alert
		if($update){
			echo "
			<script>
			alert('BERHASIL DITAMBAHKAN KE KERANJANG');
			window.location = '../keranjang.php';
			</script>
			";
			die;
		}
	}else{
		// kode untuk memasukkan data dalam database tabel keranjang
		$insert = mysqli_query($conn, "INSERT INTO keranjang VALUES('','$kode_cs','$kd','$nama_produk', '1', '$harga')");
		// jika pesanan berhasil ditambahkan, maka akan muncul alert
		if($insert){
			echo "
			<script>
			alert('BERHASIL DITAMBAHKAN KE KERANJANG');
			window.location = '../keranjang.php';
			</script>
			";
			die;
		}
	}
}else{
	// menampilkan kembali data dari tabel keranjang untuk dicek ulang
	$cek = mysqli_query($conn, "SELECT * from keranjang where kode_produk = '$kode_produk' and kode_customer = '$kode_cs'");
	$jml = mysqli_num_rows($cek);
	$row1 = mysqli_fetch_assoc($cek);
	// jumlah barang akan ikut bertambah 
	if($jml > 0){
		$set = $row1['qty']+$qty;
		// menampilkan pesanan yang sudah diedit dari tabel keranjang
		$update = mysqli_query($conn, "UPDATE keranjang SET qty = '$set' WHERE kode_produk = '$kode_produk' and kode_customer = '$kode_cs'");
		// jika pesanan sudah diupdate, maka akan muncul alert
		if($update){
			echo "
			<script>
			alert('BERHASIL DITAMBAHKAN KE KERANJANG');
			window.location = '../detail_produk.php?produk=".$kode_produk."';
			</script>
			";
			die;
		}
	}else{
		// kode untuk memasukkan data yang sudah diupdate ke database
		$insert = mysqli_query($conn, "INSERT INTO keranjang VALUES('','$kode_cs','$kd','$nama_produk', '$qty', '$harga')");
		// jika pesanan diupdate, maka akan muncul alert bahwa berhasil untuk ditambahkan ke keranjang belanja
		if($insert){
			echo "
			<script>
			alert('BERHASIL DITAMBAHKAN KE KERANJANG');
			window.location = '../detail_produk.php?produk=".$kode_produk."';
			</script>
			";
			die;
		}
	}
}
?>