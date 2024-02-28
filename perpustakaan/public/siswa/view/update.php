<?php  
	include_once("../../../config/koneksi.php");
	include_once("../Controller/siswaupdate.php");

	$siswaController = new SiswaController($kon);

	if (isset($_POST['update'])) {
		$idsiswa = $_POST['idsiswa'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$no_hp = $_POST['no_hp'];
		$users_id= $_POST['users_id'];

		$message = $siswaController->updateSiswa($idsiswa, $nama, $alamat, $email, $no_hp, $users_id);
		echo $message;

		header("Location: ../../dashboard/data/dashboardsiswa.php");
	}

	$idsiswa = null;
	$nama = null;
	$alamat = null;
	$email = null;
	$no_hp = null;
	$users_id= null; 

	if (isset($_GET['idsiswa']) && is_numeric($_GET['idsiswa'])) {
		$idsiswa = $_GET['idsiswa'];
		$result = $siswaController->getDataSiswa($idsiswa);

		if ($result) {
			$idsiswa = $result['idsiswa'];
			$nama = $result['nama'];
			$alamat = $result['alamat'];
			$email = $result['email'];
			$no_hp = $result['no_hp'];
			$users_id= $result['users_id'];
		} else{
			echo "ID Tidak Valid.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Update Siswa</title>
	<link rel="stylesheet" href="../../css/output.css">
    <style>
        /* Style untuk judul tabel */
        h1 {
            text-align: center;
            color: #020617;
            font-weight: bold;
            margin-bottom: 20px; /* Margin bawah sedikit diperkecil */
            font-size: 30px; /* Ukuran judul lebih kecil */
        }

        nav {
            display: flex;
            justify-content: left; /* Pusatkan item ke tengah */
            align-items: left; /* Pusatkan item secara vertikal */
            margin-bottom: 10px; /* Jarak antara navbar dan judul */
            width: 100%; /* Lebar nav mengisi keseluruhan */
        }

        nav a {
            padding: 10px 20px;
            margin-right: 15px;
            color: #1a365d; /* Warna biru tua */
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            background-color: #e2e8f0; /* Warna latar belakang */
            border: 2px solid #4299e1; /* Warna border */
            border-radius: 4px; /* Bentuk sudut */
        }

        /* Hover effect */
        nav a:hover {
            background-color: #4299e1; /* Warna latar belakang saat hover */
            color: #fff; /* Warna teks saat hover */
        }

        /* Style untuk form */
        form {
            margin-top: 10px; /* Margin atas sedikit diperkecil */
            text-align: center; /* Pusatkan teks */
            flex-wrap: wrap; /* Mengatur wrap agar tombol submit turun ke bawah pada layar kecil */
        }

        table {
            width: 25%; /* Lebar tabel lebih diperkecil */
            margin: 0 auto; /* Menengahkan tabel */
            border-collapse: collapse;
            margin-bottom: 10px; /* Margin bawah sedikit diperkecil */
        }

        table, th, td {
            border: 1px solid #020617;
            padding: 4px; /* Padding sedikit diperkecil */
        }

        input[type=text] {
            width: 100%;
            padding: 4px; /* Padding sedikit diperkecil */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 2px; /* Margin atas dan bawah sedikit diperkecil */
            margin-bottom: 8px; /* Margin atas dan bawah sedikit diperkecil */
            font-size: 14px; /* Ukuran teks sedikit diperkecil */
        }

        input[type=submit] {
            background-color: #4299e1;
            color: white;
            padding: 6px 12px; /* Padding sedikit diperkecil */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px; /* Ukuran teks sedikit diperkecil */
        }

        input[type=submit]:hover {
            background-color: #3182ce;
        }

        .success-message {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 4px;
            margin-top: 6px; /* Margin atas sedikit diperkecil */
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 14px; /* Ukuran teks sedikit diperkecil */
        }
        th:first-child {
            color: #020617; /* Warna teks putih */
        }

        td {
            font-weight: bold;
            background-color: #4299e1; /* Warna latar belakang biru muda */
        }

        td {
            font-size: 16px;
        }
        /* Style untuk sel yang sejajar dengan ID Buku */
        td:first-child,
        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4),
        td:nth-child(5),
        td:nth-child(6),
        td:nth-child(7) {
            color: #020617; /* Warna teks Hitam */
        }
        /* Style untuk tombol update */
        .update-button {
            text-align: center;
            margin-top: 20px;
        }

        .update-button input[type=submit] {
            width: auto; /* Mengembalikan lebar tombol ke ukuran default */
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-4"> 
	<h1>Update Data Siswa</h1>
	<nav>
        <a href="../../dashboard/data/dashboardsiswa.php">Home</a>
    </nav>
	<form action="update.php" method="POST", name="update", enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>ID Siswa</td>
				<td><input class="input_data_1" type="text" name="idsiswa" value="<?php echo $idsiswa ?>" readonly></td>
			</tr>
			<tr>
				<td>Nama Siswa</td>
				<td><input class="input" type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input class="input" type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input class="input" type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input class="input" type="text" name="no_hp" value="<?php echo $no_hp; ?>"></td>
			</tr>
			<tr>
				<td>ID User</td>
				<td><input class="input" type="text" name="users_id" value="<?php echo $users_id; ?>"></td>
			</tr>
		</table>
		<div class="update-button">
            <input type="hidden" name="idsiswa" value="<?php echo $idsiswa; ?>">
            <input type="submit" name="update" value="Update">
        </div>
	</form>
	</div>
</body>
</html>