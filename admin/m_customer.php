<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
	//menyertakan file header.php di dalam file ini
	include 'header.php';
	// memeriksa apakah variabel page sudah ada atau belum
	if(isset($_GET['page'])){
		$kode = $_GET['kode'];
		$result = mysqli_query($conn, "DELETE FROM customer WHERE kode_customer = '$kode'");
		// jika berhasil maka akan muncul alert
		if($result){
			echo "
			<script>
			alert('DATA BERHASIL DIHAPUS');
			window.location = 'm_customer.php';
			</script>
			";
		}
	}
	?>
</head>

<body>
    <div class="container">
        <!-- judul -->
        <h2 style=" width: 100%; border-bottom: 4px solid gray"><b>Data Customer</b></h2>
        <table class="table table-striped">
            <!-- membuat tabel yang akan ditampilkan pada master customer -->
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Customer</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				// mengambil data customer yang telah masuk ke database dan diurutkan berdasarkan kode customer
				$result = mysqli_query($conn, "SELECT * FROM customer order by kode_customer asc");
				$no =1;
					while ($row = mysqli_fetch_assoc($result)) {
						?>
                <!-- menampilkan data customer -->
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?= $row['kode_customer'];  ?></td>
                    <td><?= $row['nama'];  ?></td>
                    <td><?= $row['email'];  ?></td>
                    <!-- melakukan penghapusan data customer, dan akan muncul pop up  peringatan -->
                    <td><a href="m_customer.php?kode=<?php echo $row['kode_customer'];?>&page=del"
                            class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data ?')"><i
                                class="glyphicon glyphicon-trash"></i> </a></td>
                </tr>
                <?php 
						$no++;
					}
				?>
            </tbody>
        </table>
    </div>

    <!-- Modal dialog untuk menampilkan notifikasi -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
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
</body>

</html>

<!-- menyertakan file footer.php di dalam file ini -->
<?php 
include 'footer.php';
?>