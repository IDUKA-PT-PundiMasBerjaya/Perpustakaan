<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Peminjaman</title>
</head>
<body>
	<form action="dashboardpeminjaman.php" method="GET">
		<label>Cari: </label>
		<input type="text" name="cari">
		<input type="submit" name="Cari">
	</form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Pinjam -->
	<table border="1">
		<h1> Data Pinjam </h1>
		<a href="../../pinjam/view/tambah.php">| Tambah Data Peminjam |</a>
		<a href="../../pinjam/view/cetak.php" target="_blank"> Cetak |</a>
		<a href="../dashboard.php"> Home |</a><br><br>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM peminjaman WHERE id_peminjaman LIKE '%".$cari."%' OR id_pengguna LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM peminjaman ORDER BY id_peminjaman ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th> ID Peminjaman </th>
            <th> ID Pengguna </th>
			<th> Tanggal Pinjam </th>
			<th> Tanggal Kembali </th>
			<th> Aksi </th>
		</tr>

		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td>" . $id_peminjaman = $userAmbilData['id_peminjaman'] . "</td>";
                    echo "<td>" . $id_pengguna = $userAmbilData['id_pengguna'] . "</td>";
                    echo "<td>" . $tanggal_pinjam = $userAmbilData['tanggal_pinjam'] . "</td>";
                    echo "<td>" . $tanggal_kembali = $userAmbilData['tanggal_kembali'] . "</td>";
					echo "<td> 
							<a href='../../pinjam/view/view.php?id_peminjaman=" . $userAmbilData['id_peminjaman'] . "'> View </a> | 
							<a href='../../pinjam/view/update.php?id_peminjaman=" . $userAmbilData['id_peminjaman'] . "'> Edit </a> |  
						</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>