<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit'])){
	$nama = $_POST['nama_obat'];
	$sql = "INSERT INTO obat (nama_obat) VALUES('{$nama}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='obat.php'</script>";
}
?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah Obat</h2>
		<hr />
		<div class="main">
			<form method="post" action="obat_tambah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
					<input type="text" class="form-control" name="nama_obat" placeholder="Masukan Nama Obat" required />
				</div>
				<div class="submit">
					<input type="submit" name="submit" value="Simpan" />
					<a href="obat.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require('../main/footer.php'); ?>
