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
	<title>Welcome to Turk</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link  rel='stylesheet' type='text/css'>
</head>
<body >
<style>
body {
        background-image: url("7.jpg");
		h1{
			font-family: helvetica , sans-serif;
			font-size:40px;
		}
		a input[type=button]{
			border:1px solid gray ;
			border-radius:25px;
			width: 100%;
			padding: 20px
		}
} 
 
</style>

	<div class="header">
		<center><h2><a href="/">Turk</a></h2></center>
	</div>

	<?php if( !empty($user) ): ?>

		

	<?php else: ?>

		<center><h1> All the books you need </h1></center>
		<center><a href="login.php"><input type="button" value="LogIn" ></a><br><br> or</center>
		
		<br><br>
		<center><a href="SignUp.php"> <input type="button" value="Sign Up" ></a></center>
<section id="three" class="wrapper style1">
				<div class="container">
               <div class="row">
		<div class="4u 6u$(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/$30,000.jpg" alt="" /></a>
								<ul class="actions">
									<li><a href="books/Eoin Colfer-Artemis Fowl, Book 6 The Time Paradox (2008).pdf" class="button">Read</a></li>
								</ul>
							</article>
						</div>
						<div class="4u 6u(2) 12u$(3)">
							<article class="box post">
								<a href="#" class="image fit"><img src="images/bts.jpg" alt="" /></a>
								<ul class="actions">
									<li><a href="books/John Grisham-The Broker-Doubleday (2005).pdf" class="button">Read</a></li>
								</ul>
							</article>
						</div>
						</div>
						</section>
	<?php endif; ?>

</body>
</html>