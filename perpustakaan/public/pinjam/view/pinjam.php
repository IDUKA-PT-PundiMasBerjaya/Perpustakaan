<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/pinjambuku.php");
 
	$pinjamController = new PinjamController($kon);

	if (isset($_POST['submit'])) {
		$id_peminjaman = $pinjamController->tambahPinjam();

		$data = [
			'id_peminjaman' => $id_peminjaman,
      		'jumlah_buku' => $_POST['jumlah_buku'],
      		'buku_id_buku' => $_POST['buku_id_buku'],
		];

		$message = $pinjamController->tambahDataPinjam($data);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman Buku</title>
	</head>
	<body>
	<h1>Mau Meminjam Berapa Buku ?</h1>
		<a href="../../dashboard/data/dashboardpeminjaman.php">Home</a>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Peminjaman</td>
				<td><input class="input_data_1" type="text" name="id_peminjaman" value="<?php echo($pinjamController->tambahPinjam()) ?>" readonly></td>
			</tr>
			<tr>
				<td>Jumlah Buku</td>
				<td><input class="input" type="int" name="jumlah_buku" required></td>
			</tr>
			<tr>
				<td>ID Buku</td>
				<td><input class="input" type="text" name="buku_id_buku" required></td>
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