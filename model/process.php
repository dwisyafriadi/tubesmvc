<?php
$username = $_POST['username'];
$password = $_POST['password'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

//koneksi
mysql_connect("localhost","root","");
mysql_select_db("db_ganteng");

$result =  mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'")or die ("Failed input kedatabase ".mysql_error());


$row = mysql_fetch_array($result);
if ($row['username']== $username && $row['password'] == $password) {
	echo "Login Sukses ".$row['username'];
	header("Location: http://localhost/mvc2/mvc/index.php?controller=controller&fungsi=baca");
}else{
	echo "Gagal login";
}
?>