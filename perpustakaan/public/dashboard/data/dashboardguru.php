<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Guru</title>
</head>
<body>
	<form action="dashboardguru.php" method="GET">
		<label>Cari: </label>
		<input type="text" name="cari">
		<input type="submit" name="Cari">
	</form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Guru -->
	<table border="1">
		<h1> Data Guru </h1>
		<a href="../../guru/view/tambah.php">| Tambah Data Guru |</a>
		<a href="../../guru/view/cetak.php" target="_blank"> Cetak |</a>
		<a href="../dashboard.php"> Home |</a><br><br>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM guru WHERE id LIKE '%".$cari."%' OR namaguru LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM guru ORDER BY id ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th> ID Guru </th>
			<th> Nama Guru </th>
			<th> Alamat </th>
			<th> Email </th>
            <th> No. HP </th>
			<th> Aksi </th>
		</tr>

		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td>" . $id = $userAmbilData['id'] . "</td>";
					echo "<td>" . $namaguru = $userAmbilData['namaguru'] . "</td>";
					echo "<td>" . $alamat = $userAmbilData['alamat'] . "</td>";
					echo "<td>" . $email = $userAmbilData['email'] . "</td>";
                    echo "<td>" . $no_hp = $userAmbilData['no_hp'] . "</td>";
					echo "<td> 
							<a href='../../guru/view/view.php?id=" . $userAmbilData['id'] . "'> View </a> | 
							<a href='../../guru/view/update.php?id=" . $userAmbilData['id'] . "'> Edit </a> | 
						</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>