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
 <link rel="stylesheet" type="text/css" href="style1.css">
 

 </head>
 <style >
   
   
</style>
 <body>
   
   <h1>Welcome,<?php echo $_SESSION['username'];?>!!<h1>
        
        <br><br><br><br><br><br><br>

        <centre>
<form class="form1" action='view stock.html' class="form1">
            <input style="background: green; color: #fff;" type="submit" value="Stock Review">
        </form>
        <br>
        <!-- <form class="form1" action='staffUpdate.php' class="form1">
            <input style="background: green; color: #fff;" type="submit" value="Update Your Profile">
        </form> -->
        <centre> 
        
</body>
</html>

<?php

}else{

header("Location:staff.php");
exit();
}

?>