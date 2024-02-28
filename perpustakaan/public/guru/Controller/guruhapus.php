<?php  
	include_once("../../../config/koneksi.php");

	class GuruController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteGuru($idguru) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM guru WHERE idguru = '$idguru'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new GuruController($kon);
	if (isset($_GET['idguru'])) {
		$idguru = $_GET['idguru'];
		$message = $kelasController->deleteGuru($idguru);
		echo $message;
		header("Location: ../../dashboard/data/dashboardguru.php");
	}
?>