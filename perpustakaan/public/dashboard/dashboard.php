<?php  
	include_once("../../config/koneksi.php");

	session_start();

	if (!isset($_SESSION["id"])) {
		header("Location: ../login.php");
		exit();
	}

	$id = $_SESSION["id"];
	$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
</head>
<body>
	<h2>Selamat datang, Ini halaman Dashboard Perpustakaan <?php echo $username; ?>!</h2>
	<a href="data/dashboardbuku.php"> Data Buku |</a>
	<a href="data/dashboardmapel.php"> Data Mata Pelajaran |</a>
	<a href="data/dashboardguru.php"> Data Guru |</a>
	<a href="data/dashboardkelas.php"> Data Kelas |</a>
	<a href="data/dashboardsiswa.php"> Data Siswa |</a>
	<a href="data/dashboardpeminjaman.php">| Data Peminjam |</a>
	<a href="data/dashboardpengembalian.php"> Data Pengembali |</a>
</body>
<br><a href="../../logout.php">| Logout |</a>
</html>