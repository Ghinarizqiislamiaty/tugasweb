<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
<script>
function testInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp("[a-zA-Z \b]");
   return pattern.test(value);
}
function nospecial(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp("[a-zA-Z0-9\b]");
   return pattern.test(value);
}
</script>

</head>
<body>
<div class="container">
<br>
<h2>Edit Data </h2>
	<hr>
	<?php
		include('koneksi.php');

		if($_GET['id']!=null){
			$nama = $_GET['id'];

			$koneksiObj = new Koneksi();
			$koneksi = $koneksiObj->getKoneksi();

			if($koneksi->connect_error){
				echo "Gagal Koneksi : ". $koneksi->connect_error;
			}

			$query = "select * from tugas";
			$data = $koneksi->query($query);

		}
	?>

	<?php
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan";
        } else{
            while($row = $data->fetch_assoc()){
			$id    = $row['id'];
			$nama 	= $row['nama'];
			$username   = $row['username'];
			$password   = $row['password'];
			$email = $row['email'];
            }
        }
    ?>
	
	<form method="POST" action="update.php">
		<table>
			<tr>
				<input type="hidden" name="id" id="id"/>
				<td>nama</td>
				<td><input type="text" onkeydown="return testInput(event);" name="nama" id="nama"  value="<?php echo $nama;?>"/></td>
			</tr>
				<tr>
				<td>username</td>
				<td><input type="text" onkeydown="return nospecial(event);" name="username" id="username"  value="<?php echo $username;?>"/></td>
			</tr>
				<tr>
				<td>email</td>
				<td><input type="email" name="email" id="email"value="<?php echo $email;?>"/></td>
			</tr>
				<tr>
				<td>password</td>
				<td><input type="password" name="password" id="password" value="<?php echo $password;?>"/></td>
			</tr>	
		</table>
		<input type="submit" value="simpan"/>
	</form>
</body>
</html>