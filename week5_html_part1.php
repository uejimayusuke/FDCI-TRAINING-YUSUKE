<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Please input your name:</h3>
	<form action="week5_html_part1.php" method="POST">
		
	<input type="text" name="name" value="<?php echo $num1 ?>">
	<input type="submit" name="i">

	</form>
</body>
</html>


    
<?php
    $name = "";
    if (isset($_POST["name"])) {
       $name = $_POST["name"];
    }

echo "$name";
 ?>