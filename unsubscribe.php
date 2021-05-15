<?php
	include('conn.php');
	session_start();
	echo "hy";
	if(isset($_GET['uid']))
	{
		$uid = $_GET['uid'];
		$email = $_GET['email'];
		echo "hy";
		mysqli_query($conn,"DELETE FROM subscribers WHERE userid =$uid");
		mysqli_query($conn,"UPDATE user SET subscription = 0 WHERE userid = $uid AND email = '$email'");
		$_SESSION['sign_msg'] = "UNSUBSCRIBED";
		header('location:home.php');
	}
	?>