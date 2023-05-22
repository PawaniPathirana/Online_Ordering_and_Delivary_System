<html>

<head>

<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	


<form action="" method="POST">
  <h2>UPDATE</h2>
  <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php }?> 
  <label>User Name</label>
  <input type="text" name="uname" placeholder="User Name" id="userName">
  <label>Password</label>
  <input type="password" name="password" placeholder="Password" id="passWord">
  
  <button onclick="clear()" type ="reset">Reset</button>
  <button type="submit">update</button>
 
</form>
</body>
</html>

<?php
include"DB.php";

if(isset($_POST['update'])){

	$uname=$_POST['uname'];
	

	$query = "UPDATE employee SET  password='$password ',  WHERE username='$uname' ";
	
	$query_run = mysqli_query($con, $query);

	if($query_run)
   {
   	alert("data inserted");
    echo '<script type = "text/javascript"> alert("Data Updated")</script>';
   }
  else
   {
    echo '<script type = "text/javascript"> alert("Data Not Updated")</script>';
   }
 }

?>


