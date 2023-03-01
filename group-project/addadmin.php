<html>
    <head>
        <title>Add an Admin</title>
    </head>
    <body>
        <p>Add an Admin by username</p>
        <form method="POST" action="addadmin.php">
            <label for="userName">Username:</label></br>
            <input type="text" name="username"><br>
            <input type="submit" value="Add Admin"></br>
        </form>
    </body>
</html>

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

$username = $_POST['username'];
$id = 0;

//example 10-3
$query = "SELECT username FROM customer where username='$username'"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error
$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
	  {
		  $row = $result->fetch_array(MYSQLI_ASSOC);
		  $usernameFromDB = $row['username'];
	  }


      $query = "SELECT id FROM customer where username='$username'"; //this is the query 
      $result = $conn->query($query); //this will run the query
      if(!$result) die($conn->error); //if result is false, pull up the error
      $rows = $result->num_rows;
      
      for($j=0; $j<$rows; $j++)
            {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $id = $row['id'];
            }
if (!$id == 0){
    $query = "INSERT INTO admin VALUES ('$id','$username')";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "$username is now an admin!";
}
else{
    echo "Sorry that username doesn't exists";
}
?>