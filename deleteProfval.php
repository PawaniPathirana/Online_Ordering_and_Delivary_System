<?php
     require 'DBN.php';
     session_start();
     $usname = $_SESSION['usname'];
		

      $query = "DELETE FROM user WHERE UID='$usname'";
                    $result = $con->query($query);
      ?>
                     <script type="text/javascript">
            alert("Delete Successfull.");
            window.location = "welcome_page.php";
        </script>
