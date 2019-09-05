<?php 
include "db_connect.php";
$email = "";

// - if has login session
if (isset($_SESSION["is_logged_in"])) {
	header("Location: php3.php");
}

// - check if post exists
if (isset($_POST["email"])) {
	$email = $_POST["email"];
	$sql = "
		SELECT 
			* 
		FROM  
			`users` 
		WHERE  
			`email` LIKE  '$email'
	";

	// - get mysql result
	$result = mysqli_query($CONNECTION, $sql);

	// - count the number of rows return by the query
	$count = mysqli_num_rows($result);

	// - try to login
	if ($count > 0) {
		$_SESSION["is_logged_in"] = true;
		header("Location: php3.php");

	} else {
		echo "INVALID LOGIN INFORMATION!";

	}

	// - returns
	echo "The query returned => " . $count;
	echo "<hr/>";
}

$title = "COOOOL PAGE";

// - include header section of the page
include "header.php";
?>
<body>
	<form action="" method="POST">
		EMAIL:
		<input type="text" name="email" value="<?php echo $email; ?>">
		<input type="submit" value="LOGIN">
	</form>
	<a href="php2.php">REGISTER</a> 
	
	<hr>
	<!-- footer section -->
	<?php 
		if ($is_ios == true) {
			include "footer_ios.php";
		}

		if ($is_ios == false) {
			include "footer_android.php";
		}
	?>
</body>
</html>