<?php 
// menghubungkan file koneksi.php ke dalam file ini
include '../koneksi/koneksi.php';
// membuat variabel yang dibutuhkan untuk melakukan order produk
$kd_cs = $_POST['kode_cs'];
$nama = $_POST['nama'];
$prov = $_POST['prov'];
$kota = $_POST['kota'];
$alamat = $_POST['almt'];
$kopos = $_POST['kopos'];

// membuat variabel untuk menampung invoice dari tabel produksi
$kode = mysqli_query($conn, "SELECT invoice from produksi order by invoice desc");
// mengambil data dari variabel kode
$data = mysqli_fetch_assoc($kode);
// mengambil sebagian nilai dari database
$num = substr($data['invoice'], 3, 4);
// membuat variabel add dengan jumlah yang bertambah 1
$add = (int) $num + 1;
// pembuatan format invoice
if(strlen($add) == 1){
	$format = "INV000".$add;
}else if(strlen($add) == 2){
	$format = "INV00".$add;
}
else if(strlen($add) == 3){
	$format = "INV0".$add;
}else{
	$format = "INV".$add;
}

// membuat variabel untuk menampung keranjang dari tabel keranjang
$keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE kode_customer = '$kd_cs'");

// mengambil data dari variabel keranjang
while($row = mysqli_fetch_assoc($keranjang)){
	$kd_produk = $row['kode_produk'];
	$nama_produk = $row['nama_produk'];
	$qty = $row['qty'];
	$harga = $row['harga'];
	$status = "Pesanan Baru";

	// $order = mysqli_query($conn, "INSERT INTO produksi VALUES('$format','$kd_cs','$kd_produk','$nama_produk','$qty','$harga','$status','$prov','$kota','$alamat','$kopos','0','0','0')");
	$order = mysqli_query($conn, "INSERT INTO `produksi`(`invoice`, `kode_customer`, `kode_produk`, `nama_produk`, `qty`, `harga`, `status`,  `provinsi`, `kota`, `alamat`, `kode_pos`, `terima`, `tolak`, `cek`) VALUES ('$format','$kd_cs','$kd_produk','$nama_produk','$qty','$harga','$status','$prov','$kota','$alamat','$kopos','0','0','0')");


}
	// membuat variabel keranjang yang akan terhapus dalam database tabel keranjang
	$del_keranjang = mysqli_query($conn,"DELETE FROM keranjang WHERE kode_customer = '$kd_cs'");
	// jika dihapus, maka akan masuk pada selesai.php
	if($del_keranjang){
		header("location:../selesai.php");
	}



?>