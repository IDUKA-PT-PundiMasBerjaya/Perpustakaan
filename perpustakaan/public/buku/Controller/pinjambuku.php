<?php  
	include_once("../../../config/koneksi.php");

	class PinjamController {
		private $kon; 

		public function __construct($connection) {
			$this->kon = $connection;
		}
		public function tambahPinjam() {
			$setAuto = mysqli_query($this->kon, "SELECT MAX(id_peminjaman) AS max_id FROM peminjaman_buku");
			$result = mysqli_fetch_assoc($setAuto);
			$max_id = $result['max_id'];

			if (is_numeric($max_id)) {
				$nounik = $max_id + 1;
			} else {
				$nounik = 1;
			} return $nounik;
		}

		public function tambahDataPinjam($data) {
			$id_peminjaman = $data['id_peminjaman'];
			$jumlah_buku = $data['jumlah_buku'];
			$buku_id_buku = $data['buku_id_buku'];
			

					$insertData = mysqli_query($this->kon, "INSERT INTO peminjaman_buku(id_peminjaman, nama, buku_id_buku) VALUES ('$id_peminjaman', '$jumlah_buku', '$buku_id_buku')");

					if ($insertData) {
						return "Data berhasil disimpan.";
					} else {
						return "Gagal menyimpan data.";
					}

		}
	}
?>