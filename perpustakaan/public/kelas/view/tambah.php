<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/kelastambah.php");
 
	$kelasController = new KelasController($kon);

	if (isset($_POST['submit'])) {
		$id_kelas = $kelasController->tambahKelas();

		$data = [
			'id_kelas' => $id_kelas,
      		'namakelas' => $_POST['namakelas'],
	  		'walikelas' => $_POST['walikelas'],
			'ketuakelas' => $_POST['ketuakelas'],
			'meja' => $_POST['meja'],
			'gambar_kelas' => $_POST['gambar_kelas']
		];

		$message = $kelasController->tambahDataKelas($data);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah kelas</title>
	</head>
	<body>
	<h1>Tambah Data Kelas</h1>
		<a href="../../dashboard/data/dashboardkelas.php">Home</a>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Kelas</td>
				<td><input class="input_data_1" type="text" name="id_kelas" value="<?php echo($kelasController->tambahKelas()) ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Kelas</td>
				<td><input class="input" type="text" name="namakelas" required></td>
			</tr>
			<tr>
				<td>Wali Kelas</td>
				<td><input class="input" type="int" name="walikelas" required></td>
			</tr>
			<tr>
				<td>Ketua Kelas</td>
				<td><input class="input" type="int" name="ketuakelas" required></td>
			</tr>
			<tr>
				<td>Meja</td>
				<td><input class="input" type="int" name="meja" required></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input class="input" type="text" name="gambar_kelas" required></td>
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