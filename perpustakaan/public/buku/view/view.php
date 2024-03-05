<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/viewdata.php");

	$bukuController = new BukuController($kon);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Buku Data</title>
    <link href="../../css/output.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Warna biru muda */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Tinggi minimum setara dengan tinggi layar */
            margin: 0;
        }
        .container {
            background-color: #ffffff; /* Warna putih untuk latar belakang */
            padding: 20px;
            border-radius: 10px; /* Sudut lengkung pada kotak */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Efek bayangan */
            width: 80%; /* Lebar kontainer */
        }
        .table-auto {
            width: 100%; /* Lebar tabel 100% */
        }
        .my-custom-image {
            max-width: 200px; /* Lebar maksimum gambar */
            height: auto; /* Tinggi otomatis sesuai aspek ratio */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../../dashboard/data/dashboardbuku.php" class="text-blue-600 hover:underline mb-4 block">Home</a>
        <form name="update_data" method="post" action="view.php">
            <table class="table-auto">
                <tr>
                    <td class="px-4 py-2">ID Buku</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><?php echo $id_buku; ?></td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Judul</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><?php echo $judul; ?></td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Penulis</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><?php echo $penulis; ?></td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Keterangan</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><?php echo $keterangan; ?></td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Stok</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><?php echo $stok; ?></td>
                </tr>
                <tr>
                    <td class="px-4 py-2">Gambar</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><img src="<?php echo '../aset/' . $gambar; ?>" alt="Gambar Buku" class="my-custom-image"></td>
                </tr>
                <tr>
                    <td class="px-4 py-2">ID Pelajaran</td>
                    <td class="px-4 py-2">:</td>
                    <td class="px-4 py-2"><?php echo $matapelajaran_idpelajaran; ?></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
