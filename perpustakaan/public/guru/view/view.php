<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/viewdata.php");

	$guruController = new GuruController($kon);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View User Data</title>
</head>
<body>
	<a href="../../dashboard/data/dashboardguru.php">Home</a>
	<br><br>
	<form name="update_data" method="post" action="view.php">
		<table border="0">
			<tr>
				<td>ID Guru </td>
				<td>: </td>
				<td><?php echo $id; ?></td>
			</tr>
			<tr>
				<td>Nama Guru </td>
				<td>: </td>
				<td><?php echo $namaguru; ?></td>
			</tr>
			<tr>
				<td>Alamat Guru </td>
				<td>: </td>
				<td><?php echo $alamat; ?></td>
			</tr>
			<tr>
				<td>Email </td>
				<td>: </td>
				<td><?php echo $email; ?></td>
			</tr>
			<tr>
				<td>No HP </td>
				<td>: </td>
				<td><?php echo $no_hp; ?></td>
			</tr>
		</table>
	</form>
</body>
</html>