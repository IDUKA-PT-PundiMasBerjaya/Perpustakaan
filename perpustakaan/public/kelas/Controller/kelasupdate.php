<?php  
	include_once("../../../config/koneksi.php");
 
	class KelasController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateKelas($id_kelas, $namakelas, $kursi, $meja, $gambar_kelas, $guru_idguru, $siswa_idsiswa) {
			$result = mysqli_query($this->kon, "UPDATE kelas SET namakelas = '$namakelas', kursi = '$kursi', meja = '$meja', gambar_kelas = '$gambar_kelas' , guru_idguru = '$guru_idguru', siswa_idsiswa = '$siswa_idsiswa'  WHERE id_kelas = '$id_kelas'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataKelas($id_kelas) {
			$sql = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>