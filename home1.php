<?php
session_start();
if(isset($_SESSION['id'])&& ($_SESSION['username'])){


?>
<!DOCTYPE html>
<html>
 <head>
    <style type="text/css">
input[type=submit]{
    width: 50%;
    background: green;
    color: #fff;
    border-radius: 5px;
    border: none;

}  
input[type=submit]:hover{
    background-color: yellow;
    opacity:.7;
}  

    </style>
<title>Home</title>
 <link rel="stylesheet" type="text/css" href="style.css">
 
 </head>
 <style >
   
   
</style>
 <body>
   
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1>Welcome,<?php echo $_SESSION['username'];?>!!<h1>
        
        <br><br><br><br><br><br><br>

        
<form class="form1" action='stock.php' class="form1">
            <input style="background: green; color: #fff;" type="submit" value="Stock Review">
        </form>
        
        
</body>
</html>

<?php

}else{

header("Location:staff.php");
exit();
}

?>