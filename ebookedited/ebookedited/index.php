<?php

session_start();

require 'database.php';

if( isset($_SESSION['user_id']) ){

	$records = $conn->prepare('SELECT id,username,password FROM user WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$user = NULL;

	if( count($results) > 0){
		$user = $results;
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to G4</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link  rel='stylesheet' type='text/css'>
</head>
<body >
<style>
body {
        background-image: url("7.jpg");
} 
 
</style>

	<div class="header">
		<center><h2><a href="/">G4</a></h2></center>
	</div>

	<?php if( !empty($user) ): ?>

		

	<?php else: ?>

		<center><h1>Please Login or Sign Up</h1></center>
		<center><a href="login.php">Login</a> or</center>
		<center><a href="SignUp.php">Sign Up</a></center>

	<?php endif; ?>

</body>
</html>