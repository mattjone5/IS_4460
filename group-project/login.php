<html>
<head>
    <title>Log In</title>
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
    <form method="POST" action="login.php">
        <label for="userName">Username:</label></br>
        <img src="./images/bts_login1.jpg" alt="Kpop Group BTS is standing in a place" class="right">
        <input type="text" name="username"></br>
        <label for="pword">Password</label></br>
        <input type="password" name="password"></br>
        <input type="submit" value='Login'></br>
        <a href="https://www.youtube.com/watch?v=NNv2RHR62Rs" target="_blank">forgot password?<span class="glyphicon glyphicon-question-sign"></span></a><br>
        <a href="signup.php">Create an account</a>
    </form>
</body>
</html>

<?php
require_once 'loginDB.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = mysql_entities_fix_string($conn, $_POST['username']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT * FROM customer WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}
	
	//Compare passwords
	if(password_verify($tmp_password, $passwordFromDB))
	{
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $tmp_username;
    $_SESSION['password'] = $tmp_password;
    $_SESSION['firstName'] = $row['firstName'];
    $_SESSION['lastName'] = $row['lastName'];
    $_SESSION['birthday'] = $row['birthday'];
    $_SESSION['email'] = $row['email'];

    $query = "SELECT username FROM admin WHERE username = '$tmp_username'";
	
  	$result = $conn->query($query); 
  	if(!$result) die($conn->error);
	
	  $rows = $result->num_rows;
	  for($j=0; $j<$rows; $j++)
	  {
		  $row = $result->fetch_array(MYSQLI_ASSOC);
		  $usernameFromDB = $row['username'];
	
	  }

    // LOGINLOGOUT QUERY
    $date = date('d-m-y h:i:s');
    $query = "INSERT INTO loginlogout (username, type, datetime) VALUES ('$tmp_username','in','$date');";
	
  	$result = $conn->query($query); 
    if(!$result) die($conn->error);

    if($tmp_username == $usernameFromDB){
      $_SESSION['admin'] = true;
      header('Location: admin.php');
    }
    else{
      $_SESSION['admin'] = false;
      header('Location: index.php');
    }
    
	}
	else
	{
		echo "login error<br>";
	}	
	
}

$conn->close();


//sanitization functions
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));	
}

function mysql_fix_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}



?>