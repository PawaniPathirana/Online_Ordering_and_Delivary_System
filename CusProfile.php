<?php 
	require 'DBN.php';
	session_start();
	$usname = $_SESSION['usname'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Customer Profile</title>
		<!--<link rel="stylesheet" type="text/css" href="Customerprofile.css">-->
	</head>
	<style type="text/css">
		body{
			background-image: url('https://www.supermarketnews.com/sites/supermarketnews.com/files/styles/article_featured_retina/public/Snacks-side_view.jpg?itok=li57FnH9');
		}
		#cuspro{
			width: 50%;
			background-color: rgba(255,255,255,0.7);
			height: 100%
		}
		#cus{
			position: absolute;
			text-align: left;
			left: 455px;
		}
		input{
			width: 380px;
			height: 25px;
		}
		#update{
			position: absolute;
			left: 455px;
		}
		#delete{
			position: absolute;
			left: 455px;
		}
		#add{
			height: 100px;
		}
		button{
			background-color: rgb(22,120,255);
			border-color: white;
			border-radius: 5px;
			width: 100px;
			height: 40px;
			box-shadow: 5px 10px 18px #888888;
		}
		label{
			background-color: rgb(225,255,255);
		}
	</style>
	<body>
<?php
	$sql = "SELECT * from user WHERE UID='$usname'";
				$res = $con->query($sql);
?>

<?php
while($row=$res->fetch_assoc())
							{
?>
		<center><form action="updateProfval.php" method="POST" id="cuspro"><br>
			<h2>Profile</h2>
			<label id="cus">Profile Picture: </label>
			<input type="file" name="photo" class="photo"><br><br>
			<label id="cus" >User ID: </label>
			<input type="text" name="user" id="user" value=<?php echo $row["UID"]; ?> readonly reqired><br><br>
			<label id="cus">Name: </label>
			<input type="text" name="name" value=<?php echo $row["name"]; ?> reqired><br><br>
			<label id="cus">Password: </label>
			<input type="text" name="password" value=<?php echo $row["password"]; ?> reqired><br><br>
			<label id="cus">Age: </label>
			<input type="text" name="age" value=<?php echo $row["age"]; ?> reqired><br><br>
			<label id="cus">Email: </label>
			<input type="text" name="email" id="email" value=<?php echo $row["email"]; ?> reqired><br><br>
			<label id="cus">Address: </label>
			<input type="text" name="add" id="add" value=<?php echo $row["address"]; ?> reqired><br><br>
			<button type="submit">Update</button><br><br>
			
		</form></center>

		<center><form action="DeleteProfval.php" method="POST" id="cuspro">
			<button type="submit" style="">Delete</button>
		</form></center>
<?php } ?>
	</body>
</html>
