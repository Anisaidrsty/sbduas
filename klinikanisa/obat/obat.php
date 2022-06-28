<?php require('../main/header.php'); ?>
<div id="container">
  <div id="hero">
    <h2 align="center">Tabel Obat</h2>
    <br />
		<button onclick="location.href='obat_tambah.php'" style="background-color:#3498db; cursor:pointer;"> Tambah Obat</button>
    <table class="table" style="margin-top:1rem; margin-bottom:1rem;">
      <thead>
        <tr>
          <td>No</td>
          <td>Id Obat</td>
          <td>Nama Obat</td>
          <td>Action</td>
        </tr>
      </thead>
      <?php
				$no = 1;
				$query = mysqli_query($con, 'SELECT * FROM obat');
				while ($data = mysqli_fetch_array($query)) {?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $data['id_obat'] ?></td>
        <td><?= $data['nama_obat'] ?></td>
				<td><a href="obat_hapus.php?id=<?= $data['id_obat'];?>" onclick="return confirm('Yakin data <?= $data['nama_obat'];?> akan dihapus ?')">Hapus</a> | <a href="obat_ubah.php?id=<?= $data['id_obat'];?>">Edit</a></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>
<?php require('../main/footer.php'); ?>
