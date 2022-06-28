<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit'])){
	$id         = $_POST['id'];
	$namaLengkap= $_POST['nama_lengkap'];
	$username   = $_POST['username'];
	$password   = $_POST['password'];

	$sql = "UPDATE user SET username='{$username}', password='{$password}', nama_lengkap='{$namaLengkap}' WHERE id='{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: user.php');
}

$id= $_GET['id'];
$sql = "SELECT * FROM user WHERE id='{$id}'";
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
		<form method="post" action="user_ubah.php" enctype="multipart/form-data">
			<div class="input mb-3">
				<label class="col-sm-2 col-form-label">Nama Lengkap</label>
				<input type="text" class="form-control" name="nama_lengkap" value="<?= $data['nama_lengkap'];?>" />
			</div>
			<div class="input mb-3">
				<label class="col-sm-2 col-form-label">Username</label>
				<input type="text" class="form-control" name="username" value="<?= $data['username'];?>" />
			</div>
			<div class="input mb-3">
				<label class="col-sm-2 col-form-label">Password</label>
				<input type="text" class="form-control" name="password" value="<?= $data['password'];?>" />
			</div>
			<div class="submit">
				<input type="hidden" name="id" value="<?= $data['id'];?>" />
				<input type="submit" name="submit" value="Simpan" />
				<a href="obat.php" role="button">Batal</a>
			</div>
		</form>
	</div>
  </div>
</div>
<?php require('../main/footer.php'); ?>
