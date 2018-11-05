<?php
 session_start(); 
$dbhost= "localhost";
$dbuser= "root";
$dbname="travel";
$dbpassword="16121971";

$connection= mysqli_connect($dbhost,$dbuser, $dbpassword, $dbname);

if(mysqli_connect_errno()){
	
	die("database connection failed: ".
	     mysqli_connect_error(). "(".

        mysqli_connect_errno().")"		 
	);
}

$id=rand(1,4);
echo $id;

$query= "SELECT challenge FROM challenges WHERE id=$id";
$result= mysqli_query($connection, $query);
echo $result;
?>



<!DOCTYPE html>
<html>
<head>
	<title>Challenges!</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     
	<link rel="stylesheet" 
	 type ="text/css" 
	 href="index.css"/>
</head>
<body>
<div class="container-fluid">
<div class="header">
	<ul>
		<li><a href="#">Home</a></li> 
		<li><a href="#">Registar</a></li>
		<li><a href="#">Log In</a></li>
		<li><a href="#">Contact Us</a></li>
	</ul>
</div>
</div>

<div class="buttons" style="margin-top: 100px; margin-left: 200px;">
  
  <button type="button" class="btn btn-success btn-md">Instant Challenge</button>
  <button type="button" class="btn btn-success btn-md">Weekly Challenge</button>    
  <button type="button" class="btn btn-success btn-md">Challenge a friend</button>
  
</div>


</body>
</html>