<?php  
	include_once("../../../config/koneksi.php");
 
	class MapelController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateMapel($idpelajaran, $namapelajaran, $guru_idguru) {
			$result = mysqli_query($this->kon, "UPDATE matapelajaran SET namapelajaran = '$namapelajaran', guru_idguru = '$guru_idguru' WHERE idpelajaran = '$idpelajaran'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataMapel($idpelajaran) {
			$sql = "SELECT * FROM matapelajaran WHERE idpelajaran = '$idpelajaran'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>