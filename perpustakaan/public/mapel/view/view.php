<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/viewdata.php");

	$mapelController = new MapelController($kon);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Mapel Data</title>
</head>
<body>
	<a href="../../dashboard/data/dashboardmapel.php">Home</a>
	<br><br>
	<form name="update_data" method="post" action="view.php">
		<table border="0">
			<tr>
				<td>ID Mapel </td>
				<td>: </td>
				<td><?php echo $idpelajaran; ?></td>
			</tr>
			<tr>
				<td>Nama Pelajaran </td>
				<td>: </td>
				<td><?php echo $namapelajaran; ?></td>
			</tr>
			<tr>
				<td>Nama Guru </td>
				<td>: </td>
				<td><?php echo $namaguru; ?></td>
			</tr>
		</table>
	</form>
</body>
</html>