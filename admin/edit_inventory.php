<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
	//menyertakan file header.php di dalam file ini
	include 'header.php';
	// membuat variabel kode
	$kode = $_GET['kode'];
	// membuat variabel penampung untuk dimasukkan ke dalam database dari tabel inventory
	$result = mysqli_query($conn, "SELECT * FROM inventory WHERE kode_bk = '$kode'");
	$row= mysqli_fetch_assoc($result);
	?>
</head>

<body>
    <div class="container">
        <!-- judul -->
        <h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Edit Inventory</b></h2>
        <!-- mengambil data dari data yang sudah diisikan sebelumnya -->
        <form action="proses/edit_inv.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Material</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" disabled
                            value="<?= $row['kode_bk']; ?>">
                        <input type="hidden" class="form-control" id="exampleInputEmail1"
                            placeholder="Contoh : Kg atau gram" name="kd_material" value="<?= $row['kode_bk']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Material</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Material"
                            name="nama" value="<?= $row['nama']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="stok"
                            value="<?= $row['qty']; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Satuan</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="pcs" name="satuan"
                            value="<?= $row['satuan']; ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name="harga"
                            placeholder="Contoh : 1000" value="<?= $row['harga']; ?>">
                    </div>
                </div>
            </div>
            <!-- membuat button submit dan cancel -->
            <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <a href="inventory.php" class="btn btn-danger">Cancel</a>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</body>

</html>

<?php 
//menyertakan file footer.php di dalam file ini
include 'footer.php';
?>