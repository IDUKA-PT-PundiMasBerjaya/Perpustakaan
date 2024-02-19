<?php  
	include_once("../../../config/koneksi.php");

	class SiswaController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteSiswa($idsiswa) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM siswa WHERE idsiswa = '$idsiswa'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new SiswaController($kon);
	if (isset($_GET['idsiswa'])) {
		$idsiswa = $_GET['idsiswa'];
		$message = $kelasController->deleteSiswa($idsiswa);
		echo $message;
		header("Location: ../../dashboard/data/dashboardsiswa.php");
	}
?>