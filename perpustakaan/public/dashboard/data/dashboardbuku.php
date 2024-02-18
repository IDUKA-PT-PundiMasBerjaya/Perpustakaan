<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Buku</title>
</head>
<body>
	<form action="dashboardbuku.php" method="GET">
		<label>Cari: </label>
		<input type="text" name="cari">
		<input type="submit" name="Cari">
	</form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Buku -->
	<table border="1">
		<h1> Data Buku </h1>
		<a href="../../buku/view/tambah.php">| Tambah Data Buku |</a>
		<a href="../../buku/view/cetak.php" target="_blank"> Cetak |</a>
		<a href="../dashboard.php"> Home |</a><br><br>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM buku WHERE id LIKE '%".$cari."%' OR judul LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM buku ORDER BY id ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th> ID Buku </th>
			<th> Judul </th>
			<th> Penulis </th>
			<th> Keterangan </th>
			<th> Stok </th>
            <th> Gambar</th>
            <th> ID Pelajaran</th>
			<th> Aksi </th>
		</tr>

		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
                    echo "<td>" . $userAmbilData['id'] . "</td>";
                    echo "<td>" . $userAmbilData['judul'] . "</td>";
                    echo "<td>" . $userAmbilData['penulis'] . "</td>";
                    echo "<td>" . $userAmbilData['keterangan'] . "</td>";
                    echo "<td>" . $userAmbilData['stok'] . "</td>";
                    echo "<td>" . $userAmbilData['gambar'] . "</td>";
                    echo "<td>" . $userAmbilData['matapelajaran_idpelajaran'] . "</td>";
					echo "<td> 
							<a href='../../buku/view/view.php?id=" . $userAmbilData['id'] . "'> View </a> | 
							<a href='../../buku/view/update.php?id=" . $userAmbilData['id'] . "'> Edit </a> | 
							<a href='../../buku/Controller/bukuhapus.php?id=" . $userAmbilData['id'] ."'> Hapus </a> 
						</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>