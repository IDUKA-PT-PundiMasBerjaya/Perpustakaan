<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/pinjamupdate.php");

	$pinjamController = new PinjamController($kon);

	if (isset($_POST['update'])) {
		$id_peminjaman = $_POST['id_peminjaman'];
		$id_pengguna = $_POST['id_pengguna'];
		$tanggal_pinjam = $_POST['tanggal_pinjam'];
		$tanggal_kembali = $_POST['tanggal_kembali'];

		$message = $pinjamController->updatePinjam($id_peminjaman, $id_pengguna, $tanggal_pinjam, $tanggal_kembali);
		echo $message;

		header("Location: ../../dashboard/data/dashboardpinjam.php");
	}

	$id_peminjaman = null;
	

	if (isset($_GET['id_peminjaman']) && is_numeric($_GET['id_peminjaman'])) {
		$id_peminjaman = $_GET['id_peminjaman'];
		$result = $pinjamController->getDataPinjam($id_peminjaman);

		if ($result) {
			$id_peminjaman = $result['id_peminjaman'];
			$id_pengguna = $result['id_pengguna'];
			$tanggal_pinjam = $result['tanggal_pinjam'];
			$tanggal_kembali = $result['tanggal_kembali'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Update Mapel</title>
</head>
<body>
	<h1>Update Data Mapel</h1>
	<a href="../../dashboard/data/dashboardpinjam.php">Home</a>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID</td>
				<td><input class="input_data_1" type="text" name="id_peminjaman" value="<?php echo $id_peminjaman ?>" readonly></td>
			</tr>
			<tr>
				<td>ID Pengguna</td>
				<td><input class="input" type="text" name="id_pengguna" value="<?php echo $id_pengguna; ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Pinjam</td>
				<td><input class="input" type="date" name="tanggal_pinjam" value="<?php echo $tanggal_pinjam ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input class="input" type="date" name="tanggal_kembali" value="<?php echo $tanggal_kembali; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>