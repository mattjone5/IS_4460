<?php
//import credentials for db
require_once  'loginDB.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
session_start();
    // LOGINLOGOUT QUERY
    $date = date('d-m-y h:i:s');
     
    $tmp_username = $_SESSION['username'];
    $query = "INSERT INTO loginlogout (username, type, datetime) VALUES ('$tmp_username','out','$date');";
	
  	$result = $conn->query($query); 
    if(!$result) die($conn->error);
session_destroy();
echo "<p><script>alert(\"You have logged out!\");</script></p>";
header('Location: index.php');
?>