<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/viewdata.php");

	$bukuController = new BukuController($kon);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Buku Data</title>
</head>
<body>
	<a href="../../dashboard/data/dashboardbuku.php">Home</a>
	<br><br>
	<form name="update_data" method="post" action="view.php">
		<table border="0">
			<tr>
				<td>ID Buku</td>
				<td>: </td>
				<td><?php echo $id; ?></td>
			</tr>
            <tr>
                <td>Judul</td>
                <td>: </td>
                <td><?php echo $judul; ?></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td>: </td>
                <td><?php echo $penulis; ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>: </td>
                <td><?php echo $keterangan; ?></td>
            </tr>
			<tr>
                <td>Stok</td>
                <td>: </td>
                <td><?php echo $stok; ?></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>: </td>
                <td><?php echo $gambar; ?></td>
            </tr>
            <tr>
                <td>ID Pelajaran</td>
                <td>: </td>
                <td><?php echo $matapelajaran_idpelajaran; ?></td>
            </tr>
		</table>
	</form>
</body>
</html>