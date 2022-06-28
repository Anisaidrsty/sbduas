<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit'])){
	$id         = $_POST['id'];
	$namaPasien	= $_POST['nama_pasien'];
	$jenisKelamin= $_POST['jenis_kelamin'];
	$umur   		= $_POST['umur'];

	$sql = "UPDATE pasien SET nama_pasien='{$namaPasien}', jenis_kelamin='{$jenisKelamin}', umur='{$umur}' WHERE id_pasien='{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: pasien.php');
}

$id= $_GET['id'];
$sql = "SELECT * FROM pasien WHERE id_pasien='{$id}'";
$result = mysqli_query($con, $sql);
if (!$result) die('Error: Data tidak tersedia');

$data = mysqli_fetch_array($result);
function is_select($var, $val) {
if ($var == $val) return 'selected="selected"';
	return false;
}

?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding: 2rem;">
	<h2 align="center">Edit Data Obat</h2>
	<hr />
	<div class="main">
		<form method="post" action="pasien_ubah.php" enctype="multipart/form-data">
			<div class="input mb-3">
				<label for="nama_pasien" class="col-sm-2 col-form-label">Nama Pasien</label>
				<input type="text" class="form-control" name="nama_pasien" placeholder="Masukan Nama Pasien" value="<?= $data['nama_pasien'];?>" required />
			</div>
			<div class="input mb-3">
				<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<select name="jenis_kelamin" id="jenis_kelamin" required>
					<option value="L" <?=($data['jenis_kelamin']=="L")?'selected':'';?>>Laki-Laki</option>
					<option value="P" <?=($data['jenis_kelamin']=="P")?'selected':'';?>>Perempuan</option>
				</select>
			</div>
			<div class="input mb-3">
				<label for="umur" class="col-sm-2 col-form-label">Umur</label>
				<input type="number" class="form-control" name="umur" placeholder="Umur" value="<?= $data['umur'];?>" required />
			</div>
			<div class="submit">
				<input type="hidden" name="id" value="<?= $data['id_pasien'];?>" />
				<input type="submit" name="submit" value="Update" />
				<a href="pasien.php" role="button">Batal</a>
			</div>
		</form>
	</div>
	</div>
</div>
<?php require('../main/footer.php'); ?>
