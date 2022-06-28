<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit'])){
	$nama = $_POST['nama_pasien'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$umur = $_POST['umur'];

	$sql = "INSERT INTO pasien (jenis_kelamin, umur, nama_pasien) VALUES('{$jenis_kelamin}', '{$umur}', '{$nama}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='pasien.php'</script>";
}
?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah Pasien</h2>
		<hr />
		<div class="main">
			<form method="post" action="pasien_tambah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
					<input type="text" class="form-control" name="nama_pasien" placeholder="Masukan Nama Pasien" required />
				</div>
				<div class="input mb-3">
					<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
					<select name="jenis_kelamin" id="jenis_kelamin" required>
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
								<div class="input mb-3">
					<label for="umur" class="col-sm-2 col-form-label">Umur</label>
					<input type="number" class="form-control" name="umur" placeholder="Umur" required />
				</div>
				<div class="submit">
					<input type="submit" name="submit" value="Simpan" />
					<a href="pasien.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require('../main/footer.php'); ?>
