<?php 

$host="localhost";
$user="root";
$pass="";
$db="webmit";

$con = new mysqli($host,$user,$pass,$db);

if(!$con)
    {
        echo "There are some problem while connecting the database";
    }

$customer_id = $_POST["cid"];
$price = $_POST["ta"];
$email = $_POST["mail"];
$address = $_POST["address"];
$city = $_POST["city"];
$telephonenumber = $_POST["tnumber"];

$qry = "INSERT INTO cart
 VALUES ('','$customer_id','$price','$email','$address','$city','$telephonenumber')";

$insert = $con->query($qry);

if(!$insert)
    {
        alert('Oops! something went wrong');
    }

    else
    {
        header("Location:Products.php");
    }


?>