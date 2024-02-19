<?php  
	include_once("../../../config/koneksi.php");

	class KelasController {
		private $kon; 

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function tambahKelas() {
			$setAuto = mysqli_query($this->kon, "SELECT MAX(id_kelas) AS max_id FROM kelas");
			$result = mysqli_fetch_assoc($setAuto);
			$max_id = $result['max_id'];

			if (is_numeric($max_id)) {
				$nounik = $max_id + 1;
			} else {
				$nounik = 1;
			} return $nounik;
		}

		public function tambahDataKelas($data) {
			$id_kelas = $data['id_kelas'];
			$namakelas = $data['namakelas'];
			$walikelas = $data['walikelas'];
			$ketuakelas = $data['ketuakelas'];
			$meja = $data['meja'];
			$gambar_kelas = $data['gambar_kelas'];
			
					$insertData = mysqli_query($this->kon, "INSERT INTO kelas(id_kelas, namakelas, walikelas, ketuakelas, meja, gambar_kelas) VALUES ('$id_kelas', '$namakelas', '$walikelas', '$ketuakelas', '$meja', '$gambar_kelas')");

					if ($insertData) {
						return "Data berhasil disimpan.";
					} else {
						return "Gagal menyimpan data.";
					}

		}
	}
?>