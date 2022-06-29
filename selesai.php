<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
	// menghubungkan file header.php ke dalam file ini
	include 'header.php';
	?>
</head>

<body>
    <div class="container" style="padding-bottom: 300px;">
        <!-- membuat informasi -->
        <h2 class="bg-success text-center" style="padding: 10px;">Checkout Berhasil</h2>
        <h3 class="text-center" style="font-weight: italic;">No. Rekening Finder Bouquet : 3568421790 (BCA)</h3>
        <br>
        <h4 class="text-center" style="font-weight: bold;">Terimakasih Sudah Berbelanja Finder Bouquet
            <br>
            <br>
            Pesananmu sedang diproses, silahkan melakukan konfirmasi bukti transfer pada link berikut
            <br>
            <a href="https://api.whatsapp.com/send/?phone=%2B6287930450481&text&app_absent=0">Whatsapp Admin</a>
        </h4>
    </div>
</body>

</html>

<?php 
	// menghubungkan footer.php ke dalam file ini
	include 'footer.php';
?>