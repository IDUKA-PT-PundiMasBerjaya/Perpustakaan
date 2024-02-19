<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Kelas</title>
</head>
<body>
	<form action="dashboardkelas.php" method="GET">
		<label>Cari: </label>
		<input type="text" name="cari">
		<input type="submit" name="Cari">
	</form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Kelas -->
	<table border="1">
		<h1> Data Kelas </h1>
		<a href="../../kelas/view/tambah.php">| Tambah Data Kelas |</a>
		<a href="../../kelas/view/cetak.php" target="_blank"> Cetak |</a>
		<a href="../dashboard.php"> Home |</a><br><br>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM kelas WHERE id_kelas LIKE '%".$cari."%' OR namakelas LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM kelas ORDER BY id_kelas ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th> ID Kelas </th>
			<th> Nama Kelas </th>
			<th> Wali Kelas </th>
			<th> Ketua Kelas  </th>
            <th> Meja </th>
            <th> Gambar </th>
			<th> Aksi </th>
		</tr>

		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td>" . $id_kelas = $userAmbilData['id_kelas'] . "</td>";
                    echo "<td>" . $namakelas = $userAmbilData['namakelas'] . "</td>";
                    echo "<td>" . $walikelas = $userAmbilData['walikelas'] . "</td>";
                    echo "<td>" . $ketuakelas = $userAmbilData['ketuakelas'] . "</td>";
                    echo "<td>" . $meja = $userAmbilData['meja'] . "</td>";
                    echo "<td>" . $gambar_kelas = $userAmbilData['gambar_kelas'] . "</td>";
					echo "<td> 
							<a href='../../kelas/view/view.php?id_kelas=" . $userAmbilData['id_kelas'] . "'> View </a> | 
							<a href='../../kelas/view/update.php?id_kelas=" . $userAmbilData['id_kelas'] . "'> Edit </a> | 
							<a href='../../kelas/Controller/kelashapus.php?id_kelas=" . $userAmbilData['id_kelas'] ."'> Hapus </a> 
						</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>