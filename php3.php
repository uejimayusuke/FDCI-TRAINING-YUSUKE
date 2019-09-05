<?php 
include "db_connect.php";

if (isset($_GET["action"]) && $_GET["action"] == "logout") {
	unset($_SESSION["is_logged_in"]);
	header("Location: php1.php");
}

// - title
$title = "TOP PAGE";

// - include header section of the page
include "header.php";
?>
<body>
	<a href="php3.php?action=logout">LOGOUT</a>
	this is the top page!!

	
</body>
</html>