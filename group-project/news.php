<?php

// importing DB configs
require_once "loginDB.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//example 10-3
$query = "Select * from news "; //this is the query 
$result = $conn->query($query); //this will run the query
if(!$result) die($conn->error); //if result is false, pull up the error

$rows = $result->num_rows;


session_start();
if(!isset($_SESSION['username'])){
  header('Location: login.php');
}
$username = $_SESSION['username'];
$id = $_SESSION['id'];


$queryforGF = "Select * from groupsfollowing where id='$id'"; //this is the query 
$resultforGF = $conn->query($queryforGF); //this will run the query
if(!$resultforGF) die($conn->error); //if result is false, pull up the error

$rowsForGF = $resultforGF->num_rows;
echo <<<_END
<html>
    <head>
        <title>News</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </head>
    <body class="sub">
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar=header">
            <a class="navbar-brand" href="#" style="background-color:rgba(59, 53, 50, 0.151);">KPOP Stan Nation</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="login.php">Log in</a></li>
              <li><a href="signup.php">Sign Up</a></li>
              <li><a href="updateprofile.php">Update Profile</a></li>
              <li><a href="logout.php">Log Out</a></li>
            </ul>
          </li>
          <li><a href="kpopgroupsfam.php">Famous Kpop Groups</a></li>
          <li><a href="kpopgroupsnew.php">Newer Kpop Groups</a></li>
          <li><a href="recsongs.php">Recommended Songs</a></li>
          <li><a href="musicvideoliveperf.php">Music Videos</a></li>
          <li><a href="news.php">News</a></li>
          <li><a href="historyofkpop.php">History of KPOP</a></li>
          <li><a href="aboutus.php">About Us</a></li>
          <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </div>
</nav>
    </body>
</html>
_END;
/*
for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<p>
	Group: $row[groupname]
  Article: $row[article]
	</p>
	
} */

for($a=0; $a<$rowsForGF; $a++)
{
	//$result->data_seek($j); 
	$rowed = $resultforGF->fetch_array(MYSQLI_ASSOC); 

  if($rowed['bts'] == 1){
    $group = 'bts';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }

  }

  if($rowed['blackpink'] == 1){
    $group = 'blackpink';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }

  if($rowed['ioi'] == 1){
    $group = 'ioi';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }

  if($rowed['itzy'] == 1){
    $group = 'itzy';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }  

  if($rowed['ntchollywood'] == 1){
    $group = 'ntchollywood';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }

  if($rowed['nmixx'] == 1){
    $group = 'nmixx';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }

  if($rowed['traineea'] == 1){
    $group = 'traineea';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }

  if($rowed['younite'] == 1){
    $group = 'younite';
    $query = "Select * from news WHERE groupname='$group'"; //this is the query 
    $result = $conn->query($query); //this will run the query
    if(!$result) die($conn->error); //if result is false, pull up the error

    $rows = $result->num_rows;
    
    for($j=0; $j<$rows; $j++){
	    //$result->data_seek($j); 
	    $row = $result->fetch_array(MYSQLI_ASSOC); 

      echo "<p>
      $row[article]
	    </p>";
    }
  }
}

echo "<a href=\"nowfollowing.php?choice=1\">  <input type=\"submit\" value=\"Follow BTS\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=2\">  <input type=\"submit\" value=\"Follow BlackPink\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=3\">  <input type=\"submit\" value=\"Follow I.O.I\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=4\">  <input type=\"submit\" value=\"Follow ITZY\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=5\">  <input type=\"submit\" value=\"Follow HTC Hollywood\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=6\">  <input type=\"submit\" value=\"Follow nmixx\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=7\">  <input type=\"submit\" value=\"Follow Trainee A\"/> </a></br>";
echo "<a href=\"nowfollowing.php?choice=8\">  <input type=\"submit\" value=\"Follow Younite\"/> </a></br>";

$conn->close();


?>