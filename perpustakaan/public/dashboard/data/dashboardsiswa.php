<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Siswa</title>
</head>
<body>
	<form action="dashboardsiswa.php" method="GET">
		<label>Cari: </label>
		<input type="text" name="cari">
		<input type="submit" name="Cari">
	</form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Siswa -->
	<table border="1">
		<h1> Data Siswa </h1>
		<a href="../../siswa/view/tambah.php">| Tambah Data Siswa |</a>
		<a href="../../siswa/view/cetak.php" target="_blank"> Cetak |</a>
		<a href="../dashboard.php"> Home |</a><br><br>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM siswa WHERE idsiswa LIKE '%".$cari."%' OR nama LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM siswa ORDER BY idsiswa ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th> ID Siswa </th>
			<th> Nama Siswa </th>
			<th> Alamat </th>
			<th> Email </th>
            <th> No. HP </th>
            <th> ID User </th>
			<th> Aksi </th>
		</tr>

		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td>" . $idsiswa = $userAmbilData['idsiswa'] . "</td>";
					echo "<td>" . $nama = $userAmbilData['nama'] . "</td>";
					echo "<td>" . $alamat = $userAmbilData['alamat'] . "</td>";
					echo "<td>" . $email = $userAmbilData['email'] . "</td>";
                    echo "<td>" . $no_hp = $userAmbilData['no_hp'] . "</td>";
                    echo "<td>" . $users_id = $userAmbilData['users_id'] . "</td>";
					echo "<td> 
							<a href='../../siswa/view/view.php?idsiswa=" . $userAmbilData['idsiswa'] . "'> View </a> | 
							<a href='../../siswa/view/update.php?idsiswa=" . $userAmbilData['idsiswa'] . "'> Edit </a> | 
							<a href='../../siswa/Controller/siswahapus.php?idsiswa=" . $userAmbilData['idsiswa'] ."'> Hapus </a> 
						</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>