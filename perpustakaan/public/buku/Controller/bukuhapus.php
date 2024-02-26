<?php  
	include_once("../../../config/koneksi.php");

	class BukuController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteBuku($id_buku) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM buku WHERE id_buku = '$id_buku'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new BukuController($kon);
	if (isset($_GET['id_buku'])) {
		$id_buku = $_GET['id_buku'];
		$message = $kelasController->deleteBuku($id_buku);
		echo $message;
		header("Location: ../../dashboard/data/dashboardbuku.php");
	}
?>