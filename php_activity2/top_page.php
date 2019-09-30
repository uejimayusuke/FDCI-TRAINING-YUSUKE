<?php
include "db_connect.php";

// - check if user is logged in!
if (!isset($_SESSION["is_logged_in"])) {
	// - if the user is not logged in, redirect to index page
	header("Location: index.php");
	return false;
}

echo "YOU ARE NOW LOGGED IN!";


if(isset($_GET["button_logout"])){
    unset($_SESSION["button_logout"]);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="get">
		<button type="submit" name="button_logout">LOGOUT!</button>
	</form>	
</body>
</html>

