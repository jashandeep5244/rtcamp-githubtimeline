<?php
include('conn.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id']))
{
	$uid = $_SESSION['id'];
	//used to change sub code in user 
  	mysqli_query($conn,"UPDATE USER SET subscription = 1 WHERE userid = '$uid' "); 
	//this line is used to fetch object of the user table where userid = $uid
	$emailquery = mysqli_query($conn,"SELECT * FROM user where userid ='$uid' ");
	//as one row per user only one object is in emailquery
	//this line is used to fetch that row 
	$row = mysqli_fetch_row($emailquery);
	//this line is used to fetch email column of that row 
	$email = $row[1]; 
	
	$query1 = mysqli_query($conn,"SELECT userid FROM subscribers WHERE userid = '$uid'");
	if(mysqli_num_rows($query1)==0)
	{
		mysqli_query($conn,"INSERT INTO subscribers(userid,email) VALUES($uid,'$email')");
	}
	else
	{
		$_SESSION['sign_msg'] = "ALREADY SUBSCRIBED";
		header('location:home.php');
		exit;
	}
		$_SESSION['sign_msg'] = "SUBSCRIBED";
  		header('location:home.php');
}