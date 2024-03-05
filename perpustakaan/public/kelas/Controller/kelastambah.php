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
			$kursi = $data['kursi'];
			$meja = $data['meja'];
			$guru_idguru = $data['guru_idguru'];
			$siswa_idsiswa = $data['siswa_idsiswa'];
			
			//Menambahkan Gambar
			$ekstensi_diperbolehkan = array('jpeg', 'jpg', 'png');
			$namagambar = $_FILES['gambar_kelas']['name'];
			$x = explode('.', $namagambar);
			$ekstensi = strtolower(end($x));
			$ukuran = $_FILES['gambar_kelas']['size'];
			$file_temp = $_FILES['gambar_kelas']['tmp_name'];

			if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
				if ($ukuran <= 2000000) {
					move_uploaded_file($file_temp, '../aset/' . $namagambar);
					$insertData = mysqli_query($this->kon, "INSERT INTO kelas(id_kelas, namakelas, kursi, meja, gambar_kelas, guru_idguru, siswa_idsiswa) VALUES ('$id_kelas', '$namakelas', '$kursi', '$meja', '$namagambar', '$guru_idguru', '$siswa_idsiswa')");

					if ($insertData) {
						return "Data berhasil disimpan.";
					} else {
						return "Gagal menyimpan data.";
					}
				} else {
					echo "<div style:'color: red;'>
							Ukuran file terlalu besar! Silahkan pilih file yang lebih kecil. 
						</div>";
				}
			} else {
				echo "<div style:'color: red;'>
						Ekstensi file yang diupload tidak diizinkan!
					</div>";
			}

		}
	}
?>