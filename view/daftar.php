<?php
session_start();
$db = mysqli_connect("localhost","root","","db_ganteng");

if (isset($_POST['regiset_btr'])) {
	$username  =mysql_real_escape_string($_POST['usernameReg']);
	$email 	   =mysql_real_escape_string($_POST['email']);
	$Password  =mysql_real_escape_string($_POST['Password']);
	$password2 =mysql_real_escape_string($_POST['password2']);


	if ($password == $password2) {
	$password = md5($password);
	$sql = "INSERT INTO user(username,email,password)VALUES ('$username','$email','$password')";
	mysqli_query($db,$sql);
			$_SESSION['message'] = "You are Loggin";
			$_SESSION['username'] = $username;
			header("location: http://localhost/mvc2/mvc/view/login.php");
	}else{
		$_SESSION['message'] = "The two Password do not match";

	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
	<div class="header">
		<h1>Silahkan Daftar Terlebih Dahulu</h1>
	</div>
	<form method="post" action="">
		<table>
			<tr>
				<td>Username :</td>
				<td><input type="text" name="usernameReg"></td>
			</tr>
			<tr>
				<td>Email :</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="password" name="Password"></td>
			</tr>
			<tr>
				<td>Password Ulang :</td>
				<td><input type="password" name="Password2"></td>
			</tr>
			<tr>
				<td><input type="submit" name="regiset_btr" value="Daftar"></td>
			</tr>
		</table>
	</form>
</body>
</html>