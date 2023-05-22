<?php
session_start();
require_once("dbcontroller.php");
$var_value = $_SESSION['total'];
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="CSS/style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<h1 align="right"><?php echo $var_value; ?></h1>
<a href="index.php">
   <button>pay</button>
</a>
</BODY>
</HTML>