<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
	// menghubungkan file header.php ke dalam file ini
	include 'header.php';
	?>
    <!-- membuat informasi bantuan mengenai penggunaan website -->
    <style type="text/css">
    .bs-acc {
        margin: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 style=" width: 100%; border-bottom: 4px solid #ff8680"><b>Manual Aplikasi</b></h2>
        <div class="bs-acc">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color:#000;">
                        <div class="panel-heading" style="background-color: #eee;">
                            <h4 class="panel-title">
                                Bagaimana Cara Berbelanja di Website Finder Bouquet?
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <ol>
                                <li>Pastikan Anda sudah Daftar/Register dahulu</li>
                                <li>Pilih produk yang ingin dibeli</li>
                                <li>Lakukan checkout pesanan anda</li>
                                <li>Jika memiliki masalah dengan pembelian, silahkan menghubungi kontak yang tertera
                                </li>
                            </ol>
                        </div>
                    </div>
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
</body>

</html>
<?php 
// menghubungkan file footer.php ke dalam file ini
include 'footer.php';
?>