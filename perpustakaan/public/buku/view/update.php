<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/bukuupdate.php");

	$bukuController = new BukuController($kon);

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $keterangan = $_POST['keterangan'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];
    $matapelajaran_idpelajaran = $_POST['matapelajaran_idpelajaran'];

		$message = $bukuController->updateBuku($id, $judul, $penulis, $keterangan, $stok, $gambar, $matapelajaran_idpelajaran);
		echo $message;

		header("Location: ../../dashboard/data/dashboardbuku.php");
	}

	  $id = null;
    $judul = null;
    $penulis = null;
    $keterangan = null;
    $stok = null;
	  $gambar = null;
    $matapelajaran_idpelajaran = null;

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$result = $bukuController->getDataBuku($id);

		if ($result) {
			$id = $result['id'];
			$judul = $result['judul'];
			$penulis = $result['penulis'];
			$keterangan = $result['keterangan'];
			$stok = $result['stok'];
			$gambar = $result['gambar'];
			$matapelajaran_idpelajaran = $result['matapelajaran_idpelajaran'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Update Buku</title>
</head>
<body>
  <h1>Update Data Buku</h1>
  <a href="../../dashboard/data/dashboardbuku.php">Home</a>
  <form action="update.php" method="POST", name="update", enctype="multipart/form-data">
    <table border="1">
      <tr>
        <td>ID Buku</td>
        <td><input class="input_data_1" type="text" name="id" value="<?php echo $id ?>" readonly></td>
      </tr>
            <tr> 
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $judul ?>" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" value="<?php echo $penulis ?>" required></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td><input type="text" name="keterangan" value="<?php echo $keterangan ?>" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok" value="<?php echo $stok ?>" required></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="text" name="gambar" value="<?php echo $gambar ?>" required></td>
            </tr>
            <tr>
                <td>ID Pelajaran</td>
                <td><input type="text" name="matapelajaran_idpelajaran" value="<?php echo $matapelajaran_idpelajaran ?>" required></td>
      <tr>
        <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
        <td><input type="submit" name="update" value="Update"></td>
      </tr>
    </table>
  </form>
</body>
</html>