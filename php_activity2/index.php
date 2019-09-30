<?php
include "db_connect.php";
session_start()


//if (isset($_GET["user_name"])&&
//	isset($_POST["user_password"]) &&
//) {
//$user_name = $_POST ['user_name'];
//$user_password = $_POST ['user_password'];
//}


if(isset($_GET["button_logout"])){
	unset($_SESSION["loggedin"]);
}

var_dump($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="get">
		<input type="text" name="user_name">
		<input type="text" name="user_password">
		<button type="submit" name="button_login">LOGIN!</button>
		<button type="submit" name="button_logout">LOGOUT!</button>
	</form>
</body>
</html>