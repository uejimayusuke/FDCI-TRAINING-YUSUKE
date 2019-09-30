<?php
// - sessions
session_start();

// - prepare database variables
$host = "localhost";
$user = "root";
$password = "123";
$dbname = "fdc_exercise";

// - establish connection
$CONNECTION = mysqli_connect(
			    $host,
			    $user,
			    $password,
			    $dbname
			);