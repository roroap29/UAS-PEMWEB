<?php 
//menyertakan file koneksi.php di dalam file ini
include '../../koneksi/koneksi.php';
// membuat variabel invoice
$inv = $_GET['inv'];
// menampung data dari database tabel produksi
$result = mysqli_query($conn, "SELECT * from produksi where invoice = '$inv'");

// menampung data dari bom_produk
while($row = mysqli_fetch_assoc($result)){
	$kodep = $row['kode_produk'];
	$t_bom = mysqli_query($conn, "SELECT * FROM bom_produk WHERE kode_produk = '$kodep'");
	// menampung data dari tabel inventory dan melakukan update data
	while($row1 = mysqli_fetch_assoc($t_bom)){
		$kodebk = $row1['kode_bk'];
		$inventory = mysqli_query($conn, "SELECT * FROM inventory WHERE kode_bk = '$kodebk'");
		$r_inv = mysqli_fetch_assoc($inventory);
		$kebutuhan = $row1['kebutuhan'];	
		$qtyorder = $row['qty'];
		$inven = $r_inv['qty'];
		$bom = ($kebutuhan * $qtyorder);
		$hasil = $inven - $bom;
		$inventory = mysqli_query($conn, "UPDATE inventory SET qty = '$hasil' WHERE kode_bk = '$kodebk'");
		// melakukan update data yang dapat terlihat pada tabel
		if($inventory){
			mysqli_query($conn, "UPDATE produksi SET terima = '1', status = '0' WHERE invoice = '$inv'");
			// jika berhasil maka akan muncul alert
			echo "
			<script>
			alert('PESANAN BERHASIL DITERIMA, BAHAN BAKU TELAH DIKURANGKAN');
			window.location = '../produksi.php';
			</script>
			";
		}
	}
}
?>