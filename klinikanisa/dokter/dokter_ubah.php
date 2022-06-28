<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit'])){
	$id 	= $_POST['id'];
	$nama 	= $_POST['nama_dokter'];

	$sql = "UPDATE dokter SET nama_dokter='{$nama}' WHERE id_dokter='{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: dokter.php');
}

$id= $_GET['id'];
$sql = "SELECT * FROM dokter WHERE id_dokter='{$id}'";
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
    <h2 align="center">Edit Data Dokter</h2>
    <hr />
    <div class="main">
      <form method="post" action="dokter_ubah.php" enctype="multipart/form-data">
        <div class="input mb-3">
          <label class="col-sm-2 col-form-label">Nama Dokter</label>
          <input type="text" class="form-control" name="nama_dokter" value="<?= $data['nama_dokter'];?>" />
        </div>
        <div class="submit">
          <input type="hidden" name="id" value="<?= $data['id_dokter'];?>" />
          <input type="submit" name="submit" value="Simpan" />
          <a href="dokter.php" role="button">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require('../main/footer.php'); ?>
