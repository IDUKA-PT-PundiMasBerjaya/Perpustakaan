<?php  
	include_once("../../../config/koneksi.php");

	class PinjamController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deletePinjam($id_peminjaman) {
			$deletedata = mysqli_query($this->kon, "DELETE FROM peminjaman WHERE id_peminjaman= '$id_peminjaman'");

			if ($deletedata) {
				return "Data sukses terhapus.";
			} else {
				return "Data gagal terhapus.";
			}
		}
	}

	$kelasController = new PinjamController($kon);
	if (isset($_GET['id_peminjaman'])) {
		$id_peminjaman = $_GET['id_peminjaman'];
		$message = $kelasController->deletePinjam($id_peminjaman);
		echo $message;
		header("Location: ../../dashboard/data/dashboardpeminjaman.php");
	}
?>