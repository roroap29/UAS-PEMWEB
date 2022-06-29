<?php 
//menyertakan file koneksi.php di dalam file ini
include '../../koneksi/koneksi.php';

// membuat variabel yang dibutuhkan dan terhubung dengan database
$kode = $_GET['kode'];
$produk = mysqli_query($conn, "SELECT * FROM produk where kode_produk ='$kode'");
$row = mysqli_fetch_assoc($produk);

unlink("../../image/produk/".$row['image']);
mysqli_query($conn, "DELETE FROM bom_produk where kode_produk = '$kode'");
$del = mysqli_query($conn, "DELETE FROM produk WHERE kode_produk = '$kode'");

// jika data produk berhasil dihapus, maka akan muncul alert
if($del){
	echo "
	<script>
	alert('DATA BERHASIL DIHAPUS');
	window.location = '../m_produk.php';
	</script>
	";
}

?>