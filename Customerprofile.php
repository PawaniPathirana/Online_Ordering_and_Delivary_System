<!--<?php
    $host ="localhost";
    $user="root";
    $password="";
    $db ="webmit";

	$con=new mysqli("localhost","root","","webmit");   
    $user = "";
    $name="";
    $password="";
    $age="";
    $email="";
    $address="";

    if ($con->connect_error) {
  		die("Connection failed: " . $con->connect_error);
	}

	$nameErr = $emailErr = "";
	$name = $email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		if (empty($_POST["user"])) {
    		$nameErr = "Name is required";
  		}else {
    		$name = test_input($_POST["user"]);
    // check if name only contains letters and whitespace
    		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      		$nameErr = "Only letters and white space allowed";
    		}
  		}
  	}	

  	if (empty($_POST["email"])) {
    	$emailErr = "Email is required";
  	}else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		$emailErr = "Invalid email format";
    		}
  		}


    if (isset($_POST['update'])) {
		$user = $_POST['user'];
		$name = $_POST['name'];
		$age = $_POST['age'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM 'webmit'";

		mysqli_query($db,"UPDATE info SET name='$name', address='$address',age='$age',email='$email',password='$password' WHERE user=$user");
	}
?>-->
<?php 
	require 'DBN.php'
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Customer Profile</title>
		<link rel="stylesheet" type="text/css" href="Customerprofile.css">
	</head>
	<body>
		<?php
	$sql = "SELECT * from user WHERE UID='1'";
				$res = $con->query($sql);
?>

<?php
while($row=$res->fetch_assoc())
							{
?>
		<center><form action="#" method="POST" id="cuspro"><br>
			<label id="cus">Profile Picture: </label>
			<input type="file" name="photo" class="photo"><br><br>
			<label id="cus">User ID: </label>
			<input type="text" name="user" id="user" value=<?php echo $row["UID"]; ?> readonly reqired><br><br>
			<label id="cus">Name: </label>
			<input type="text" name="name" value=<?php echo $row["name"]; ?> reqired><br><br>
			<label id="cus">Password: </label>
			<input type="password" name="password" value=<?php echo $row["password"]; ?> reqired><br><br>
			<label id="cus">Age: </label>
			<input type="text" name="age" value=<?php echo $row["age"]; ?> reqired><br><br>
			<label id="cus">Email: </label>
			<input type="text" name="email" id="email" value=<?php echo $row["email"]; ?> reqired><br><br>
			<label id="cus">Address: </label>
			<input type="text" name="add" id="add" value=<?php echo $row["address"]; ?> reqired><br><br>
			<button id="update">Update</button><br><br><br>
			<button id="delete" style="">Delete</button>
		</form></center>
		<?php } ?>
	</body>
</html>