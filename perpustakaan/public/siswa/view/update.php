<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/siswaupdate.php");

	$siswaController = new SiswaController($kon);

	if (isset($_POST['update'])) {
		$idsiswa = $_POST['idsiswa'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$no_hp = $_POST['no_hp'];
		$users_id= $_POST['users_id'];

		$message = $siswaController->updateSiswa($idsiswa, $nama, $alamat, $email, $no_hp, $users_id);
		echo $message;

		header("Location: ../../dashboard/data/dashboardsiswa.php");
	}

	$idsiswa = null;
	$nama = null;
	$alamat = null;
	$email = null;
	$no_hp = null;
	$users_id= null; 

	if (isset($_GET['idsiswa']) && is_numeric($_GET['idsiswa'])) {
		$idsiswa = $_GET['idsiswa'];
		$result = $siswaController->getDataSiswa($idsiswa);

		if ($result) {
			$idsiswa = $result['idsiswa'];
			$nama = $result['nama'];
			$alamat = $result['alamat'];
			$email = $result['email'];
			$no_hp = $result['no_hp'];
			$users_id= $result['users_id'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Update Siswa</title>
</head>
<body>
	<h1>Update Data Siswa</h1>
	<a href="../../dashboard/data/dashboardsiswa.php">Home</a>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID Siswa</td>
				<td><input class="input_data_1" type="text" name="idsiswa" value="<?php echo $idsiswa ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
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
				<td>ID User</td>
				<td><input class="input" type="text" name="users_id" value="<?php echo $users_id; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idsiswa" value="<?php echo $idsiswa; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>