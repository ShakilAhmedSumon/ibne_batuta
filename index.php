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

 if(isset($_POST['submit'])){
		
	
	$name = mysqli_real_escape_string($connection,  $_POST['name']);
    $email = mysqli_real_escape_string($connection,  $_POST['email']);
    $phone_number= mysqli_real_escape_string($connection,  $_POST['phoneNumber']);
	$password = mysqli_real_escape_string($connection,  $_POST['password']);
    $password2 = mysqli_real_escape_string( $connection, $_POST['confirm_password']);


if($password==$password2)
 {$query=  "INSERT INTO users(name,email, phone_number,password)
             	VALUES ('$name','$email','$phone_number', '$password')";
			$result= mysqli_query($connection, $query);
 if($result)
	{
		 $_SESSION['name'] = "$name"; 
		// header( "Location:form1.php" );
		
	}		
	else 
	{
		die("database query failed: ". mysqli_error($connection));
	}	
	}

else {
	echo "Passwords do not match!";
}

 	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ibne Batuta!</title>
	<meta charset="utf-8">
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
<div class="row">
	<div class= "col-md-5" class="col-sm-12">
		<div class="des">
			<p id="welcome" style="margin-top: 20px;"><b>Some dumb texts!</b></p>
			<p id="para">Travel gamification and lots of bla bla vbl abnla within short notice we are here to buid a prototype and sjdhflksfn oiurouroweuir p8ripwoirpwior poipwi p'iorp pipirepqwioe p'qiepqi pipqioep  uoqu pirwq 9ip p'qip 'poi  ipri 'qp90q pq9io [q9o [q-0qwoer [-q<br><br>
			In case we find some abnormality in your test results, we will recommend you the habits to
			build and the cure that will help rule out the risk.<br><br>
			Come, register and be safe!</p>
		</div>
	</div>

	<div class="col-md-7" class="col-sm-12">
		<div id="form">
			<p id="p">Register with us!</p>
			<form action="index.php" method="POST" >
				 <input id="f1"  type="text" placeholder="Your name" name="name" style="margin-top: 40px;">
                 <input id="f2"  type="email" placeholder="Email" name="email">
                 <input id="f2"  type="text" placeholder="Phone Number" name="phoneNumber">
                 <input id="f3"  type="text" placeholder="Password" name="password">
                 <input id="f4"  type="text" placeholder="Confirm password" name="confirm_password">
    
                 <input id="f5"  type="submit" value="Register!" name="submit">
			</form>
		</div>
	</div>
</div>

<hr>
<div class="footer">
<div class="row">
	<div class="col-md-2" class="col-sm-0"></div>
	<div class="col-md-4" class="col-sm-12">
		<div class="flist">
			<ul>
				<li><a href="#">Collaborate!!</a><li>
				<li><a href="#">About Us!</a><li>
				<li><a href="#">Proceedures</a><li>
				<li><a href="#">Terms and Conditions!</a><li>
			</ul>
		</div>
	</div>
	<div class="col-md-4" class="col-sm-12">
		<div class="flist2">
			<ul>
				<li><a href="#">Get Our App!</a><li>
				<li><a href="#">For iOS!</a><li>
				<li><a href="#">Facebook</a><li>
				<li><a href="#">Twitter</a><li>
			</ul>
		</div>
	</div>
	<div class="col-md-2" class="col-sm-0"></div>
</div>
</div>
</div>
</body>
</html>