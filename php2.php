<?php 
include "db_connect.php";

// - title
$title = "REGISTRATIONs";

// - include header section of the page
include "header.php";
?>
<body>
	<a href="php1.php">LOGIN</a>
	
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