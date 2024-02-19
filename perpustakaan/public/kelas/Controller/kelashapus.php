<?php  
	include_once("../../../config/koneksi.php");

	class KelasController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteKelas($id_kelas) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM kelas WHERE id_kelas = '$id_kelas'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$classController = new KelasController($kon);
	if (isset($_GET['id_kelas'])) {
		$id_kelas = $_GET['id_kelas'];
		$message = $classController->deleteKelas($id_kelas);
		echo $message;
		header("Location: ../../dashboard/data/dashboardkelas.php");
	}
?>