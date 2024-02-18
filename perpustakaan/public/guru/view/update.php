<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/guruupdate.php");

	$guruController = new GuruController($kon);

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$namaguru = $_POST['namaguru'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$no_hp = $_POST['no_hp'];

		$message = $guruController->updateGuru($id, $namaguru, $alamat, $email, $no_hp);
		echo $message;

		header("Location: ../../dashboard/data/dashboardguru.php");
	}

	$id = null;
	$namaguru = null;
	$alamat = null;
	$email = null;
	$no_hp = null;

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$result = $guruController->getDataGuru($id);

		if ($result) {
			$id = $result['id'];
			$namaguru = $result['namaguru'];
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
	<a href="../../dashboard/dashboard.php">Home</a>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID</td>
				<td><input class="input_data_1" type="text" name="id" value="<?php echo $id ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td><input class="input" type="text" name="namaguru" value="<?php echo $namaguru; ?>"></td>
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
				<td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>