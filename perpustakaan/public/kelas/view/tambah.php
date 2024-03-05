<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/kelastambah.php");
 
	$kelasController = new KelasController($kon);

	if (isset($_POST['submit'])) {
		$id_kelas = $kelasController->tambahKelas();

		$data = [
			'id_kelas' => $id_kelas,
      		'namakelas' => $_POST['namakelas'],
			'ketuakelas' => $_POST['ketuakelas'],
			'kursi' => $_POST['kursi'],
			'meja' => $_POST['meja'],
			'guru_idguru' => $_POST['guru_idguru'],
			'siswa_idsiswa' => $_POST['siswa_idsiswa']
		];

		$message = $kelasController->tambahDataKelas($data);
	}
    //inner join tabel Mata Pelajaran
    $dataGuru = "SELECT idguru, nama FROM guru";
	$hasilGuru = mysqli_query($kon, $dataGuru);

    $dataSiswa = "SELECT idsiswa, nama FROM siswa";
	$hasilSiswa = mysqli_query($kon, $dataSiswa);
?>
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Tambah kelas</title>
	<link rel="stylesheet" href="../../css/output.css">
    <style>
        /* Style untuk judul tabel */
        h1 {
            text-align: center;
            color: #020617;
            font-weight: bold;
            margin-bottom: 20px; /* Margin bawah sedikit diperkecil */
            font-size: 30px; /* Ukuran judul lebih kecil */
        }

        nav {
            display: flex;
            justify-content: left; /* Pusatkan item ke tengah */
            align-items: left; /* Pusatkan item secara vertikal */
            margin-bottom: 10px; /* Jarak antara navbar dan judul */
            width: 100%; /* Lebar nav mengisi keseluruhan */
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

        /* Style untuk form */
        form {
            margin-top: 10px; /* Margin atas sedikit diperkecil */
            text-align: center; /* Pusatkan teks */
            flex-wrap: wrap; /* Mengatur wrap agar tombol submit turun ke bawah pada layar kecil */
        }

        table {
            width: 25%; /* Lebar tabel lebih diperkecil */
            margin: 0 auto; /* Menengahkan tabel */
            border-collapse: collapse;
            margin-bottom: 10px; /* Margin bawah sedikit diperkecil */
        }

        table, th, td {
            border: 1px solid #020617;
            padding: 4px; /* Padding sedikit diperkecil */
        }

        input[type=text] {
            width: 100%;
            padding: 4px; /* Padding sedikit diperkecil */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 2px; /* Margin atas dan bawah sedikit diperkecil */
            margin-bottom: 8px; /* Margin atas dan bawah sedikit diperkecil */
            font-size: 14px; /* Ukuran teks sedikit diperkecil */
        }

        input[type=submit] {
            background-color: #4299e1;
            color: white;
            padding: 6px 12px; /* Padding sedikit diperkecil */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px; /* Ukuran teks sedikit diperkecil */
        }

        input[type=submit]:hover {
            background-color: #3182ce;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 4px;
            margin-top: 6px; /* Margin atas sedikit diperkecil */
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 14px; /* Ukuran teks sedikit diperkecil */
        }
        th:first-child {
            color: #020617; /* Warna teks putih */
        }

        td {
            font-weight: bold;
            background-color: #4299e1; /* Warna latar belakang biru muda */
        }

        td {
            font-size: 16px;
        }
        /* Style untuk sel yang sejajar dengan ID Buku */
        td:first-child,
        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(5),
        td:nth-child(6) {
            color: #020617; /* Warna teks Hitam */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-4"> <!-- Padding atas dan bawah sedikit diperkecil -->
	<h1>Tambah Data Kelas</h1>
		<nav>
            <a href="../../dashboard/data/dashboardkelas.php">Home</a>
        </nav>
		<form action="tambah.php" method="POST", name="tambah", enctype="multipart/form-data">
			<table border="1">
			<tr>
				<td>ID Kelas</td>
				<td><input class="input_data_1" type="text" name="id_kelas" value="<?php echo($kelasController->tambahKelas()) ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Kelas</td>
				<td><input class="input" type="text" name="namakelas" required></td>
			</tr>
			<tr>
				<td>Kursi</td>
				<td><input class="input" type="text" name="kursi" required></td>
			</tr>
			<tr>
				<td>Meja</td>
				<td><input class="input" type="text" name="meja" required></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td><input class="input" type="file" name="gambar_kelas" required></td>
			</tr>
			<tr>
	            <td>Nama Guru</td>
	            <td><select id="guru_idguru" name="guru_idguru" style="width :100%">
		        <?php if (mysqli_num_rows($hasilGuru) > 0) : ?>
			    <option value ="" disabled selected>Pilih Nama Guru</option> <?php while ($row = mysqli_fetch_assoc($hasilGuru)) : ?>
			    <option value ="<?php echo $row ['idguru']; ?>"> <?php echo $row['idguru'] . ' . ' . $row['nama']; ?></option>
		        <?php endwhile; ?>
		        <?php else : ?>
			    <option value ="" disabled selected>Tambahkan Data Guru terlebih Dahulu, Jika belum Ada </option>
		        <?php endif; ?>
		        </select>
	            </td>
            </tr>
			<tr>
	            <td>Nama Siswa</td>
	            <td><select id="siswa_idsiswa" name="siswa_idsiswa" style="width :100%">
		        <?php if (mysqli_num_rows($hasilSiswa) > 0) : ?>
			    <option value ="" disabled selected>Pilih Nama Siswa</option> <?php while ($row = mysqli_fetch_assoc($hasilSiswa)) : ?>
			    <option value ="<?php echo $row ['idsiswa']; ?>"> <?php echo $row['idsiswa'] . ' . ' . $row['nama']; ?></option>
		        <?php endwhile; ?>
		        <?php else : ?>
			    <option value ="" disabled selected>Tambahkan Data Siswa terlebih Dahulu, Jika belum Ada </option>
		        <?php endif; ?>
		        </select>
	            </td>
            </tr>
		</table>
		<input type="submit" name="submit" value="Tambah Data">
		<?php  if (isset($message)): ?>
			<div class="success-message">
				<?php echo $message; ?>
			</div>
		<?php endif; ?>
	</form>
</body>
</html>