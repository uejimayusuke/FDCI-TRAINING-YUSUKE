
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h3>Please input your name:</h3>
	<form action="index2.php" method="POST">
		
	Fullname :<input type="text" name="name">
	<br>
	<br>
	Password :<input type="password" name="pwd">
	<br>
	<br>	
	Firstname:<input type="text" name="FirstName">
	<br>
	<br>
	Lastname :<input type="text" name="LastName">
	<br>
	<br>
	E-mail   :<input type="email" name="emailaddress">
	<br>
	<br>
	Birthdate   :<input type="date" name="Birthdate">
	<br>
	<br>
	Present Address: :<input type="text" name="Address">
	<br>
	<br>
	Gender:
	<br>
	Female:<input type="checkbox" name="female">
	Male:<input type="checkbox"name="male">
	<br>
	<br>
	<input type="checkbox" name="conformation" value="true">Please make my information private
	<br>
	<br>
	<input type="submit" name="i"  value="SUBMIT">
  


	</form>
</body>
</html>


    
<?php
   if (isset($_POST["SUBMIT"]) && $_POST["private"] == "true") {
   echo "user wants information to be private";

   }elseif (isset($_POST["SUBMIT"])) {
   	echo "User Name:".$_POST["name"]."</br>";
   	echo "Password:".$_POST["pwd"]."</br>";
   	echo "First Name:".$_POST["FirstName"]."</br>";
   	echo "Last Name:".$_POST["LastName"]."</br>";
   	echo "Email:".$_POST["emailaddress"]."</br>";
   	echo "Birthdate:".$_POST["Birthdate"]."</br>";
   	echo "Present Address:".$_POST["Address"]."</br>";
   	if (isset($_POST["female"])) {
   		echo "Gender:".$_POST["female"];
   		}elseif(isset($_POST["male"])) {
   		 echo "Gender".$_POST["male"];
   		}else{
   			echo"Gender:Not selected";
   		}
   
   }
 ?>