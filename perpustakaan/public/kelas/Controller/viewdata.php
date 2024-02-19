<?php  
	include_once("../../../config/koneksi.php");

	class KelasController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function getKelasData($id_kelas) {
			$result =  mysqli_query($this->kon, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
			return mysqli_fetch_array($result);
		}
	}

	$classController = new KelasController($kon);
	$id_kelas = $_GET['id_kelas'];
	$kelasData = $classController->getKelasData($id_kelas);

	if ($kelasData) {
		$id_kelas = $kelasData['id_kelas'];
		$namakelas = $kelasData['namakelas'];
		$walikelas = $kelasData['walikelas'];
		$ketuakelas = $kelasData['ketuakelas'];
		$meja = $kelasData['meja'];
		$gambar_kelas = $kelasData['gambar_kelas'];
	}
?>