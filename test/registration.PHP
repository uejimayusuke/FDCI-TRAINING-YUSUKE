<?php 
require_once('config.php'); 
 ?>

<!DOCTYPE html> 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Registration | PHP  </title>
	<link rel="stylesheet" href="scc/bootsrap.min.css">
</head>
<body>
	<div>
		<?php  
		if (isset($_POST['create'])) {
			$firstname =$_POST["firstname"];
			$lastname =$_POST["lastname"];
			$email = $_POST["email"];
			$Phonenumber = $_POST["phonenumber"];
			$password = $_POST["password"];

			$sql = "INSERT INTO users (firstname, lastname,email,phonenumber,password)VALUES(?,?,?,?,?)";
			$stmtinsert =$db->prepare($sql);
			$result = $stmtinsert->execute([$firstname,$lastname,$email,$phonenumber,$password]);
		} ?>

	</div>
	<div>
		<form action="register.php" methot="POST">
			<div class="container">

				<div class="row">

					<div class="col-sm-3">
						<h1>Registration</h1>
						<p>Fill pu the form with corerct values </p>

						<label for="firstname"><b>First name</b></label>
						<input class="form-control  " type="text" name="firstname" required>

						<label for="lastname"><b>Last name</b></label>
						<input class="form-control" type="text" name="lastname" required>

						<label for="email"><b>Email</b></label>
						<input class="form-control" type="email" name="email" required>

						<label for="firstname"><b>Phonenumber</b></label>
						<input class="form-control" type="text" name="phonenumber" required> 

						<label for="password "><b>Password</b></label>
						<input class="form-control"8 type="text" name="password" required> 

						<input type="submit" name="create" value="Sign up">
					</div>
				</div>	
			</div> 
		</form>
	</div>

</body>
</html>