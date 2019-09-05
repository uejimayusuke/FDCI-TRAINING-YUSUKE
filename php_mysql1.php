<?php 
// - server information
$host = "localhost";
$user = "root";
$password = "123";
$dbname = "fdc_exercise";
$conn = mysqli_connect($host, $user, $password, $dbname);// - Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}	
// - query
$sql = "
SELECT first_name as First_name ,last_name as Lastname
from employees;";
$result = mysqli_query($conn, $sql);

echo "The query returned => " . mysqli_num_rows($result);
echo "<hr/>";
?>

<table border="1">
	<tr>
		<td>Firstname</td>
		<td>lastname</td>
		<td></td>
		<td></td>
	</tr>
	<?php while($row = mysqli_fetch_assoc($result)) { ?>
		<tr>
			<td><?php var_dump($row["First_name"]); ?></td>
			<td><?php var_dump($row["Lastname"]); ?></td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php } ?>
</table>