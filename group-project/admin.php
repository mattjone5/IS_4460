<?php

session_start();
if(isset($_SESSION['username'])){
	if(!$_SESSION['admin']){
		header('Location: index.php');
	}
}
else{
	header('Location: index.php');
}

// importing DB configs
require_once "loginDB.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//example 10-3
$query = "Select * from customer"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

$rows = $result->num_rows;

echo "<h1>Content of customers</h1>";

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	ID: $row[id]
	Username: $row[username]
	Password: $row[password]
	First Name: $row[firstName]
	Last Name: $row[lastName]
	Birthday: $row[birthday]
	Email: $row[email]	
	</pre>

	
_END;

}

$query = "Select * from loginlogout"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

$rows = $result->num_rows;

echo "<h1>Content of loginlogout</h1>";

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	ID: $row[id]
	Username: $row[username]
	Type: $row[type]
	DateTime: $row[datetime]
	</pre>
	
_END;

}

$link_address = "index.php";
$link_address2 = "addadmin.php";
$link_address3 = "addnewsart.php";
$link_address4 = "removenews.php";
echo "<a href='".$link_address."'>Back to main page</a></br>";
echo "<a href='".$link_address2."'>Add an Admin</a></br>";
echo "<a href='".$link_address3."'>Add an News Article</a></br>";
echo "<a href='".$link_address4."'>Remove a News Article</a></br>";


$conn->close();


?>
