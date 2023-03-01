<html>
    <head>
        <title>Add an news article</title>
    </head>
    <body>
        <form method="POST" action="removenews.php">
            <label for="artid">Article ID:</label></br>
            <input type="text" name="artid"><br>
            <input type="submit" value="Remove Article"></br>
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
$id = $_POST['artid'];
$testid = 0;

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT id FROM news where id='$id'"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error
$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
	  {
		  $row = $result->fetch_array(MYSQLI_ASSOC);
		  $testid = $row['id'];
	  }

if(!$testid == 0){
    $query = "DELETE FROM news where id=$testid";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "Article no. $testid has a new article in the database!"; 
}
else{
    echo "Article ID doesn't exists";
}
      
/*
    $query = "INSERT INTO news (groupname,article) VALUES ('$gn','$text')";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "$gn has a new article in the database!"; */

?>