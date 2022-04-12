<?php

$host="localhost";
$user="root";
$password="";
$database="library";

// Create connection
$conn = new mysqli($host, $user, $password ,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql = "SELECT * FROM books";

$result = $conn->query($sql);

$num = $result->num_rows;

$conn->close();
echo "<b>
<center>Database Output</center>
</b>
<br>
<br>";
$i=0;
while ($i < $num) {
$field1 =  $result-> mysql_result ($result,$i,"isbn");
$field2 = $result-> mysql_result ($result,$i,"title");
$field3 = $result-> mysql_result ($result,$i,"author");
$field4 = $result-> mysql_result ($result,$i,"link");

echo "<b>
$field1 $field2</b>
<br>
$field3 <br>
$field4 <hr>
<br>";
$i++;
}


?>
This outputs a list of all the values store