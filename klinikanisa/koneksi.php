<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "klinik";
$con = mysqli_connect($host, $user, $pass, $db);

if ($con == false){
	echo "Koneksi ke server gagal.";
	die();

} else echo "";
?>