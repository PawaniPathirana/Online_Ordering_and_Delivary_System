<?php
	session_start();
	
	$_SESSION["NAME"]="a";

	require 'DBN.php';
	
	$uname=$_POST["uname"];
	$pass=$_POST["psw"];

    $_SESSION['usname']='';
	$sql="SELECT * FROM user WHERE name='$uname' and password='$pass'";
	
	$result=$con->query($sql);
	
	if($result->num_rows>0)
	{
            while($row = $result->fetch_assoc()){
                
	            $_SESSION['usname'] = $row['UID'];
            }
			header("Location:Products.php");
	
	}
	else
	{
		echo "Wrong validation details";
	}
?>