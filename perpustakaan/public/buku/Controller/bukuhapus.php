<?php  
	include_once("../../../config/koneksi.php");

	class BukuController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function deleteBuku($id_buku) {
			$result = mysqli_query($this->kon, "SELECT gambar FROM buku WHERE id_buku = '$id_buku'");
			$row = mysqli_fetch_assoc($result);
			$gambar = $row['gambar'];

			$deletedata = mysqli_query($this->kon, "DELETE FROM buku WHERE id_buku = '$id_buku'");

			if ($deletedata) {
				$gambar_dir = "../aset/";
				if ($gambar && file_exists($gambar_dir . $gambar)) {
					unlink ($gambar_dir . $gambar);
				}
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