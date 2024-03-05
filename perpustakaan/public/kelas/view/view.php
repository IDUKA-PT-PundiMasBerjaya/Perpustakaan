<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/viewdata.php");

	$kelasController = new KelasController($kon);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View User Data</title>
</head>
<body>
	<a href="../../dashboard/data/dashboardkelas.php">Home</a>
	<br><br>
	<form name="update_data" method="post" action="view.php">
		<table border="0">
			<tr>
				<td>ID Kelas </td>
				<td>: </td>
				<td><?php echo $id_kelas; ?></td>
			</tr>
			<tr>
				<td>Nama Kelas </td>
				<td>: </td>
				<td><?php echo $namakelas; ?></td>
			</tr>
			<tr>
				<td>Kursi </td>
				<td>: </td>
				<td><?php echo $kursi; ?></td>
			</tr>
			<tr>
				<td>Meja </td>
				<td>: </td>
				<td><?php echo $meja; ?></td>
			</tr>
			<tr>
				<td>Gambar </td>
				<td>: </td>
				<td><?php echo $gambar_kelas; ?></td>
			</tr>
			<tr>
				<td>Wali Kelas </td>
				<td>: </td>
				<td><?php echo $guru_idguru; ?></td>
			</tr>
			<tr>
				<td>Ketua Kelas </td>
				<td>: </td>
				<td><?php echo $siswa_idsiswa; ?></td>
			</tr>
		</table>
	</form>
</body>
</html>