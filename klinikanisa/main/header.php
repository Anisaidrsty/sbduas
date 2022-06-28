<?php
	include("../koneksi.php");
	session_start();
	if($_SESSION['logged']!="1"){
		echo "<script>alert('Anda Belum Login');window.location='../login.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title >KLINIK Anisa</title>
	<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="container">
		<header>
			<h1 align="center">Sistem Informasi Klinik Anisa</h1>
		</header>