<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/kelasupdate.php");

	$kelasController = new KelasController($kon);

	if (isset($_POST['update'])) {
		$id_kelas = $_POST['id_kelas'];
		$namakelas = $_POST['namakelas'];
		$walikelas = $_POST['walikelas'];
		$ketuakelas = $_POST['ketuakelas'];
		$meja = $_POST['meja'];
		$gambar_kelas = $_POST['gambar_kelas'];

		$message = $kelasController->updateKelas($id_kelas, $namakelas, $walikelas, $ketuakelas, $meja, $gambar_kelas);
		echo $message;

		header("Location: ../../dashboard/data/dashboardkelas.php");
	}

	$id_kelas = null;
	$namakelas = null;
	$walikelas = null;
	$ketuakelas = null;
	$meja = null;
	$gambar_kelas = null;

	if (isset($_GET['id_kelas']) && is_numeric($_GET['id_kelas'])) {
		$id_kelas = $_GET['id_kelas'];
		$result = $kelasController->getDataKelas($id_kelas);

		if ($result) {
			$id_kelas = $result['id_kelas'];
			$namakelas = $result['namakelas'];
			$walikelas = $result['walikelas'];
			$ketuakelas = $result['ketuakelas'];
			$meja = $result['meja'];
			$gambar_kelas = $result['gambar_kelas'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Update Kelas</title>
</head>
<body>
	<h1>Update Data Kelas</h1>
	<a href="../../dashboard/data/dashboardkelas.php">Home</a>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID</td>
				<td><input class="input_data_1" type="text" name="id_kelas" value="<?php echo $id_kelas ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Kelas</td>
				<td><input class="input" type="text" name="namakelas" value="<?php echo $namakelas; ?>"></td>
			</tr>
			<tr>
				<td>Wali Kelas</td>
				<td><input class="input" type="text" name="walikelas" value="<?php echo $walikelas; ?>"></td>
			</tr>
			<tr>
				<td>Ketua Kelas</td>
				<td><input class="input" type="text" name="ketuakelas" value="<?php echo $ketuakelas; ?>"></td>
			</tr>
			<tr>
				<td>Meja</td>
				<td><input class="input" type="text" name="meja" value="<?php echo $meja; ?>"></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input class="input" type="text" name="gambar_kelas" value="<?php echo $gambar_kelas; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>