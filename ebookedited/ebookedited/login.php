<?php
session_start();
$conn = mysqli_connect("localhost","root","","software engineering");
	
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM user WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["id"] = $row['id'];
	header("location:index.php");
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8" />
       
		<title> Turk Log In  </title>

    <link rel="stylesheet" href="main.css"/>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
      <style type="text/css">



  </style>

        
         
       
		
    </head>
    <body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>
        <div class="container">
            
            <header>
			<center><h1> Log In </h1>
  <p> New here ? <a href="SignUp.php"> Sign up </a> </p></center>
<?php if(empty($_SESSION["user_id"])) { ?>
<form action="" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<center><big>USERNAME</big><label></label></center>
		<center><div><input name="username" type="text" class="input-field"></div></center>
	</div>
	<center><div class="field-group">
		<center><big>PASSWORD</big><label></label></center>
		<center><div><input name="password" type="password" class="input-field"> </div></center>
	</div></center>
	<center><div class="field-group">
		<center><div><center><input type="submit" name="login" value="Login" class="form-submit-button"></span></div></center>
	</div> </center>      
</form>
<?php 
} else { 
$result = mysqlI_query($conn,"SELECT * FROM users WHERE user_id='" . $_SESSION["user_id"] . "'");
$row  = mysqli_fetch_array($result);
?>
<form action="" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo ucwords($row['display_name']); ?>, You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>
</div>
</div>
<?php } ?>
</body></html>