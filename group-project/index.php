<!DOCTYPE html>
<html>
<head>
    <title>KPOP STAN NATION</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body class="main">
    <h1><span>KPOP Stan Nation</span></h1>
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
    <p>Welcome to this website. Look at KPOP!</p>
    <div id="myFirstCarousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#myFirstCarousel" data-sldie-to="0" class="active"></li>
		<li data-target="#myFirstCarousel" data-slide-to="1"></li>
		<li data-target="#myFirstCarousel" data-sldie-to="2"></li>
	</ol>
	
	<div class="carousel-inner">
		<div class="item active">
			<img src="images/car1.png" alt="BTS eating a burger" class="center">
		</div>
		<div class="item">
			<img src="images/car2.png" alt="I.O.I eating a burger" class="center">
		</div>
		<div class="item">
			<img src="images/car3.png" alt="BlackPink eating a burger" class="center">
		</div>
	</div>
	
	<a class="left carousel-control" href="#myFirstCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myFirstCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<?php
  session_start();
  if(isset($_SESSION['username'])){
    echo "<p style=\"text-align: center;\">    Welcome back $_SESSION[username]</p>";
  }
  ?>
</body>
</hmtl>
