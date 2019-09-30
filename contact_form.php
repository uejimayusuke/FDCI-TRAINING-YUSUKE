<?php 
include 'db_connect.php';

// 1
if (isset($_POST["user_first_name"]) &&
	isset($_POST["user_last_name"]) &&
	isset($_POST["user_phone"]) &&
	isset($_POST["user_email"]) &&
	isset($_POST["user_address_1"]) &&
	isset($_POST["user_address_2"]) 
) {
	$first_name = $_POST ['user_first_name'];
	$last_name  = $_POST ['user_last_name'];
	$phone_number=$_POST ['user_phone'];
	$email = $_POST ['user_email'];
	$Address1 = $_POST ['user_address_1'];
	$Address2 = $_POST ['user_address_2'];

	

		$sql = "
		INSERT INTO 
			`employees2` 
			(`id`,`first_name`,`last_name`,`phone_number`,`email_address`,`address1`,`address2`) 

			VALUES 
			(NULL, '$first_name','$last_name','$phone_number','$email','$Address1','$Address2');
		";


	//STEP3: trigger sql query
	$insert_result = mysqli_query($CONNECTION, $sql);
	var_dump($insert_result);
	var_dump(mysqli_error($CONNECTION));
   
}
$spl=
"SELECT *
FROM `employees2`
LIMIT 0 , 30";

	$get_result = mysqli_query($CONNECTION, $spl);
	var_dump($get_result);
	var_dump(mysqli_error($CONNECTION));

	
	
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
				<!-- success message -->
				<div class="alert alert-success" role="alert">
					An employee was registered!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
				<!-- error message -->
				<div class="alert alert-danger" role="alert">
					Unable to save employee!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				

				<!-- registration form -->
				<div class="card">
					<div class="card-header">
						REGISTRATION FORM
					</div>
					<div class="card-body">
						<form method="POST" action="">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="inputEmail4">Firstname</label>
									<input type="text" class="form-control" name="user_first_name" placeholder="John">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Lastname</label>
									<input type="text" class="form-control" name="user_last_name" placeholder="Doe">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Phone Number</label>
									<input type="text" class="form-control" name="user_phone" placeholder="(053)323354">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Email Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_email" placeholder="fdc@fdc.com">
							</div>
							<div class="form-group">
								<label for="inputAddress">Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_address_1" placeholder="1234 Main St">
							</div>
							<div class="form-group">
								<label for="inputAddress2">Address 2</label>
								<input type="text" class="form-control" id="inputAddress2" name="user_address_2" placeholder="Apartment, studio, or floor">
							</div>
							<button type="submit" class="btn btn-primary">REGISTER</button>
						</form>
					</div>
				</div>
			</div>
		</header>
		
		<!-- content section -->
		<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col" class="text-center">#</th>
									<th scope="col" class="text-center">First</th>
									<th scope="col" class="text-center">Last</th>
									<th scope="col" class="text-center">Email</th>
									<th scope="col" class="text-center">Phone</th>
									<th scope="col" class="text-center">Address</th>
									<th scope="col" class="text-center"></th>
								</tr>
							</thead>
							<tbody>
								<?php 
			while ($row = mysqli_fetch_assoc($get_result)) {
		?>
								<tr>
									<th scope="row"><?php print($row["id"]); ?></th>
									<td><?php print($row["first_name"]); ?></td>
									<td><?php print($row["last_name"]); ?></td>
									<td><?php print($row["email_address"]); ?></td>
									<td><?php print($row["phone_number"]); ?></td>
									<td><?php print($row["address1"]); ?></td>
									<td style="width: 150px;">
										<div class="btn-group" role="group" aria-label="Basic example">
											<button type="button" class="btn btn-warning">UPDATE</button>
											<button type="button" class="btn btn-danger">DELETE</button>
										</div>
									</td>
								</tr>
								<?php 
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>