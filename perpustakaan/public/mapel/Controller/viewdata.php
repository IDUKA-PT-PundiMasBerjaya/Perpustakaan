<?php  
	include_once("../../../config/koneksi.php");

	class MapelController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function getMapelData($idpelajaran) {
			$result =  mysqli_query($this->kon, "SELECT * FROM matapelajaran WHERE idpelajaran = '$idpelajaran'");
			return mysqli_fetch_array($result);
		}
	}

	$kelasController = new MapelController($kon);
	$idpelajaran = $_GET['idpelajaran'];
	$mapelData = $kelasController->getMapelData($idpelajaran);

	if ($mapelData) {
		$idpelajaran = $mapelData['idpelajaran'];
		$namapelajaran = $mapelData['namapelajaran'];
		$guru_idguru = $mapelData['guru_idguru'];
	}
?>