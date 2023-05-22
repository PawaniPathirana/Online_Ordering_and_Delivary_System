<?php 
	require'DBN.php';
	
	$fname=$_POST["name"];
	$pasword=$_POST["psw"];
	$email=$_POST["email"];
	$age=$_POST["age"];
	$address=$_POST["adress"];
	
	$sql="INSERT INTO user VALUES('','$fname','$age','$email','$address','$pasword')";
	
	if($con->query($sql))
	{
		header ("Location:login.php");
		
	}
	else
	{
		echo "error in inserting".$con->error;
	}
	
?>