<?php  
	include_once("../../../config/koneksi.php");

	class BukuController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function getBukuData($id_buku) {
			$result =  mysqli_query($this->kon, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
			return mysqli_fetch_array($result);
		}
	}

	$kelasController = new BukuController($kon);
	$id_buku = $_GET['id_buku'];
	$bukuData = $kelasController->getBukuData($id_buku);

	if ($bukuData) {
		$id_buku = $bukuData['id_buku'];
		$judul = $bukuData['judul'];
        $penulis = $bukuData['penulis'];
        $keterangan = $bukuData['keterangan'];
        $stok = $bukuData['stok'];
        $gambar = $bukuData['gambar'];
        $matapelajaran_idpelajaran = $bukuData['matapelajaran_idpelajaran'];
	}
?>