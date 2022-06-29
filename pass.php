<!-- memasukkan password admin -->
<?php 
$pass =password_hash("admin", PASSWORD_DEFAULT);
echo $pass; 
?>