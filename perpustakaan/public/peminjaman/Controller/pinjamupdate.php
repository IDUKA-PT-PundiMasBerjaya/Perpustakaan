<?php  
	include_once("../../../config/koneksi.php");
 
	class PinjamController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updatePinjam($id_peminjaman, $tanggal_pinjam, $tanggal_kembali, $guru_idguru, $siswa_idsiswa) {
			$result = mysqli_query($this->kon, "UPDATE peminjaman SET tanggal_pinjam = '$tanggal_pinjam', tanggal_kembali = '$tanggal_kembali', guru_idguru = '$guru_idguru', siswa_idsiswa = '$siswa_idsiswa' WHERE id_peminjaman = '$id_peminjaman'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataPinjam($id_peminjaman) {
			$sql = "SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>