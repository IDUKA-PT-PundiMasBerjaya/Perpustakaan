<?php  
	include_once("../../../config/koneksi.php");
 
	class KelasController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateKelas($id_kelas, $namakelas, $walikelas, $ketuakelas, $meja, $gambar_kelas) {
			$result = mysqli_query($this->kon, "UPDATE kelas SET namakelas = '$namakelas', walikelas = '$walikelas', ketuakelas = '$ketuakelas', meja = '$meja', gambar_kelas = '$gambar_kelas'  WHERE id_kelas = '$id_kelas'");

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