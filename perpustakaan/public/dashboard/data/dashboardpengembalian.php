<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Peminjaman</title>
	<link rel="stylesheet" href="../../css/output.css">
	<style>
        /* Style untuk judul tabel */
        h1 {
            text-align: center;
            color: #020617;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 30px;
        }

        /* Style untuk navbar */
        nav {
            display: flex;
            justify-content: space-between; /* Menempatkan item ke ujung kiri dan kanan */
            align-items: center; /* Pusatkan item secara vertikal */
            margin-bottom: 10px; /* Jarak antara navbar dan judul */
        }

        nav a {
            padding: 10px 20px;
            margin-right: 15px;
            color: #1a365d; /* Warna biru tua */
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            background-color: #e2e8f0; /* Warna latar belakang */
            border: 2px solid #4299e1; /* Warna border */
            border-radius: 4px; /* Bentuk sudut */
        }

        /* Hover effect */
        nav a:hover {
            background-color: #4299e1; /* Warna latar belakang saat hover */
            color: #fff; /* Warna teks saat hover */
        }

        /* Style untuk tabel */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Jarak antara tabel dan bagian atas halaman */
        }

        th, td {
            border: 3px solid #020617;
            padding: 12px;
            text-align: left;
            color: #020617; /* Warna teks hitam */
            background-color: #fff; /* Warna latar belakang putih */
        }

        th:first-child {
            color: #fff; /* Warna teks putih */
        }

        th {
            font-weight: bold;
            background-color: #4299e1; /* Warna latar belakang biru muda */
        }

        td {
            font-size: 16px;
        }
		/* Style untuk sel yang sejajar dengan ID Buku */
        th:first-child,
        th:nth-child(2),
        th:nth-child(3),
        th:nth-child(4),
        th:nth-child(5),
        th:nth-child(6) {
            color: #fff; /* Warna teks putih */
        }

		/* Warna teks untuk tautan aksi */
        .btn-pinjam {
            color: #1a365d; /* Warna biru tua */
        }

        .btn-view {
            color: #38c172; /* Warna hijau muda */
        }

        .btn-edit {
            color: #4299e1; /* Warna biru muda */
        }

        .btn-hapus {
            color: #e53e3e; /* Warna merah */
        }

		/* Style untuk kotak pencarian */
        .search-container {
            display: flex;
            align-items: center;
        }

        .search-container input[type=text] {
            width: 200px;
            margin-top: 10px;
            padding: 5px;
            font-size: 5px;
            border: 2px solid #020617;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.5); /* Transparansi */
        }

        .search-container input[type=submit] {
            background-color: #4299e1;
            color: white;
            border: none;
            padding: 4px 8px; /* Padding diperkecil */
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px; /* Ukuran font yang lebih kecil */
            margin-left: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body class="bg-gray-100">
	<div class="container mx-auto py-8">
		<form action="dashboardbuku.php" method="GET" class="mb-4">
           <div class="search-container">
                <input type="text" name="cari" placeholder="Search..." class="border border-gray-400 rounded-md px-2 py-1" style="font-size: 20px;">
                <input type="submit" value="Cari" class="btn bg-blue-500 text-white px-4 py-1 rounded-md" style="font-size: 25px;">
            </div>
        </form>
	<?php  
		if (isset($_GET['cari'])) {
			$cari = $_GET['cari'];
		}
	?>
	<!-- Tabel Pinjam -->
	<table border="1">
		<nav>
			<div>
				<a href="../../pengembalian/view/tambah.php" class="btn bg-blue-500 text-white">Tambah Data Pengembalian</a>
				<a href="../../pengembalian/view/cetak.php" target="_blank" class="btn bg-blue-500 text-white">Cetak</a>
			</div>
            <div>
                <a href="../dashboard.php" class="btn bg-blue-500 text-white">Home</a>
            </div>
        </nav>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT * FROM pengembalian_buku WHERE id_pengembalian LIKE '%".$cari."%' OR buku_id_buku LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT * FROM pengembalian_buku ORDER BY id_pengembalian ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th class="border border-gray-400 px-4 py-2 text-center"> ID Pengembalian </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Jumlah Buku </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Tanggal Pengembalian </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> ID Buku </th>
            <th class="border border-gray-400 px-4 py-2 text-center"> ID Peminjam </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Aksi </th>
		</tr>
		<tbody>
		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td class='border border-gray-400 px-4 py-2'>" . $id_pengembalian = $userAmbilData['id_pengembalian'] . "</td>";
                    echo "<td class='border border-gray-400 px-4 py-2'>" . $jumlah_buku = $userAmbilData['jumlah_buku'] . "</td>";
                    echo "<td class='border border-gray-400 px-4 py-2'>" . $tanggal_pengembalian = $userAmbilData['tanggal_pengembalian'] . "</td>";
					echo "<td class='border border-gray-400 px-4 py-2'>" . $buku_id_buku = $userAmbilData['buku_id_buku'] . "</td>";
					echo "<td class='border border-gray-400 px-4 py-2'>" . $peminjaman_idpeminjaman = $userAmbilData['peminjaman_idpeminjaman'] . "</td>";
					echo "<td> 
							<a href='../../pengembalian/view/view.php?id_pengembalian=" . $userAmbilData['id_pengembalian'] . "' class='btn btn-view'> View </a> | 
							<a href='../../pengembalian/view/update.php?id_pengembalian=" . $userAmbilData['id_pengembalian'] . "' class='btn btn-edit'> Edit </a> | 
							<a href='../../pengembalian/Controller/pinjamhapus.php?id_pengembalian=" . $userAmbilData['id_pengembalian'] ."' class='btn btn-hapus'> Hapus </a> 
						</td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
</body>
</html>