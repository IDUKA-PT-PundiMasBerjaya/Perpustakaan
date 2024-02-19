<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Mapel</title>
</head>
<body>
	<form action="dashboardmapel.php" method="GET">
		<label>Cari: </label>
		<input type="text" name="cari">
		<input type="submit" name="Cari">
	</form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Mapel -->
	<table border="1">
		<h1> Data Mapel </h1>
		<a href="../../mapel/view/tambah.php">| Tambah Data Mapel |</a>
		<a href="../../mapel/view/cetak.php" target="_blank"> Cetak |</a>
		<a href="../dashboard.php"> Home |</a><br><br>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM matapelajaran WHERE idpelajaran LIKE '%".$cari."%' OR namapelajaran LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM matapelajaran ORDER BY idpelajaran ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th> ID Pelajaran </th>
            <th> Nama Pelajaran </th>
			<th> Nama Guru </th>
			<th> Aksi </th>
		</tr>

		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td>" . $idpelajaran = $userAmbilData['idpelajaran'] . "</td>";
                    echo "<td>" . $namapelajaran = $userAmbilData['namapelajaran'] . "</td>";
					echo "<td>" . $namaguru = $userAmbilData['namaguru'] . "</td>";
					echo "<td> 
							<a href='../../mapel/view/view.php?idpelajaran=" . $userAmbilData['idpelajaran'] . "'> View </a> | 
							<a href='../../mapel/view/update.php?idpelajaran=" . $userAmbilData['idpelajaran'] . "'> Edit </a> | 
							<a href='../../mapel/Controller/mapelhapus.php?idpelajaran=" . $userAmbilData['idpelajaran'] ."'> Hapus </a> 
						</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>