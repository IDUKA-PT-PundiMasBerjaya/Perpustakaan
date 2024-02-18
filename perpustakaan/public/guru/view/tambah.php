<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/gurutambah.php");
 
	$guruController = new GuruController($kon);

	if (isset($_POST['submit'])) {
		$id = $guruController->tambahGuru();

		$data = [
			'id' => $id,
      		'namaguru' => $_POST['namaguru'],
      		'alamat' => $_POST['alamat'],
      		'email' => $_POST['email'],
      		'no_hp' => $_POST['no_hp'],
		];

		$message = $guruController->tambahDataGuru($data);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah Guru</title>
	</head>
	<body>
	<h1>Tambah Data Guru</h1>
		<a href="../../dashboard/data/dashboardguru.php">Home</a>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Guru</td>
				<td><input class="input_data_1" type="text" name="id" value="<?php echo($guruController->tambahGuru()) ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td><input class="input" type="text" name="namaguru" required></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input class="input" type="text" name="alamat" required></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="input" type="text" name="email" required></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input class="input" type="text" name="no_hp" required></td>
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