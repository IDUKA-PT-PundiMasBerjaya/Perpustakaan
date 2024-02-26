<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/siswatambah.php");
 
	$siswaController = new SiswaController($kon);

	if (isset($_POST['submit'])) {
		$idsiswa = $siswaController->tambahSiswa();

		$data = [
			'idsiswa' => $idsiswa,
      		'nama' => $_POST['nama'],
      		'alamat' => $_POST['alamat'],
      		'email' => $_POST['email'],
      		'no_hp' => $_POST['no_hp'],
	  		'users_id' => $_POST['users_id']
		];

		$message = $siswaController->tambahDataSiswa($data);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah Siswa</title>
	</head>
	<body>
	<h1>Tambah Data Siswa</h1>
		<a href="../../dashboard/data/dashboardsiswa.php">Home</a>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Siswa</td>
				<td><input class="input_data_1" type="text" name="idsiswa" value="<?php echo($siswaController->tambahSiswa()) ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
				<td><input class="input" type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input class="input" type="text" name="alamat" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="input" type="text" name="email" required></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input class="input" type="text" name="no_hp" required></td>
			</tr>
			<tr>
				<td>ID User</td>
				<td><input class="input" type="text" name="users_id" required></td>
			</tr>
		</table>
		<input type="submit" name="submit" value="Tambah Data">
		<?php  if (isset($message)): ?>
			<div class="success-message">
				<?php echo $message; ?>
			</div>
		<?php endif; ?>
	</form>
</body>
</html>