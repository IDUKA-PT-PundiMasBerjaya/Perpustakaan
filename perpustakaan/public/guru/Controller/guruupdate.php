<?php  
	include_once("../../../config/koneksi.php");
 
	class GuruController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateGuru($idguru, $nama, $alamat, $email, $no_hp) {
			$result = mysqli_query($this->kon, "UPDATE guru SET nama = '$nama', alamat = '$alamat',email = '$email', no_hp = '$no_hp' WHERE idguru = '$idguru'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataGuru($idguru) {
			$sql = "SELECT * FROM guru WHERE idguru = '$idguru'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>