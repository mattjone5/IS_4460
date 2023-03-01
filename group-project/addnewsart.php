<html>
    <head>
        <title>Add an news article</title>
    </head>
    <body>
        <form method="POST" action="addnewsart.php">
            <label for="gName">Group Name:</label></br>
            <input type="text" name="groupname"><br>
            <label for="article">Article:</label></br>
            <input type="text" name="art"><br>
            <input type="submit" value="Add News"></br>
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
$gn = $_POST['groupname'];
$text = $_POST['art'];

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


    $query = "INSERT INTO news (groupname,article) VALUES ('$gn','$text')";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "$gn has a new article in the database!";

?>