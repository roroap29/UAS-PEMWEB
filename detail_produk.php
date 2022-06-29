<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
	// menghubungkan file header.php ke dalam file ini
	include 'header.php';
	// membuat variabel untuk dapat terhubung dengan database
	$kode = mysqli_real_escape_string($conn,$_GET['produk']);
	// membuat variabel penampungan yang terhubung dengan database
	$result = mysqli_query($conn, "SELECT * FROM produk WHERE kode_produk = '$kode'");
	$row = mysqli_fetch_assoc($result);
	?>
</head>

<body>
    <div class="container">
        <!-- judul -->
        <h2 style=" width: 100%; border-bottom: 4px solid #ff8680"><b>Detail produk</b></h2>
        <!-- menampilkan gambar produk -->
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <img src="image/produk/<?= $row['image']; ?>" width="400">
                </div>
            </div>

            <div class="col-md-8">
                <!-- menampilkan detail produk yang ingin dilihat detailnya -->
                <form action="proses/add.php" method="GET">
                    <input type="hidden" name="kd_cs" value="<?= $kode_cs; ?>">
                    <input type="hidden" name="produk" value="<?= $kode;  ?>">
                    <input type="hidden" name="hal" value="2">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td><b>Nama</b></td>
                                <td><?= $row['nama']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td>Rp.<?= number_format($row['harga']); ?></td>
                            </tr>
                            <tr>
                                <td><b>Deskripsi</b></td>
                                <td><?= $row['deskripsi'];  ?></td>
                            </tr>
                            <tr>
                                <td><b>Jumlah</b></td>
                                <td><input class="form-control" type="number" min="1" name="jml" value="1"
                                        style="width: 155px;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
					// memeriksa apakah variabel user sudah diatur atau belum
					if(isset($_SESSION['user'])){
					?>
                    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>
                        Tambahkan ke Keranjang</button>
                    <?php 
					}else{
					?>
                    <a href="keranjang.php" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i>
                        Tambahkan ke Keranjang</a>
                    <?php 
				}
				?>
                    <a href="index.php" class="btn btn-warning"> Kembali Belanja</a>
            </div>
            </form>
        </div>
    </div>
    <br>
    <br>
</body>

</html>

<?php 
// menghubungkan file footer.php ke dalam file ini
include 'footer.php';
?>