<!DOCTYPE html>
<html>
<head>
	<title> tugas web </title>
</head>
<body>
	<form method="POST" action="proses.php">
		<table>
			<tr>
				<input type="hidden" name="id" id="id"/>
				<td>nama</td>
				<td><input type="text" name="nama" id="nama" onkeydown="return testInput(event);"/></td>
			</tr>
				<tr>
				<td>username</td>
				<td><input type="text" name="username" id="username" onkeydown="return nospecial(event);"/></td>
			</tr>
				<tr>
				<td>email</td>
				<td><input type="email" name="email" id="email"/></td>
			</tr>
				<tr>
				<td>password</td>
				<td><input type="password" name="password" id="password"/></td>
			</tr>	
		</table>
		<input type="submit" value="simpan"/>
	</form>
	
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
</body>
</html>
