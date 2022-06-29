<?php 
//menyertakan file koneksi.php di dalam file ini
include '../../koneksi/koneksi.php';

// membuat variabel yang dibutuhkan dan terhubung dengan database
$kode = $_POST['kode'];
$nm_produk = $_POST['nama'];
$harga = $_POST['harga'];
$desk = $_POST['desk'];
$nama_gambar = $_FILES['files']['name'];
$size_gambar = $_FILES['files']['size'];
$tmp_file = $_FILES['files']['tmp_name'];
$eror = $_FILES['files']['error'];
$type = $_FILES['files']['type'];

// BOM
$kd_material = $_POST['material'];
$keb = $_POST['keb'];
// memasukkan material yang dibutuhkan ke dalam produk
$filter = array_filter($kd_material);
$jml = count($filter) - 1;
$bk = mysqli_query($conn, "SELECT kode_bk from bom_produk where kode_produk = '$kode'");

// mengambil kembali data yang akan diedit 
if($eror === 4){
	$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', deskripsi = '$desk', harga = '$harga' where kode_produk = '$kode'");
	$no = 0;
	$a = 0;
	while ($no <= $jml) {
		while ($a <= $no) {
			$r = mysqli_fetch_assoc($bk);
			$kdb  = $r['kode_bk'];
			mysqli_query($conn, "UPDATE bom_produk SET kode_bk = '$kd_material[$no]',kebutuhan = '$keb[$no]' WHERE kode_produk = '$kode' and kode_bk = '$kdb'");
			$a++;
		}
		$no++;
	}
	// jika data yang telah edit berhasil, maka akan muncul alert berhasil
	if($result){
		echo "
		<script>
		alert('PRODUK BERHASIL DIEDIT');
		window.location = '../m_produk.php';
		</script>
		";
	}
	die;

}

// ekstensi gambar yang dapat diinputkan
$ekstensiGambar = array('jpg','jpeg','png');
$ekstensiGambarValid = explode(".", $nama_gambar);
$ekstensiGambarValid = strtolower(end($ekstensiGambarValid));

// jika ekstensi gambar tidak valid, maka akan muncul alert
if(!in_array($ekstensiGambarValid, $ekstensiGambar)){
	echo "
	<script>
	alert('EKSTENSI GAMBAR HARUS JPG, JPEG, PNG');
	window.location = '../edit_produk.php?kode=".$kode."';
	</script>
	";
	die;
}

// jika ukuran gambar diatas 1000000/1gb, maka akan muncul alert
if($size_gambar > 1000000){
	echo "
	<script>
	alert('UKURAN GAMBAR TERLALU BESAR');
	window.location = '../tm_produk.php';
	</script>
	";
	die;
}

// membuat variabel nama gambar yang akan diinputkan
$namaGambarBaru = uniqid();
$namaGambarBaru.=".";
$namaGambarBaru.=$ekstensiGambarValid;

// menyimpan gambar yang diinputkan sebagai produk ke dalam file manager
$gambar = mysqli_query($conn, "SELECT image from produk where kode_produk = '$kode'");
$tgambar = mysqli_fetch_assoc($gambar);
if (file_exists("../../image/produk/".$tgambar['image'])) {
	unlink("../../image/produk/".$tgambar['image']);
	move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);
	// mengambil kembali gambar yang akan diedit
	$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru' ,deskripsi = '$desk', harga = '$harga' where kode_produk = '$kode'");

	// mengambil kembali data material yang akan diedit
	$no = 0;
	$a = 0;
	while ($no <= $jml) {
		while ($a <= $no) {
			$r = mysqli_fetch_assoc($bk);
			$kdb  = $r['kode_bk'];
			mysqli_query($conn, "UPDATE bom_produk SET kode_bk = '$kd_material[$no]',kebutuhan = '$keb[$no]' WHERE kode_produk = '$kode' and kode_bk = '$kdb'");

			$a++;
		}
		$no++;
	}

	// Jika produk berhasil diedit maka akan muncul alert berhasil
	if($result){
		echo "
		<script>
		alert('PRODUK BERHASIL DIEDIT');
		window.location = '../m_produk.php';
		</script>
		";
	}
}
// memasukkan data yang telah diedit ke dalam database
else{
	move_uploaded_file($tmp_file, "../../image/produk/".$namaGambarBaru);
	$result = mysqli_query($conn, "UPDATE produk SET nama = '$nm_produk', image = '$namaGambarBaru' ,deskripsi = '$desk', harga = '$harga' where kode_produk = '$kode'");
	$no = 0;
	$a = 0;
	while ($no <= $jml) {
		while ($a <= $no) {
			$r = mysqli_fetch_assoc($bk);
			$kdb  = $r['kode_bk'];
			mysqli_query($conn, "UPDATE bom_produk SET kode_bk = '$kd_material[$no]',kebutuhan = '$keb[$no]' WHERE kode_produk = '$kode' and kode_bk = '$kdb'");
			$a++;
		}
		$no++;
	}
	// menampilkan alert berhasil
	if($result){
		echo "
		<script>
		alert('PRODUK BERHASIL DIEDIT');
		window.location = '../m_produk.php';
		</script>
		";
	}
}
?>