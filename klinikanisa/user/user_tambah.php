<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit'])){
	$nama = $_POST['nama_lengkap'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "INSERT INTO user (username, password, nama_lengkap) VALUES('{$username}', '{$password}', '{$nama}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='user.php'</script>";
}
?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah User</h2>
		<hr />
		<div class="main">
			<form method="post" action="user_tambah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
					<input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan Nama User" required />
				</div>
                <div class="input mb-3">
					<label for="username" class="col-sm-2 col-form-label">Username</label>
					<input type="text" class="form-control" name="username" placeholder="Username" required />
				</div>
                <div class="input mb-3">
					<label for="password" class="col-sm-2 col-form-label">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" required />
				</div>
				<div class="submit">
					<input type="submit" name="submit" value="Simpan" />
					<a href="user.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require('../main/footer.php'); ?>
