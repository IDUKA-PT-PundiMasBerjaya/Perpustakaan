<?php  
	include_once("../../../config/koneksi.php");
 
	class SiswaController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateSiswa($idsiswa, $nama, $alamat, $email, $no_hp, $users_id) {
			$result = mysqli_query($this->kon, "UPDATE siswa SET nama = '$nama', alamat = '$alamat',email = '$email', no_hp = '$no_hp', users_id = '$users_id' WHERE idsiswa = '$idsiswa'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataSiswa($idsiswa) {
			$sql = "SELECT * FROM siswa WHERE idsiswa = '$idsiswa'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>