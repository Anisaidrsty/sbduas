<?php
error_reporting(E_ALL);
include '../koneksi.php';

if (isset($_POST['submit'])){
	$idPasien	= $_POST['idPasien'];
	$idDokter	= $_POST['idDokter'];
	$tgl		= date('Y-m-d');
	$keluhan 	= $_POST['keluhan'];
	$diagnosa	= $_POST['diagnosa'];
	$penata		= $_POST['penatalaksanaan'];

	$sql = "INSERT INTO berobat(id_pasien, id_dokter, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan) 
	VALUES('{$idPasien}','{$idDokter}','{$tgl}','{$keluhan}','{$diagnosa}','{$penata}')";
	$result = mysqli_query($con, $sql);
	echo "<script>alert('Transaksi Sukses. Data Sudah ditambahkan');window.location='berobat.php'</script>";
}

// Data Pasien
$stringPasien = "SELECT * FROM pasien order by id_pasien DESC";
$dataPasien	= mysqli_query($con, $stringPasien);
$arrayPasien = mysqli_fetch_array($dataPasien);

// Data Dokter
$stringDokter = "SELECT * FROM dokter order by id_dokter DESC";
$dataDokter	= mysqli_query($con, $stringDokter);
$arrayDokter = mysqli_fetch_array($dataDokter);
?>

<?php require('../main/header.php'); ?>
<div id="container">
	<div class="hero" style="padding:2rem;">
		<h2 align="center">Tambah Berobat</h2>
		<div class="main">
			<form method="post" action="berobat_tambah.php" enctype="multipart/form-data">
				<div class="input mb-3">
					<label for="idPasien" class="col-sm-2 col-form-label">Pasien</label>
					<select name="idPasien" id="idPasien" required>
						<option value="">Pilih Pasien</option>
						<?php while($data2 = mysqli_fetch_array($dataPasien)){ ?>
							<option value="<?= $data2['id_pasien'];?>"><?= $data2['nama_pasien'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input mb-3">
					<label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
					<textarea name="keluhan" id="keluhan" required></textarea>
				</div>
				<div class="input mb-3">
					<label for="dokterLabel" class="col-sm-2 col-form-label">Dokter</label>
					<select class="form-control" id="DokterLabel" name="idDokter" required>
						<option value="">Pilih Dokter</option>
						<?php while($data = mysqli_fetch_array($dataDokter)){ ?>
							<option value="<?= $data['id_dokter'];?>"><?= $data['nama_dokter'];?></option>
						<?php } ?>
					</select>
				</div>
				<div class="input mb-3">
					<label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
					<textarea name="diagnosa" id="diagnosa" required></textarea>
				</div>
				<div class="input mb-3">
					<label for="penatalaksanaan" class="col-sm-2 col-form-label">Penatalaksanaan</label>
					<select name="penatalaksanaan" id="penatalaksanaan" required>
						<option value="Rawat Jalan">Rawat Jalan</option>
						<option value="Rawat Inap">Rawat Inap</option>
						<option value="Rujuk">Rujuk</option>
						<option value="lainnya">lainnya</option>
					</select>
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
