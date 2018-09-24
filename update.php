<!DOCTYPE html>
<html>
<head>

</head>
<body>
<br>
	<?php
		require_once('koneksi.php');

		$koneksiObj = new Koneksi();
		$koneksi = $koneksiObj->getKoneksi();

		if($koneksi->connect_error){
			echo "Gagal Koneksi : ". $koneksi->connect_error;
		}
		$id 	= $_POST['id'];
		$nama 	= $_POST['nama'];
		$username   = $_POST['username'];
		$password   = $_POST['password'];
		$email = $_POST['email'];

		$query = "update tugas set nama = '$nama', username = '$username', password = '$password', email = '$email'";
				

		if($nama=='' || $username=='' || $password=='' || $email==''){
			echo " isi form dengan lengkap<br>";
			echo '<a href="index.php">Kembali</a>';
		return;
		}

		//echo "<br>".$query;
		//mengedit sebuah data dari database yang kemudian di edit menggunakan bahasa pemrograman Php berupa WEB

		if($koneksi->query($query) === true) {
			echo "Data Dengan Nama " .$_POST["nama"]. " Berhasil Diubah";
		}else{
			$koneksi->error;
			echo "Data Dengan Nama " .$_POST["nama"]. " Gagal Disimpan";
		}

		$koneksi->close();
	?>
	<br>
	<a href="input.php">Tambah Data</a>
	<a href="data.php">Lihat Data</a>
</body>
</html>
