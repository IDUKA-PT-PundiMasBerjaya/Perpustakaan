<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/guruupdate.php");

	$guruController = new GuruController($kon);

	if (isset($_POST['update'])) {
		$idguru = $_POST['idguru'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$no_hp = $_POST['no_hp'];

		$message = $guruController->updateGuru($idguru, $nama, $alamat, $email, $no_hp);
		echo $message;

		header("Location: ../../dashboard/data/dashboardguru.php");
	}

	$idguru = null;
	$nama = null;
	$alamat = null;
	$email = null;
	$no_hp = null;

	if (isset($_GET['idguru']) && is_numeric($_GET['idguru'])) {
		$idguru = $_GET['idguru'];
		$result = $guruController->getDataGuru($idguru);

		if ($result) {
			$idguru = $result['idguru'];
			$nama = $result['nama'];
			$alamat = $result['alamat'];
			$email = $result['email'];
			$no_hp = $result['no_hp'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Update Guru</title>
</head>
<body>
	<h1>Update Data Guru</h1>
	<a href="../../dashboard/data/dashboardguru.php">Home</a>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID</td>
				<td><input class="input_data_1" type="text" name="idguru" value="<?php echo $idguru ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td><input class="input" type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input class="input" type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="input" type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input class="input" type="text" name="no_hp" value="<?php echo $no_hp; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idguru" value="<?php echo $idguru; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>