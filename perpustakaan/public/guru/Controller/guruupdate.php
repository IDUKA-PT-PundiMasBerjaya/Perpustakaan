<?php  
	include_once("../../../config/koneksi.php");
 
	class GuruController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateGuru($id, $namaguru, $alamat, $email, $no_hp) {
			$result = mysqli_query($this->kon, "UPDATE guru SET namaguru = '$namaguru', alamat = '$alamat',email = '$email', no_hp = '$no_hp' WHERE id = '$id'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataGuru($id) {
			$sql = "SELECT * FROM guru WHERE id = '$id'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>