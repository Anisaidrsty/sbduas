 <?php
	require "koneksi.php";
	
	session_start();
	if($_SESSION['logged']!="1"){
		echo "<script>alert('Anda Belum Login');window.location='login.php'</script>";
	}

	$querypasien = mysqli_query($con, "SELECT * FROM pasien");
	$jumlahpasien = mysqli_num_rows($querypasien);
	
	$queryobat = mysqli_query($con, "SELECT * FROM obat");
	$jumlahobat = mysqli_num_rows($queryobat);
	
	$querydokter = mysqli_query($con, "SELECT * FROM dokter");
	$jumlahdokter = mysqli_num_rows($querydokter);
	
	$queryberobat = mysqli_query($con, "SELECT * FROM berobat");
	$jumlahberobat = mysqli_num_rows($queryberobat);
	
	$queryresep = mysqli_query($con, "SELECT * FROM resep_obat");
	$jumlahresep = mysqli_num_rows($queryresep);
	
	$queryuser = mysqli_query($con, "SELECT * FROM user");
	$jumlahuser = mysqli_num_rows($queryuser);

	// IMPLEMETASI FUNCTION (untuk menampilkan total pasien)
	$data_pasien = mysqli_query($con, "SELECT fn_totalUsers() as total");
	$jumlah_pasien = mysqli_fetch_row($data_pasien);
	// END IMPLEMENTASI FUNCTION

	// IMPLEMENTASI SUBQUERY (menampilkan total posien yang belum berobat)
	$totalPasienBelumBerobat = mysqli_query($con, "SELECT count(id_pasien) as total FROM pasien WHERE id_pasien NOT IN(SELECT DISTINCT id_pasien FROM berobat)");
	$totalPasienBelumBerobat = mysqli_fetch_row($totalPasienBelumBerobat);
	// END IMPLEMENTASI SUBQUERY
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="fontawesome/fontawesome/css/all.css" />
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		/* navigasi */
		nav {
			display: block;
			background-color: #A52A2A;
		}
		nav a {
			padding: 15px 30px;
			display: inline-block;
			color: #ffffff;
			font-size: 14px;
			text-decoration: none;
			font-weight: bold;
		}

		nav a.active,
		nav a:hover {
			background-color: #A52A2A;
		}
	</style>
	<style>
		.kotak {
			border: solid;
		}
		.summary-pasien{
			background-color: #FF8C00;
			border-radius: 15px;
		}
		.summary-obat{
			background-color: #0a516b;
			border-radius: 15px;
		}
		.summary-dokter{
			background-color: #008B8B;
			border-radius: 15px;
		}
		.summary-berobat{
			background-color: #8FBC8F;
			border-radius: 15px;
		}
		.summary-resep{
			background-color: #0000FF;
			border-radius: 15px;
		}
		.summary-user{
			background-color: #5F9EA0;
			border-radius: 15px;
		}
		
		.no-decoration{
			text-decoration: none;
		}
		
	</style>
</head>
<nav>
	<a href="logout.php">Logout</a>
</nav>
<section id="wrapper">
	<div class="container shadow">
		<div style="margin: 24px;"></div>
		<div class="col-sm-11 mx-auto" style="padding: 2rem;">
			<div class="card">
				<div class="card-body">
					<div class="container mt-4">
						<nav aria-label="breadcrumb" style="border-radius:10px;">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active" aria-current="page">
									<i class="fa-solid fa-file-medical fa-2x"></i>
									<h2 style="padding-left: 1rem; color:white;">Data Klinik</h2>
								</li>
							</ol>
						</nav>

						<div class="container mt-4">
							<div class="row">
								<div class="col-lg-4 col-md-6 col-12 mb-3">
									<div class="summary-pasien p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-bed-pulse fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Pasien</h3>
												<p class="fs-4">
													<?= $jumlahpasien; ?>
													Pasien
												</p>
												<p><a href="pasien/pasien.php" class="text-white no-decoration" style="text-decoration:underline">Lihat Detail</a></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-12 mb-3">
									<div class="summary-obat p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-capsules fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Obat</h3>
												<p class="fs-4">
													<?= $jumlahobat; ?>
													Obat
												</p>
												<p><a href="obat/obat.php" class="text-white no-decoration" style="text-decoration:underline">Lihat Detail</a></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-12 mb-3">
									<div class="summary-dokter p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-user-doctor fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Dokter</h3>
												<p class="fs-4">
													<?= $jumlahdokter; ?>
													Dokter
												</p>
												<p><a href="dokter/dokter.php" class="text-white no-decoration" style="text-decoration:underline">Lihat Detail</a></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-12 mb-3">
									<div class="summary-berobat p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-syringe fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Berobat</h3>
												<p class="fs-4">
													<?= $jumlahberobat; ?>
													Berobat
												</p>
												<p><a href="berobat/berobat.php" class="text-white no-decoration" style="text-decoration:underline">Lihat Detail</a></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-12 mb-3">
									<div class="summary-resep p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-receipt fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Resep</h3>
												<p class="fs-4">
													<?= $jumlahresep; ?>
													Resep
												</p>
												<p><a href="resep/resep.php" class="text-white no-decoration" style="text-decoration:underline">Lihat Detail</a></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">User</h3>
												<p class="fs-4">
													<?= $jumlahuser; ?>
													User
												</p>
												<p><a href="user/user.php" class="text-white no-decoration" style="text-decoration:underline">Lihat Detail</a></p>
											</div>
										</div>
									</div>
								</div>

								<!-- IMPLEMENTASI SUBQUERY -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-4">
												<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
											</div>
											<div class="col-8 text-white">
												<h3 class="fs-2">Belum Berobat</h3>
												<p class="fs-4">
													<?= $totalPasienBelumBerobat[0]; ?> Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI SUBQUERY -->

								<!-- IMPLEMENTASI FUNCTION -->
								<div class="col-lg-6 col-md-6 col-12 mb-3">
									<div class="summary-user p-3">
										<div class="row">
											<div class="col-6">
												<i class="fa-solid fa-hospital-user fa-7x text-black-50"></i>
											</div>
											<div class="col-6 text-white">
												<h3 class="fs-2">Total Pasien</h3>
												<p class="fs-4">
													<?= $jumlah_pasien[0]; ?>
													Total Pasien
												</p>
												<p><a href="#" class="text-white no-decoration" style="text-decoration:underline"></a></p>
											</div>
										</div>
									</div>
								</div>
								<!-- END IMPLEMENTASI SUBQUERY -->

							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- IMPLEMENTASI VIEW -->
			<div class="card" style="margin-top:2rem;">
				<div class="card-body">
					<h4>Data Berobat Laki-Laki (IMPLEMENTASI view)</h4>
					<div class="container mt-4">
						<table class="table" style="margin-top:1rem;">
							<thead>
								<tr>
									<td>No.</td>
									<td>Nama Pasien</td>
									<td>Jenis Kelamin</td>
									<td>Umur</td>
									<td>Keluhan</td>
									<td>Hasil Diagnosa</td>
									<td>Nama Dokter</td>
								</tr>
							</thead>
							<?php
								$no = 1;
								$query = mysqli_query($con, 'SELECT * FROM viewPenyakit');
								while ($data = mysqli_fetch_array($query)) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['nama_pasien'] ?></td>
								<td><?= $data['jenis_kelamin'] ?></td>
								<td><?= $data['umur'] ?></td>
								<td><?= $data['keluhan_pasien'] ?></td>
								<td><?= $data['hasil_diagnosa'] ?></td>
								<td><?= $data['nama_dokter'] ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
</body>
</html>
