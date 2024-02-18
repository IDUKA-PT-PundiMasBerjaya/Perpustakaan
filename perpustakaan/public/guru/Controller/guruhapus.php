<?php  
	include_once("../../../config/koneksi.php");

	class GuruController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteGuru($id) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM guru WHERE id = '$id'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new GuruController($kon);
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$message = $kelasController->deleteGuru($id);
		echo $message;
		header("Location: ../../dashboard/data/dashboardguru.php");
	}
?>