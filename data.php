<!DOCTYPE html>
<html>
<head>
	<title> tugas web </title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Username</th>
				<th>Email</th>
				<th>Password</th>
				<th colspan="2">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include "./koneksi.php";
			
				$koneksiObj =new koneksi();
				$koneksi = $koneksiObj->getKoneksi();
				
				if($koneksi->connect_error) {
					echo "<tr><td>";
					echo "<p align='center'> Tidak ada data</p>";
					echo "</td></tr>";
				}
				
				$query ="select * from tugas order by nama";
				$data = $koneksi->query($query);
				
				if($data->num_rows <=0){
					echo "<tr><td colspan='5'>";
					echo "<p align='center'>Tidak ada data</p>";
					echo "</td></tr>";
				}else {
					while ($row = $data->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["nama"]. "</td>";
						echo "<td>" . $row["username"]. "</td>";
						echo "<td>" . $row["email"]. "</td>";
						echo "<td>" . $row["password"]. "</td>";
						echo '<td><a href="edit.php?id='. $row["id"] .'"><button type="button">Edit</button</a>';
						echo '<td><a href="delete.php?id='. $row["id"] .'"><button type="button">Hapus</button</a>';
						
						echo "</tr>";
					}
				}
				$koneksi->close();
			?>
		</tbody>
	</table>
</body>
</html>
