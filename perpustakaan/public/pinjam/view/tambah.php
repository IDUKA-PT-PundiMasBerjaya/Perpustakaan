<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/pinjamtambah.php");
 
	$pinjamController = new PinjamController($kon);

	if (isset($_POST['submit'])) {
		$id_peminjaman = $pinjamController->tambahPinjam();

		$data = [
			'id_peminjaman' => $id_peminjaman,
	  		'id_pengguna' => $_POST['id_pengguna'],
			'tanggal_pinjam' => $_POST['tanggal_pinjam'],
			'tanggal_kembali' => $_POST['tanggal_kembali'],
		];

		$message = $pinjamController->tambahDataPinjam($data);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah Pinjam</title>
	</head>
	<body>
	<h1>Tambah Data Pinjam</h1>
		<a href="../../dashboard/data/dashboardpinjam.php">Home</a>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Peminjaman</td>
				<td><input class="input_data_1" type="text" name="id_peminjaman" value="<?php echo($pinjamController->tambahPinjam()) ?>" readonly></td>
			</tr>
			<tr>
				<td>ID Pengguna</td>
				<td><input class="input" type="text" name="id_pengguna" required></td>
			</tr>
			<tr>
				<td>Tanggal Pinjam</td>
				<td><input class="input" type="date" name="tanggal_pinjam" required></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input class="input" type="date" name="tanggal_kembali" required></td>
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