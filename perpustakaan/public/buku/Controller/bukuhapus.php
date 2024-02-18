<?php  
	include_once("../../../config/koneksi.php");

	class BukuController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteBuku($id) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM buku WHERE id = '$id'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new BukuController($kon);
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$message = $kelasController->deleteBuku($id);
		echo $message;
		header("Location: ../../dashboard/data/dashboardbuku.php");
	}
?>