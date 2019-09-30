

<?php 

error_reporting(E_ALL ^ E_WARNING); 
// - server information
$host = "localhost";
$user = "root";
$password = "123";
$dbname = "fdc_exercise";

// - creating connection
$CONNECTION = mysqli_connect(
			$host, 
			$user, 
			$password, 
			$dbname
		);
// - Check connection
if (!$CONNECTION) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "YOU HAVE AN ACTIVE DATABASE CONNECTION!!";
echo "<hr/>";