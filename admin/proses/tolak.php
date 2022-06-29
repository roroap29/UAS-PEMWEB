<?php 
//menyertakan file koneksi.php di dalam file ini
include '../../koneksi/koneksi.php';
// membuat variabel invoice
$inv = $_GET['inv'];
// menampung data update ketika ditolak
$tolak = mysqli_query($conn, "UPDATE produksi set tolak = '1', terima='2' WHERE invoice = '$inv'");
// jika pesanan ditolak, maka akan muncul alert
if($tolak){
	echo "
	<script>
	alert('PESANAN DITOLAK');
	window.location = '../produksi.php';
	</script>
	";
}
?>