<?php 
include 'db_connect.php';
session_start();


$_SESSION["is_logged_in"];
if (isset($_GET["logout"])) {
    unset($_SESSION["is_logged_in"]);
        header("Location: login.php");
    return fales;

}

if (isset($_SESSION["is_logged_in"])) {
    header("Location: home.php");
    return fales;

}
 var_dump($_POST);
if (isset($_POST["user_email"])) {
        $email = $_POST["user_email"];
        $password = $_POST["user_password"];
    $sql = "
    SELECT
    id
    FROM
    employees2
    WHERE
    email_address = '$email' 
    and
    password = '$password'
    ";
    var_dump($sql);
    
    $result = mysqli_query($CONNECTION, $sql);

    $num_rows = mysqli_num_rows($result);

    var_dump($num_rows );

    if ($num_rows > 0) {
         $_SESSION["is_logged_in"] = true;
         header("Location: home.php");
         return false;

     } 

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
    </head>
    <body class="text-center">
        <form class="form-signin" method="POST">
            <img class="mb-4" src="http://fdc-inc.com/images/fdc.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

            <div class="alert alert-danger" role="alert">
                Unable to login account! Please check your credentials!
            </div>

            <!-- email address -->
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <!-- passwprd -->
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="user_password" id="inputPassword" class="form-control" placeholder="Password" required>

            <div class="checkbox mb-3">
                <label>
                    <a href="register.php">
                        Sign up
                    </a>
                </label>
            </div>

            <!-- login button -->
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </body>
</html>