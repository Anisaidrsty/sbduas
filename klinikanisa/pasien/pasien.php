<?php require('../main/header.php'); ?>

<div id="container">
	<div id="hero">
		<h2 align="center">Tabel Pasien</h2>
		<br>
		<button onclick="location.href='pasien_tambah.php'" style="background-color:#3498db; cursor:pointer;"> Tambah Pasien</button>
		<table class="table" style="margin-top:1rem; margin-bottom:1rem;">
			<thead>
				<tr>
					<td>No</td>
					<td>Id Pasien</td>
					<td>Nama Pasien</td>
					<td>Jenis Kelamin</td>
					<td>Umur</td>
					<td>Action</td>
				</tr>
			</thead>
			<?php
				$no = 1;
				$query = mysqli_query($con, 'SELECT * FROM pasien');
				while ($data = mysqli_fetch_array($query)) {
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data['id_pasien'] ?></td>
				<td><?php echo $data['nama_pasien'] ?></td>
				<td><?php echo $data['jenis_kelamin'] ?></td>
				<td><?php echo $data['umur'] ?></td>
				<td><a href="pasien_hapus.php?id=<?= $data['id_pasien'];?>" onclick="return confirm('Yakin data <?= $data['nama_pasien'];?> akan dihapus ?')">Hapus</a> | <a href="pasien_ubah.php?id=<?= $data['id_pasien'];?>">Edit</a></td>
			</tr>
			<?php } ?>
		</table>
	
	</div>
</div>

<?php require('../main/footer.php'); ?>