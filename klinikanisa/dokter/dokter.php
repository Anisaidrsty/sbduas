<?php require('../main/header.php'); ?>
<div id="container">
	<div id="hero">
		<h2 align="center">Tabel Dokter</h2>
		<br>
		<button onclick="location.href='dokter_tambah.php'" style="background-color:#3498db; cursor:pointer;"> Tambah Dokter</button>
		<table class="table" style="margin-top:2rem; margin-bottom:1rem;">
			<thead>
				<tr>
					<td>No</td>
					<td>Id Dokter</td>
					<td>Nama Dokter</td>
					<td>Action</td>
				</tr>
			</thead>
			<?php
				$no = 1;
				$query = mysqli_query($con, 'SELECT * FROM dokter');
				while ($data = mysqli_fetch_array($query)) {
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data['id_dokter'] ?></td>
				<td><?= $data['nama_dokter'] ?></td>
				<td><a href="dokter_hapus.php?id=<?= $data['id_dokter'];?>" onclick="return confirm('Yakin data <?= $data['nama_dokter'];?> akan dihapus ?')">Hapus</a> | <a href="dokter_ubah.php?id=<?= $data['id_dokter'];?>">Edit</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<?php require('../main/footer.php'); ?>