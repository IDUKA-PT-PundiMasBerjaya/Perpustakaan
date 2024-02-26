<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/mapeltambah.php");
 
	$mapelController = new MapelController($kon);

	if (isset($_POST['submit'])) {
		$idpelajaran = $mapelController->tambahMapel();

		$data = [
			'idpelajaran' => $idpelajaran,
	  		'namapelajaran' => $_POST['namapelajaran'],
      		'guru_idguru' => $_POST['guru_idguru'],
		];

		$message = $mapelController->tambahDataMapel($data);
	}
	
	//mengambil data guru
	$dataGuru = "SELECT idguru, nama FROM guru";
	$hasilGuru = mysqli_query($kon, $dataGuru);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah Mapel</title>
	</head>
	<body>
	<h1>Tambah Data Mapel</h1>
		<a href="../../dashboard/data/dashboardmapel.php">Home</a>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Mapel</td>
				<td><input class="input_data_1" type="text" name="idpelajaran" value="<?php echo($mapelController->tambahMapel()) ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Pelajaran</td>
				<td><input class="input" type="text" name="namapelajaran" required></td>
			</tr>
			<tr>
				<td>ID Guru</td>
				<td><input class="input" type="text" name="guru_idguru" required></td>
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