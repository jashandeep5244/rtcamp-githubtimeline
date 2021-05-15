<?php 
include('conn.php');
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$uid = $_SESSION['id'];
	$query = mysqli_query($conn,"SELECT * FROM user where userid = '$uid' ");
	$row = mysqli_fetch_row($query);
	$uid = $row[0];
	$email=$row[1];
//sending unsubscribe link (using email)
	$to = $email ;
			$subject = "unsubscribe link";
			$message = "
				<html>
				<head>
				<title>unsubscribe link</title>
				</head>
				<body>
				<h2>Thank you for Registering.</h2>
				<p>Please click the link below to Unsubscribe your account.</p>
				<h4><a href='http://localhost/rtcampproject/unsubscribe.php?uid=$uid&email=$email'>Unsubscribe My Account</a></h4>
				</body>
				</html>
				";
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: ceccse.1802058@gmail.com". "\r\n" .
						"CC: ceccse.1802058@gmail.com";

		mail($to,$subject,$message,$headers);

		$_SESSION['sign_msg'] = "unsub email sent";
  		header('location:home.php');
  	}

?>