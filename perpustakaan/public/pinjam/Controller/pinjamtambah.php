<?php  
	include_once("../../../config/koneksi.php");

	class PinjamController {
		private $kon; 

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function tambahPinjam() {
			$setAuto = mysqli_query($this->kon, "SELECT MAX(id_peminjaman) AS max_id FROM peminjaman");
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
			$id_pengguna = $data['id_pengguna'];
			$tanggal_pinjam = $data['tanggal_pinjam'];
			$tanggal_kembali = $data['tanggal_kembali'];

					$insertData = mysqli_query($this->kon, "INSERT INTO peminjaman (id_peminjaman, id_pengguna, tanggal_pinjam, tanggal_kembali) VALUES ('$id_peminjaman', '$id_pengguna', '$tanggal_pinjam', '$tanggal_kembali')");

					if ($insertData) {
						return "Data berhasil disimpan.";
					} else {
						return "Gagal menyimpan data.";
					}

		}
	}
?>