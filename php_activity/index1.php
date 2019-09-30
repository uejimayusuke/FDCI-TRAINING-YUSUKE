

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
$email = $_POST [''];
$Address1 = $_POST ['user_address_1'];
$Address2 = $_POST ['user_address_2'];



$sql = "
INSERT INTO 
`employees2` 
(`id`,`first_name`,`last_name`,`phone_number`,`email_address`,`address1`,`address2`, `register_date`) 

VALUES 
(NULL, '$first_name','$last_name','$phone_number','$email','$Address1','$Address2', '" . date("Y-m-d") . "');
";


	//STEP3: trigger sql query
$insert_result = mysqli_query($CONNECTION, $sql);
var_dump($insert_result);
var_dump(mysqli_error($CONNECTION));

}


if (isset($_POST["delite_id"])) {
  echo "delete";
  $user_id=$_POST["delite_id"];
  $delete = "
  DELETE
  from
  `employees2`
  where
  id = $user_id
  ";
  var_dump($_POST);
  $delite_result = mysqli_query($CONNECTION,$delete);
}



if (isset($_POST["update_id"])) {
    $update_id=$_POST["update_id"];
    $first_name=$_POST["update_first_name"];
    $last_name=$_POST["update_last_name"]; 
    $phone_number=$_POST["update_phone_number"];
    $address1=$_POST["update_address1"];
    $email_address=$_POST["update_email_address"];
    $update= "
    UPDATE
    `employees2`
    SET 
        first_name ='$first_name',
        last_name ='$last_name',
        phone_number ='$phone_number',
        address1 ='$address1',
        email_address ='$email_address'
    where id = $update_id;";

  
    $update_result = mysqli_query($CONNECTION, $update);
  var_dump(mysqli_error($CONNECTION));
    var_dump($update);
    var_dump($_POST);
}


    $search ="";
    if (isset($_GET["user_search_term"])) {
    $search =$_GET["user_search_term"]; 


     } 



$spl ="
    SELECT 
        * 
    from 
        employees2 
    where 
        first_name LIKE '%$search%' OR
        last_name LIKE '%$search%' OR
        phone_number LIKE '%$search%' OR
        address1 LIKE '%$search' OR
        email_address LIKE '%$search%'
    ";


$get_result = mysqli_query($CONNECTION, $spl);
	//var_dump($get_result);
	//var_dump(mysqli_error($CONNECTION));
	//header("Location: index.php");
	//return;




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
									<input type="text" class="form-control" name="user_first_name" placeholder="Firstname">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Lastname</label>
									<input type="text" class="form-control" name="user_last_name" placeholder="Lastname">
								</div>
								<div class="form-group col-md-4">
									<label for="inputPassword4">Phone Number</label>
									<input type="text" class="form-control" name="user_phone" placeholder="(Phone Number">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Email Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_email" placeholder="Email Address">
							</div>
							<div class="form-group">
								<label for="inputAddress">Address</label>
								<input type="text" class="form-control" id="inputAddress" name="user_address_1" placeholder="Address">
							</div>
							<div class="form-group">
								<label for="inputAddress2">Address 2</label>
								<input type="text" class="form-control" id="inputAddress2" name="user_address_2" placeholder="Address 2">
							</div>
							<button type="submit" class="btn btn-primary">REGISTER</button>
						</form>
					</div>
				</div>
			</div>
		</header>
		<!-- ACTIVITY 4 - SEARCH もし何もPOST やGETがない場合自動的にGETニナリマス-->
        <div class="clearfix">
            <form class="form-inline">
                <div class="input-group mb-3 col-12" style="padding-left: 0px; padding-right: 0px;">
                    <input type="text" class="form-control" placeholder="Type something" aria-describedby="basic-addon2" name="user_search_term">
                    <input type="date" name="userdatesearch">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">SEARCH</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- ACTIVITY 4 - SEARCH -->
    1
    


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

                            <form action="" method="post">  
                                <input type="text" name ="update_id" value="<?php print($row["id"]); ?>">
                                <input type="text" name ="update_first_name" value="<?php print($row["first_name"]); ?>">
                                <input type="text" name ="update_last_name" value="<?php print($row["last_name"]); ?>">
                                <input type="text" name ="update_email_address" value="<?php print($row["email_address"]); ?>"><input type="text" name ="update_phone_number" value="<?php print($row["phone_number"]); ?>">
                                <input type="text" name ="update_address1" value="<?php print($row["address1"]); ?>">
                                <button type="submit" class="btn btn-warning" method= "post">UPDATE</button>
                            </form>


                            <form action="" method= "post">
                              <input type="text" name ="delite_id" value="<?php print($row["id"]); ?>">
                              <button type="submit" class="btn btn-danger" method= "post">DELETE</button>
                          </form>

                      </div>
                  </td>
              </tr>
              <?php ;} ?>

               <!-- SESSIONを使うと情報がログアウトされるまでキープされる -->
                            


          </tbody>
      </table>
  </div>
</div>
</div>
</div>
</div>
</body>
</html>