<?php
session_start();
include_once("config.php");
if(isset($_SESSION['email']))
{
	if(isset($_GET['tradingCode']))
	{
		$userEmail=$_SESSION['email'];
		$tradingCode=$_GET['tradingCode'];
		$result = mysqli_query($con,"DELETE FROM user_companies where TradingCode='$tradingCode' AND Email='$userEmail'");
		header('location:dashboard.php');
	}
	else
	{
		header('location:dashboard.php');
	}
}
else
{
	header('location:login.php');
}
?>
			  
	