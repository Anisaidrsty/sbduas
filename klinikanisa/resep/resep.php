
<?php require('../main/header.php'); ?>

<div id="container">
	<div id="hero">
		<h2 align="center">Tabel Resep Obat</h2>
		<br />
		<button onclick="location.href='resep_tambah.php'" style="background-color:#3498db; cursor:pointer;"> Tambah Resep</button>
		<table class="table" style="margin-top:2rem; margin-bottom:1rem;">
			<thead>
				<tr>
					<td>No</td>
					<td>Id Resep</td>
					<td>Id Berobat/Diagnosa</td>
					<td>Nama Obat</td>
					<td>Action</td>
				</tr>
			</thead>
			<?php
				$no = 1;
				$query = mysqli_query($con, 'SELECT * FROM resep');
				while ($data = mysqli_fetch_array($query)) {
				?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['id_resep'] ?></td>
				<td><?= $data['id_berobat']?>/<?= $data['hasil_diagnosa']?></td>
				<td><?= $data['nama_obat'] ?></td>
				<td><a href="resep_hapus.php?id=<?= $data['id_resep'];?>" onclick="return confirm('Yakin data <?= $data['id_resep'];?> akan dihapus ?')">Hapus</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>

<?php require('../main/footer.php'); ?>