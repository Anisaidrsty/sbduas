<?php require('../main/header.php'); ?>
<div id="container">
	<div id="hero">
		<h2 align="center">Tabel Berobat</h2>
		<br />
		<button onclick="location.href='berobat_tambah.php'" style="background-color:#3498db; cursor:pointer;"> Tambah Berobat</button>
		<table class="table" style="margin-top:2rem; margin-bottom:1rem;">
			<thead>
				<tr>
					<td>No</td>
					<td>Id berobat</td>
					<td>id pasien</td>
					<td>id dokter</td>
					<td>tgl berobat</td>
					<td>keluhan pasien</td>
					<td>hasil diagnosa</td>
					<td>penatalaksaaan</td>
					<td>Action</td>
				</tr>
			</thead>
			<?php
				$no = 1;
				$query = mysqli_query($con, 'SELECT * FROM berobat');
				while ($data = mysqli_fetch_array($query)) {
				?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data['id_berobat'] ?></td>
				<td><?php echo $data['id_pasien'] ?></td>
				<td><?php echo $data['id_dokter'] ?></td>
				<td><?php echo $data['tgl_berobat'] ?></td>
				<td><?php echo $data['keluhan_pasien'] ?></td>
				<td><?php echo $data['hasil_diagnosa'] ?></td>
				<td><?php echo $data['penatalaksanaan'] ?></td>
				<td><a href="berobat_hapus.php?id=<?= $data['id_berobat'];?>" onclick="return confirm('Yakin data <?= $data['id_berobat'];?> akan dihapus ?')">Hapus</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<?php require('../main/footer.php'); ?>