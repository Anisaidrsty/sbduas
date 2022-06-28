<?php require('../main/header.php'); ?>
<div id="container">
	<div id="hero">
		<h2 align="center">Tabel User</h2>
		<br />
		<button onclick="location.href='user_tambah.php'" style="background-color:#3498db; cursor:pointer;"> Tambah User</button>
		<table class="table" style="margin-top:1rem; margin-bottom:1rem;">
			<thead>
				<tr>
					<td>No</td>
					<td>Id</td>
					<td>Username</td>
					<td>Password</td>
					<td>Nama</td>
					<td>Action</td>
				</tr>
			</thead>
			<?php
				$no = 1;
				$query = mysqli_query($con, 'SELECT * FROM user');
				while ($data = mysqli_fetch_array($query)) {
				?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $data['id'] ?></td>
				<td><?php echo $data['username'] ?></td>
				<td><?php echo $data['password'] ?></td>
				<td><?php echo $data['nama_lengkap'] ?></td>
				<td><a href="user_hapus.php?id=<?= $data['id'];?>" onclick="return confirm('Yakin data <?= $data['nama_lengkap'];?> akan dihapus ?')">Hapus</a> | <a href="user_ubah.php?id=<?= $data['id'];?>">Edit</a></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>

<?php require('../main/footer.php'); ?>