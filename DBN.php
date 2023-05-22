<?php


$host="localhost";
$username="root";
$password="";
$dbname="webmit";

$con=mysqli_connect($host,$username,$password,$dbname);


if(!$con){
	
	die('Could not connect mysql sever:'.mysql_error());
}
?>