<!DOCTYPE html>
<html>
<head>

</head>
<body>
<br>

	<?php
		include "koneksi.php";

		$koneksiObj = new koneksi();
		$koneksi = $koneksiObj->getKoneksi();
		


		if($koneksi->connect_error) {
			echo "gagal koneksi : ".$koneksi->connect_error;
		}else {
			echo "";
		}

		$qry = "delete from tugas where id=" . $_GET["id"];
		

		if($koneksi->query($qry) === true) {
			echo "<h5>Data  Berhasil Dihapus</h5>";
		}else {
			echo "<h5> Data Gagal Dihapus</h5>";
		}
		//untuk melakukan penghapusan data di database melalui bahasa Php. 

		$koneksi->close();
	?>
		<br>
		<a href="data.php"> Lihat Data </a>

</body>
</html>
