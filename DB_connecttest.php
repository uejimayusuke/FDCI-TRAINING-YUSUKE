<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>connect</title>
</head>
<body>
	testas
</body>
</html>

<?php 
error_reporting(E_ALL ^ E_WARNING); 
// - server information
$host = "localhost";
$user = "root";
$password = "123";
$dbname = "fdc_exercise";
$CONNECTION = mysqli_connect($host, $user, $password, $dbname);// - Check connection
if(!$conn){
        include("DB_fail.php");
    } else {
        include("DB_success.php");
    }

    include("DB_fail.php");
    ?>

