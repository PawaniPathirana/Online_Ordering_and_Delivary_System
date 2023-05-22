<?php
	session_start();
    $usname = $_SESSION['usname'];

	require 'DBN.php';
	
	$rv=$_POST["REVIEW"];

	$sql="INSERT INTO feedback VALUES('','$usname','$rv')";
	
	$result=$con->query($sql);
	
	if($result)
	{
			header("Location:Products.php");
	
	}
	else
	{
		echo "Wrong validation details";
	}
?>