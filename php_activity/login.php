<?php 
include 'db_connect.php';

session_start();
$_SESSION["is_logged_in"];

if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"] == true) {
	header("Location: index.php");
	return false;
}

// - if has email, try to login
if (isset($_POST["user_email"])) {
	$email = $_POST["user_email"];

	// - sql statement
	$sql = "
			SELECT 
				id
			FROM 
				`employees2`
			WHERE 
				email_address = '$email'
		";

	// - perform query
	$result = mysqli_query($CONNECTION, $sql);

	// - get rows
	$num_rows = mysqli_num_rows($result);

	// - if the query returned more than 0 result, go to the index page
	if ($num_rows > 0) {
		$_SESSION["is_logged_in"] = true;
		header("Location: index.php");
		return false;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>EMPLOYEE MGT</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<!-- main container class -->
	<div class="container" style="padding-top: 15px;">
		<!-- jumbotron section -->
		<div class="jumbotron" style="margin-bottom: 15px; padding: 1rem 2rem;">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h1>- EMPLOYEE MGT -</h1>
				</div>
			</div>
		</div>
		
		<!-- header section -->
		<header class="row">
			<div class="col-sm-12">
				<!-- error message -->
				<div class="alert alert-danger" role="alert">
					Unable to login!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
				<!-- registration form -->
				<div class="card">
					<div class="card-header">
						LOGIN FORM
					</div>
					<div class="card-body">
						<form method="POST" action="">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Email</label>
									<input type="text" class="form-control" name="user_email" placeholder="NAME">
								</div>
								<!-- <div class="form-group col-md-6">
									<label for="inputPassword4">Password</label>
									<input type="password" class="form-control" name="user_last_name" placeholder="Doe">
								</div> -->
							</div>
							<button type="submit" class="btn btn-primary">LOGIN</button>
						</form>
					</div>
				</div>
			</div>
		</header>
	</div>
</body>
</html>