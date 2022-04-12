  <?php

// login variables

$host="localhost";
$user = "root";
$password = "";
$database="software engineering";

//connect to the database
$connection=mysqli_connect(
$host,
$user,
$password,
$database
) or die("could not connect");

 // if connection is established
 echo "connected    ";

 //check if POST variables exist

if(isset($_POST["firstname"])&&
  isset($_POST["lastname"])&&
  isset($_POST["username"])&&
  isset($_POST["password"])&&
  isset($_POST["confirmpassword"])) {



//Retrieve variables from Post array
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$username=$_POST["username"];
$password=MD5($_POST["password"]);
$confirmpassword=md5($_POST["confirmpassword"]);

if(empty($firstname) || empty($lastname) || empty($username) || empty($password) ||
    empty($confirmpassword) )
{
    echo "You did not fill out the required fields.";
} else {

 if($password != $confirmpassword){
	  echo " passwords do not match";
  } else{
	 
	 
$result = mysqli_query($connection,"SELECT * FROM user WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	echo "   username not available    ";
	} else {
	$sql="INSERT INTO user (firstname,lastname,username,password)". "VALUES ('$firstname','$lastname','$username','$password' )";

//EXECUTE INSERT QUERY
$execResult=mysqli_query($connection, $sql);

// check if query was successful
if(!$execResult) {
	echo " an error occured and the user could not be created";
}
else {
	echo"user created successfully";
}
  }
  }
  }

	}

 ?>



<!DOCTYPE html>

<html>

<head>

	<title> Sign Up  </title>
  
	<link rel="stylesheet" type="text/css" href="main.css"/>
     <link rel="stylesheet" type="text/css" href="css/style0.css" />
        <link rel="stylesheet" type="text/css" href="css/style2.css" />
	<style type="text/css">

	


	</style>

</head>

<body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 07</span></li>
            <li><span>Image 08</span></li>
            <li><span>Image 09</span></li>
            <li><span>Image 10</span></li>
            <li><span>Image 11</span></li>
            <li><span>Image 12</span></li>
        </ul>
        <div class="container">

	

	<center><big> Sign Up </big>
	<p><big> Already have an account ??  </big> <a href="login.php">   Log In  </a> </p></center>

	<div><form action="" method="POST">

		    <center> <big>FIRSTNAME</big> <label></label></center>
		 <center><input type="text" name="firstname" ><br></center>

		    <center> <big>LASTNAME </big><label></label></center>
		 <center><input type="text" name="lastname"><br></center>

		    <center> <big>USERNAME</big><label></label></center>
		 <center><input type="text" name="username"><br></center>

		    <center><big>PASSWORD</big><label></label></center>
		 <center><input type="password" name="password"><br></center>

		    <center><big> CONFIRM PASSWORD </big><label></label></center>
		 <center><input type="password" name="confirmpassword"><br> </div></center>

		<br> <br><center><input type="submit" value="Register"></center>
	</form>

</body>


</html>