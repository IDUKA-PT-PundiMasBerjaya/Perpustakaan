<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/viewdata.php");

	$pinjamController = new PinjamController($kon);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Pinjam Data</title>
</head>
<body>
	<a href="../../dashboard/data/dashboardpinjam.php">Home</a>
	<br><br>
	<form name="update_data" method="post" action="view.php">
		<table border="0">
			<tr>
				<td>ID Peminjam </td>
				<td>: </td>
				<td><?php echo $id_peminjaman; ?></td>
			</tr>
			<tr>
				<td>ID Pengguna </td>
				<td>: </td>
				<td><?php echo $id_pengguna; ?></td>
			</tr>
			<tr>
				<td>Tanggal Pinjam </td>
				<td>: </td>
				<td><?php echo $tanggal_pinjam; ?></td>
			</tr>
			<tr>
				<td>Tanggal Kembali </td>
				<td>: </td>
				<td><?php echo $tanggal_kembali; ?></td>
			</tr>
		</table>
	</form>
</body>
</html>