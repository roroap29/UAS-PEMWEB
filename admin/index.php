<?php 
//untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
session_start();
// memeriksa apakah variabel admin sudah ada atau tidak, kemudian masuk pada header halaman_utama.php
if(isset($_SESSION['admin'])){
  header('location:halaman_utama.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>(adm)Finder Bouquet</title>
    <!--memberikan judul pada halaman akses-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>

<body>
    <!-- membuat pop up untuk login sebagai admin  -->
    <script type="text/javascript">
    alert('Silahkan melakukan login sebagai admin! \n \n Username = admin \n Password = admin');
    </script>
    <!-- setelah kita klik ok, maka akan lanjut ke halaman login sebagai admin -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#target").click();
    });
    </script>

    <input type="hidden" class="btn btn-primary" id="target" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@getbootstrap">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <!-- salah satu fitur bootsrap yang membuat pop up tampil pada halaman web -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- judul -->
                    <h4 class="modal-title" id="exampleModalLabel">LOGIN ADMIN</h4>
                </div>
                <div class="modal-body">
                    <!-- sesi akan dilanjutkan pada login.php -->
                    <form action="proses/login.php" method="POST">
                        <!-- inputan username -->
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">username</label>
                            <input type="text" class="form-control" placeholder="Username" name="user" autofocus
                                autocomplete="off">
                        </div>
                        <!-- inputan password -->
                        <div class="form-group">
                            <label for="message-text" class="control-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pass"
                                autocomplete="off">
                        </div>
                </div>
                <!-- membuat button login -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>