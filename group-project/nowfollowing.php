<?php 

require_once 'loginDB.php';

session_start();
$choice = $_GET['choice'];
$userID = $_SESSION['id'];

require_once "loginDB.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//example 10-3
$query = "Select * from groupsfollowing WHERE id=$userID"; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++){
    //$result->data_seek($j); 
    $row = $result->fetch_array(MYSQLI_ASSOC); 

  if ($choice == 1){
    $query = "UPDATE groupsfollowing set bts='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following BTS!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 2){
    $query = "UPDATE groupsfollowing set blackpink='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following BlackPink!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 3){
    $query = "UPDATE groupsfollowing set ioi='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following IOI!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 4){
    $query = "UPDATE groupsfollowing set itzy='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following ITZY!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 5){
    $query = "UPDATE groupsfollowing set ntchollywood='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following NTC Hollywood!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 6){
    $query = "UPDATE groupsfollowing set nmixx='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following nimxx!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 7){
    $query = "UPDATE groupsfollowing set traineea='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following Trainee A!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
  if ($choice == 8){
    $query = "UPDATE groupsfollowing set younite='1' where id = '$userID'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);

    echo "You are now following Younite!</br>";
    $link_address = "news.php";
    echo "<a href='".$link_address."'>Back to last page</a>";
  }
}

?>