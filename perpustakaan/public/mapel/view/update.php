<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/mapelupdate.php");

	$mapelController = new MapelController($kon);

	if (isset($_POST['update'])) {
		$idpelajaran = $_POST['idpelajaran'];
		$namapelajaran = $_POST['namapelajaran'];
		$namaguru = $_POST['namaguru'];
		$message = $mapelController->updateMapel($idpelajaran, $namapelajaran, $namaguru);
		echo $message;

		header("Location: ../../dashboard/data/dashboardmapel.php");
	}

	$idpelajaran = null;
	$namapelajaran = null;
	$namaguru = null;

	if (isset($_GET['idpelajaran']) && is_numeric($_GET['idpelajaran'])) {
		$idpelajaran = $_GET['idpelajaran'];
		$result = $mapelController->getDataMapel($idpelajaran);

		if ($result) {
			$idpelajaran = $result['idpelajaran'];
			$namapelajaran = $result['namapelajaran'];
			$namaguru = $result['namaguru'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Update Mapel</title>
</head>
<body>
	<h1>Update Data Mapel</h1>
	<a href="../../dashboard/data/dashboardmapel.php">Home</a>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID</td>
				<td><input class="input_data_1" type="text" name="idpelajaran" value="<?php echo $idpelajaran ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Pelajaran</td>
				<td><input class="input" type="text" name="namapelajaran" value="<?php echo $namapelajaran ?>"></td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td><input class="input" type="text" name="namaguru" value="<?php echo $namaguru; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idpelajaran" value="<?php echo $idpelajaran; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>