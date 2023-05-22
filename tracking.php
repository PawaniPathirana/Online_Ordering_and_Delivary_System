<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/trackingstyle.css">

</head>
<body style="margin: 50px;">
    <h1>Your Orders</h1>
    <br>
    <div class="container">

    <table class="table1">
        <thead>
			<tr>
				<th>Order ID</th>
				<th>Order Status</th>
                <th>Ordered Products</th>
			</tr>
		</thead>

        <tbody>
            <?php
            session_start();
            $usname = $_SESSION['usname'];

            $servername = "localhost";
			$username = "root";
			$password = "";
			$database = "webmit";

			// Create connection
			$connection = new mysqli($servername, $username, $password, $database);

            // Check connection
			if ($connection->connect_error) {
				die("Connection failed: " . $connection->connect_error);
			}

            // read all row from database table
			$sql = "SELECT * FROM orders WHERE U_ID='$usname'";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["orderid"] . "</td>
                    <td>" . $row["del_status"] . "</td>
                    <td>" . $row["products"] . "</td>
                    
                </tr>";
            }

            $connection->close();
            ?>
        </tbody>
    </table>


    </div>
    
</body>
</html>