<?php  
	include_once("../../../config/koneksi.php");

	class MapelController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteMapel($idpelajaran) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM matapelajaran WHERE idpelajaran = '$idpelajaran'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new MapelController($kon);
	if (isset($_GET['idpelajaran'])) {
		$idpelajaran = $_GET['idpelajaran'];
		$message = $kelasController->deleteMapel($idpelajaran);
		echo $message;
		header("Location: ../../dashboard/data/dashboardmapel.php");
	}
?>