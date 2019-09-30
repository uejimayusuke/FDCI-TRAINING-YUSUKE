<?php 
include 'db_connect.php';
session_start();
$_SESSION["test"] = ["123"];



// - if search term is present
if (isset($_GET["action"]) && ($_GET["action"] == "logout")) {
	unset($_SESSION["is_logged_in"]);
	header("Location: login.php");
	return false;
}

// - set to blank for now
$search_term = "";

// - if search term is present
if (isset($_GET["user_search_term"]) && !empty($_GET["user_search_term"])) {
	$search_term = $_GET["user_search_term"];
}

// - sql statement
$sql = "
	SELECT * FROM `employees2` WHERE first_name LIKE '%$search_term%'
	";

// - perform query
$result = mysqli_query($CONNECTION, $sql);

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
		<a href="index.php?action=logout">LOGOUT</a>

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
									<input type="text" class="form-control" name="user_first_name" placeholder="FIRST NAME">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Lastname</label>
									<input type="text" class="form-control" name="user_last_name" placeholder="LAST NAME">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Phone Number</label>
									<input type="text" class="form-control" name="user_phone" placeholder="PHONE NUMBER">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Email Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_email" placeholder="ENAIL ADDRESS">
							</div>
							<div class="form-group">
								<label for="inputAddress">Address</label>
								<input type="text" class="form-control" id="inputAddress" name="ADDRESS1" placeholder="1234 Main St">
							</div>
							<div class="form-group">
								<label for="inputAddress2">Address 2</label>
								<input type="text" class="form-control" id="inputAddress2" name="user_address_2" placeholder="ADDRESS2, studio, or floor">
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
						<!-- ACTIVITY 4 - SEARCH -->
						<div class="clearfix">
							<form class="form-inline" method="GET">
								<div class="input-group mb-3 col-12" style="padding-left: 0px; padding-right: 0px;">
									<input type="text" class="form-control" placeholder="Type something" aria-describedby="basic-addon2" name="user_search_term" value="<?php echo $search_term; ?>">
									<div class="input-group-append">
										<button class="btn btn-outline-secondary" type="submit">SEARCH</button>
									</div>
								</div>
							</form>
						</div>
						<!-- ACTIVITY 4 - SEARCH -->

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
								<?php while ($row = mysqli_fetch_assoc($result)) { ?>
								<tr>
									<th scope="row"><?php echo $row['id']; ?></th>
									<td><?php echo $row['first_name']; ?></td>
									<td><?php echo $row['last_name']; ?></td>
									<td><?php echo $row['email_address']; ?></td>
									<td><?php echo $row['phone_number']; ?></td>
									<td><?php echo $row['address1']; ?></td>
									<td style="width: 150px;">
										<div class="btn-group" role="group" aria-label="Basic example">
											<form method="POST" action="">
												<button type="submit" class="btn btn-warning">UPDATE</button>
											</form>
											<form method="POST" action="">
												<button type="submit" class="btn btn-danger">DELETE</button>
											</form>
										</div>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>