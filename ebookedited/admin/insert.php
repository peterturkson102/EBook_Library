<?php

//login variables
$host="localhost";
$user="root";
$password="";
$database="library";


//connect to database store the connection
$mysqli = mysqli_connect(
$host,
$user,
$password,
$database
) or die("could not connect");
echo "connected     ";

$isbn   = $_POST['isbn'];
$title  = $_POST['title'];
$author = $_POST['author'];
$link   = $_POST['link'];


$query = "INSERT INTO books VALUES ('$isbn','$title','$author',
	'$link') ";

  //Execute insert query
    $execResult=mysqli_query($mysqli, $query);

    //Check if query was successful
    if (!$execResult) {
      echo "An error occured and the book could not be added ";
    }else{
      echo " Book added successfully";
    }

$mysqli -> query ( $query );
$mysqli -> close ();
?>
