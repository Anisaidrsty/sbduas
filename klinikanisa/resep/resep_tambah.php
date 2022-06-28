<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit'])){
	$idObat	= $_POST['idObat'];
	$idBerobat	= $_POST['idBerobat'];

	$sql = "INSERT INTO resep_obat(id_berobat, id_obat) VALUES('{$idBerobat}', '{$idObat}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='resep.php'</script>";
}

// Data Obat
$stringObat = "SELECT * FROM obat order by id_obat DESC";
$dataObat	= mysqli_query($con, $stringObat);
$arrayObat = mysqli_fetch_array($dataObat);

// Data Berobat
$stringBerobat = "SELECT * FROM berobat order by id_berobat DESC";
$dataBerobat	= mysqli_query($con, $stringBerobat);
$arrayBerobat = mysqli_fetch_array($dataBerobat);
?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah Berobat</h2>
		<div class="main">
			<form method="post" action="resep_tambah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="idBerobat" class="col-sm-2 col-form-label">Berobat</label>
					<select name="idBerobat" id="idBerobat" required>
						<option value="">Pilih Berobat</option>
						<?php while($data2 = mysqli_fetch_array($dataBerobat)){ ?>
							<option value="<?= $data2['id_berobat'];?>"><?= $data2['id_berobat'];?> | <?= $data2['hasil_diagnosa'];?> </option>
						<?php } ?>
					</select>
				</div>
				<div class="input mb-3">
					<label for="obatLabel" class="col-sm-2 col-form-label">Obat</label>
					<select class="form-control" id="obatLabel" name="idObat" required>
						<option value="">Pilih Obat</option>
						<?php while($data = mysqli_fetch_array($dataObat)){ ?>
							<option value="<?= $data['id_obat'];?>"><?= $data['nama_obat'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="submit">
					<input type="submit" name="submit" value="Simpan" />
					<a href="berobat.php" role="button">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php require('../main/footer.php'); ?>
