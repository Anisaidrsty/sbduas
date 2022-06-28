<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit'])){
	$nama = $_POST['nama_dokter'];
	$sql = "INSERT INTO dokter (nama_dokter) VALUES('{$nama}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='dokter.php'</script>";
}
?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah Dokter</h2>
		<div class="main">
			<form method="post" action="dokter_tambah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="nama_dokter" class="col-sm-2 col-form-label">Nama Dokter</label>
					<input type="text" class="form-control" name="nama_dokter" placeholder="Masukan Nama Dokter" required />
				</div>
				<div class="submit">
					<input type="submit" name="submit" value="Simpan" />
					<a href="dokter.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require('../main/footer.php'); ?>
