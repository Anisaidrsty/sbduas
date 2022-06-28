<?php
error_reporting(E_ALL);
include_once '../koneksi.php';

if (isset($_POST['submit'])){
	$id 	= $_POST['id'];
	$nama 	= $_POST['nama_obat'];

	$sql = "UPDATE obat SET nama_obat='{$nama}' WHERE id_obat='{$id}'";
	$result = mysqli_query($con, $sql);
	header('location: obat.php');
}

$id= $_GET['id'];
$sql = "SELECT * FROM obat WHERE id_obat='{$id}'";
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
      <form method="post" action="obat_ubah.php" enctype="multipart/form-data">
        <div class="input mb-3">
          <label class="col-sm-2 col-form-label">Nama Obat</label>
          <input type="text" class="form-control" name="nama_obat" value="<?= $data['nama_obat'];?>" />
        </div>
        <div class="submit">
          <input type="hidden" name="id" value="<?= $data['id_obat'];?>" />
          <input type="submit" name="submit" value="Simpan" />
          <a href="obat.php" role="button">Batal</a>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require('../main/footer.php'); ?>
