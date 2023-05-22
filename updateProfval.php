<?php
     require 'DBN.php';
		$user = $_POST["user"];
		$name = $_POST["name"];
		$age = $_POST["age"];
		$email = $_POST["email"];
		$address = $_POST["add"];
		$password = $_POST["password"];

      $query = "UPDATE user SET name='$name', address='$address',age='$age',email='$email',password='$password' WHERE UID='$user'";
                    $result = $con->query($query);
      ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "Products.php";
        </script>
