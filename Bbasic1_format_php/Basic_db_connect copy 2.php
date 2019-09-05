<?php 
session_start();

error_reporting(E_ALL ^ E_WARNING); 

// - server information
$host = "localhost";
$user = "root";
$password = "123";
$dbname = "fdc_exercise";

// - making a connection with a remote database
$CONNECTION = mysqli_connect($host, $user, $password, $dbname);

// - Check connection
if (!$CONNECTION) {
	die("Connection failed: " . mysqli_connect_error());
}

$is_ios = false;

?>