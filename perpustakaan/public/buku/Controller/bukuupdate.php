<?php  
	include_once("../../../config/koneksi.php");
 
	class BukuController {
		private $kon;

		public function __construct($connection) {
			$this->kon = $connection;
		}

		public function updateBuku($id, $judul, $penulis, $keterangan, $stok, $gambar, $matapelajaran_idpelajaran) {
			$result = mysqli_query($this->kon, "UPDATE buku SET judul = '$judul', penulis = '$penulis', keterangan = '$keterangan', stok = '$stok', gambar = '$gambar', matapelajaran_idpelajaran = '$matapelajaran_idpelajaran' WHERE id = '$id'");

			if ($result) {
				return "Sukses meng-update data.";
			} else {
				return "Gagal meng-update data.";
			}
		}

		public function getDataBuku($id) {
			$sql = "SELECT * FROM buku WHERE id = '$id'";
			$ambildata = $this->kon->query($sql);

			if ($result = mysqli_fetch_array($ambildata)) {
				return $result;
			} else {
				return null;
			}
		}
	}
	
?>