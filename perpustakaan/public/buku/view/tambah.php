<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/bukutambah.php");
 
	$bukuController = new BukuController($kon);

	if (isset($_POST['submit'])) {
		$id = $bukuController->tambahBuku();
       
		$data = [
			'id' => $id,
            'judul' => $_POST['judul'],
            'penulis' => $_POST['penulis'],
            'keterangan' => $_POST['keterangan'],
            'stok' => $_POST['stok'],
            'gambar' => $_POST['gambar'],
            'matapelajaran_idpelajaran' => $_POST['matapelajaran_idpelajaran']
		];

		$message = $bukuController->tambahDataBuku($data);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah Buku</title>
</head>
<body>
	<h1>Tambah Data Buku</h1>
	<a href="../../dashboard/data/dashboardbuku.php">Home</a>
	<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
		<table border="1">
            <tr>
                <td>ID Buku</td>
                <td><input class="input_data_1" type="text" name="id" value="<?php echo($bukuController->tambahBuku()) ?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" required></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="text" name="gambar" required></td>
            </tr>
            <tr>
                <td>ID Pelajaran</td>
                <td><input type="text" name="matapelajaran_idpelajaran" required></td>
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