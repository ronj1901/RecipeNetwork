<?php 
	require 'config/config.php';
	$user_check = $_SESSION['username'];
	$userDetailQuery = mysqli_query($con,"SELECT * FROM users WHERE userName= '$user_check' ");
	$row = mysqli_fetch_array($userDetailQuery,MYSQLI_ASSOC);
	$login_session = $row['userName'];

	if (!isset($_SESSION['username'])) {
		header("Location: register.php");
	}

	
?>
<!DOCTYPE html>
<html> 
<head>
	<title>Recipe Network</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>

  <!-- Navbar -->

    <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">RecipeFeeD</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
      
           
        
          <li><a href="#"> <i class="fa fa-bell-o fa-lg" ></i></a></li>
          <li><a href="#"> <i class="fa fa-cog fa-lg"></i></a></li>
          <li><a href="#"> <i class="fa fa-envelope fa-lg"></i> </a></li>
          <li><a href="#"> <i class="fa fa-users fa-lg"></i> </a></li>
          <li><a href = "logout.php"> <i class="fa fa-sign-out fa-lg" id="logout"></i> </a></li>

      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      </ul>
      <form class="navbar-form navbar-left" action="/action_page.php">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    </nav>

	
 
  <!-- <div class="wrapper"> -->
  	

 
