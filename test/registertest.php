<?php 
include 'db_connect.php';

//   if (isset($_POST["update_id"])) {
//       $update_id=$_POST["
//       "];
//       $first_name=$_POST["update_first_name"];
//       $last_name=$_POST["update_last_name"];
//       $phone_number=$_POST["update_phone_number"];
//       $password=$_POST["update_password"];
//       $update="
//       UPDATE
//        'employees2'
//        SET
//        first_name=`$first_name`,
//        last_name=`$last_name`,
//        phone_number=`$phone_number`,
//        password=`$password`
//        WHERE id = $update_id;";



  
//     $update_result = mysqli_query($CONNECTION, $update);
//   var_dump(mysqli_error($CONNECTION));
//     var_dump($update);
//     var_dump($_POST);
// }


if (isset($_POST["user_first_name"]) &&
    isset($_POST["user_last_name"]) &&
    isset($_POST["user_phone"]) &&
    isset($_POST["user_password"]) 
) {
    $first_name = $_POST['user_first_name'];
    $last_name = $_POST['user_last_name'];
    $phone_number = $_POST['user_phone'];
    $password = $_POST['user_password'];

    $sql = "
    INSERT INTO
    `employees2`
    (`id`,`first_name`,`last_name`,`phone_number`,`password`) 
    VALUES 
(NULL, '$first_name','$last_name','$phone_number','$password');
";

$insert_result = mysqli_query($CONNECTION, $sql);
var_dump($insert_result);
var_dump(mysqli_error($CONNECTION));
die();
}


 ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>Signin Template for Bootstrap</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">

        <style type="text/css">
            .form-signin input {
                border-radius: 2px !important;
                margin-bottom: 10px !important;
            }
        </style>
    </head>
    <body class="text-center">
        <form class="form-signin" method="POST">
            <img class="mb-4" src="http://fdc-inc.com/images/fdc.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please create a new account</h1>
            
            <div class="alert alert-danger" role="alert">
                Unable to register! Please check the form below!
            </div>
            <input type="text" name ="user_first_name" class="form-control" placeholder="Firstname" required>
            <input type="text" name ="user_last_name" class="form-control" placeholder="Lastname" required>
            <input type="text" name ="user_phone" class="form-control" placeholder="Email" required>
            <input type="password" name ="user_password" class="form-control" placeholder="Password" required>
            <input type="password" name ="confirm_password" class="form-control" placeholder="Confirm Password" required>

             <div class="checkbox mb-3">
                <label>
                    <a href="login.php">
                        Sign in
                    </a>
                </label>
            </div>

            <!-- login button -->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        </form>
    </body>
</html>

