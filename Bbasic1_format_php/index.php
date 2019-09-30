

<?php 
//STEPS FOR SELECTING/CREATING ROWS FROM A TABLE
//STEP1: make a connection to the DB


include 'db_connect.php';

;// CREATING ROWS
if (isset($_POST["user_name"])) {
	$name = $_POST["user_name"]

	//STEP2: prepare query string for saving information
	$sql = "
	INSERT INTO
	`employees2` (`id`, `first_name`,`last_name`) VALUES (NULL, `$name`);
		";

	//STEP3: trigger sql query
	$insert_result = mysqli_query($CONNECTION, $sql);
}

// SELECTING STATEMENTS
//STEP2: prepare query string for execution
$sql = "
	SELECT 
		-- field list
		id as emp_id, 
		first_name as emp_name
	FROM 
		employees2";

//STEP3: trigger sql query
$result = mysqli_query($CONNECTION, $sql);

//STEP4: check the result
//STEP4.1: the query returned something
if ($result) {
	echo "The query returned => " . mysqli_num_rows($result);
	echo "<hr/>";

//STEP4.2: the query did not return anything so show error
} else {
	echo "We encountered an error! -> " . mysqli_error($CONNECTION);
	echo "<hr/>";

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="" method="POST">

	<h3>REGISTRATION FORM</h3>
		<h5> Fisrstname <!--space--> lastname    <!--space--> Phonemumber</h5>
		<input type="text" name="first_name"><input type="text" name="last_name"><input type="text" name="Phone_number">
		<br>
		<br>
		<input type="text" name="user_name">
		<br>
		<br>
		<input type="text" name="user_name">
		<br>
		<br>
		<input type="text" name="user_name">
		<style>
			input[type=submit] {
				background-color: #02b1e8;
				border: none;
				color: white;
				padding: 10px 30px;
				text-decoration: none;
				margin: 4px 2px;
				cursor: pointer;
				font-size:15px;
			}
		</style>
				</style>

		<br>
		<br>		
		<input  type="submit" value="REGISTER!">

	</form>
	<hr>

	<!-- STEP1: ensure that the query actually returned something. -->
	<?php  
		if ($result) {
	?>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>NAME</td>
			<td>-</td>
		</tr>

		<!-- STEP2: loop through all the rows returned by mysql -->
		<?php 
			while ($row = mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<!-- STEP3: display the associative array information -->
			<td><?php print_r($row["emp_id"]); ?></td>
			<td><?php print_r($row["emp_name"]); ?></td>
			<td>
				<button>UPDATING</button>
				<button>DELETING</button>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<?php
		}
	?>
</body>
</html>