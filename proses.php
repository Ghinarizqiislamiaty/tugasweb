<!DOCTYPE html>
<html>
<head>
	<title> tugas web </title>
</head>
<body>
	<?php
	require_once('koneksi.php');
	
	$koneksiObj = new Koneksi();
	$koneksi = $koneksiObj->getKoneksi();
	
	if($koneksi->connect_error){
		echo"gagal koneksi".$koneksi->connect_error;
	}
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		if($nama=='' || $username=='' || $email=='' || $password==''){
			echo" isi form dengan lengkap"; 
			echo" <a href='index.php'>kembali</a>";
		return;
		}
		$query="insert into tugas values('$id','$nama','$username','$email','$password')";
		if($koneksi->query($query)=== true ) {
			echo"data dengan nama ".$_POST["nama"]. " berhasil disimpan";
			
		}else{
			$koneksi->error;
			echo"data dengan nama ".$_POST["nama"]. " gagal disimpan";
			
		}
			$koneksi->close();
	?>
		<a href="index.php">kembali</a>
		<a href="data.php">lihat data</a>
		
</body>
</html>
