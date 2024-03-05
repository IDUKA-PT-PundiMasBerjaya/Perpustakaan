<?php  
	include_once("../../../config/koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard Kelas</title>
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
        th:nth-child(6),
        th:nth-child(7),
		th:nth-child(8) {
            color: #fff; /* Warna teks putih */
        }

		/* Warna teks untuk tautan aksi */
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
	<!-- Tabel Kelas -->
	<table border="1">
		<h1> Data Kelas </h1>
		<nav>
			<div>
				<a href="../../kelas/view/tambah.php" class="btn bg-blue-500 text-white">Tambah Data Kelas</a>
				<a href="../../kelas/view/cetak.php" target="_blank" class="btn bg-blue-500 text-white">Cetak</a>
			</div>
            <div>
                <a href="../dashboard.php" class="btn bg-blue-500 text-white">Home</a>
            </div>
        </nav>
			<?php  
				if (isset($_GET['cari'])) {
					$cari = $_GET['cari'];
					$ambildata = mysqli_query($kon, "SELECT kelas.*, guru.nama AS nama_guru, siswa.nama AS nama_siswa
                                          FROM kelas
                                          INNER JOIN guru ON kelas.guru_idguru = guru.idguru
                                          INNER JOIN siswa ON kelas.siswa_idsiswa = siswa.idsiswa
                                          WHERE kelas.id_kelas LIKE '%".$cari."%' OR kelas.namakelas LIKE '%".$cari."%'");
				} else {
					$ambildata = mysqli_query($kon, "SELECT kelas.*, guru.nama AS nama_guru, siswa.nama AS nama_siswa
                                          FROM kelas
                                          INNER JOIN guru ON kelas.guru_idguru = guru.idguru
                                          INNER JOIN siswa ON kelas.siswa_idsiswa = siswa.idsiswa 
                                          ORDER BY kelas.id_kelas ASC ");
					$num = mysqli_num_rows($ambildata);
				}
			?>
		<tr>
			<th class="border border-gray-400 px-4 py-2 text-center"> ID Kelas </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Nama Kelas </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Kursi </th>
            <th class="border border-gray-400 px-4 py-2 text-center"> Meja </th>
            <th class="border border-gray-400 px-4 py-2 text-center"> Gambar </th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Nama Guru</th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Nama Siswa</th>
			<th class="border border-gray-400 px-4 py-2 text-center"> Aksi </th>
		</tr>
			<tbody>
		<?php  
			while ($userAmbilData = mysqli_fetch_array($ambildata)) {
				echo "<tr>";
					echo "<td class='border border-gray-400 px-4 py-2'>" . $id_kelas = $userAmbilData['id_kelas'] . "</td>";
                    echo "<td class='border border-gray-400 px-4 py-2'>" . $namakelas = $userAmbilData['namakelas'] . "</td>";
					echo "<td class='border border-gray-400 px-4 py-2'>" . $kursi = $userAmbilData['kursi'] . "</td>";
                    echo "<td class='border border-gray-400 px-4 py-2'>" . $meja = $userAmbilData['meja'] . "</td>";
                    echo "<td class='border border-gray-400 px-4 py-2'>";
                        $data = mysqli_query($kon, "SELECT * FROM kelas WHERE id_kelas = '{$userAmbilData['id_kelas']}'");
                        while ($row = mysqli_fetch_array($data)) {
                            echo "<a href='javascript:void(0);' onclick=\"window.open(../../kelas/aset/{$row['gambar_kelas']}', '_blank');\">
                                    <img src='../../kelas/aset/{$row['gambar_kelas']}' alt='Gambar Kelas' width='110' height='150'></a>";
                        }
                        "</td>";
                        echo "<td>" . $userAmbilData['nama_guru'] . "</td>";
                        echo "<td>" . $userAmbilData['nama_siswa'] . "</td>";
					echo "<td> 
							<a href='../../kelas/view/view.php?id_kelas=" . $userAmbilData['id_kelas'] . "' class='btn btn-view'> View </a> | 
							<a href='../../kelas/view/update.php?id_kelas=" . $userAmbilData['id_kelas'] . "' class='btn btn-edit'> Edit </a> | 
							<a href='../../kelas/Controller/kelashapus.php?id_kelas=" . $userAmbilData['id_kelas'] ."' class='btn btn-hapus'> Hapus </a> 
						</td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
</body>
</html>