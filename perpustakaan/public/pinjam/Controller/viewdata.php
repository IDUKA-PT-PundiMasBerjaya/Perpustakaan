<?php  
	include_once("../../../config/koneksi.php");

	class PinjamController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function getPinjamData($id_peminjaman) {
			$result =  mysqli_query($this->kon, "SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'");
			return mysqli_fetch_array($result);
		}
	}

	$kelasController = new PinjamController($kon);
	$id_peminjaman = $_GET['id_peminjaman'];
	$pinjamData = $kelasController->getPinjamData($id_peminjaman);

	if ($pinjamData) {
		$id_peminjaman = $pinjamData['id_peminjaman'];
		$id_pengguna = $pinjamData['id_pengguna'];
		$tanggal_pinjam = $pinjamData['tanggal_pinjam'];
		$tanggal_kembali = $pinjamData['tanggal_kembali'];
	}
?>