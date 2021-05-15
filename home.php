<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['id']))
{

	header('location:index.php');
}
if(isset($_SESSION['sign_msg']))
{
	echo $_SESSION['sign_msg'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up Form with Email Verification in PHP/MySQLi</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+San">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
</head>
<body>
	<div class="container">
		<h2><a href=""></h2>
		<p><a href="logout.php">Logout</a></p>
	</div>
	<form method="POST" action="subscription.php">
		<button type="submit" class="btn btn-primary" onclick="button1()"><p id="button1">Subscribe: </p></button>
	</form>
	<form method="POST" action="unsub_email.php">
		<button type="submit" class="btn btn-primary">unsubscribe</button>
	</form>
	<script>
		
		function button1(){
		document.getElementById("button1").innerHTML="Subscribed";
	}
	</script>
</body>
</html>
