<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM Products WHERE PID='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["PID"]=>array('name'=>$productByCode[0]["Name"], 'code'=>$productByCode[0]["PID"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["Price"], 'image'=>$productByCode[0]["img"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["PID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["PID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<html lan="en">
<head>
	<title>Yasiru Traders</title>
  <link rel="stylesheet" href="CSS/slideshow.css">
  <link rel="stylesheet" href="CSS/menubar.css">
  <link rel="stylesheet" href="CSS/wcfooter.css">
<style>


</style>
</head>
<body>
	<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="login.php">Log-in</a></li>

  <li><a href="signup.php">Sign-up</a></li>
  <li><a href="staff.php">Employee Log-in</a></li>
	</ul><hr>

	<img src="Images/yasiru logo.jpg" style="width: 200px;height: 100px;"><br><br>

<div class="mySlides fade">
  <img src="Images/wc 1.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="Images/wc 2.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="Images/wc 3.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="Images/wc 4.png" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="Images/wc 5.png" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span>
</div>

<div>
  <h2 style="color:green; text-align: center; font-size: 50px; background-color: ;">Trending This week</h2><br><br>
  <center><a href="signup.php"><img src="Images/wcgoods.png" alt="goods"></a></center>
</div>

<!-- FOOTER -->
<div class="dummy_page">
  
</div><center>
<!-- FOOTER START -->
<div class="footer">
  <div class="contain"><br>
    <img src="Images/yasiru logo.jpg" style="width: 200px;height: 100px;">
    <h1>0114 442 608</h1>
    <h2>144/1 Katuwana Rd, Homagama</h2>
  <div class="col">
    <h1>Useful Links</h1>
    <ul>
      <li><a href="https://www.google.com/maps/place/Yasiru+Traders/@6.8322982,80.0037234,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae251f6a92b2dfb:0x2c48005d609d2d0a!8m2!3d6.8322963!4d80.0037467">Store Location</a></li>
      <li><a href="https://www.google.com/maps/place/Yasiru+Traders/@6.8322982,80.0037234,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae251f6a92b2dfb:0x2c48005d609d2d0a!8m2!3d6.8322963!4d80.0037467">Privacy Policy</a></li>
      <li><a href="https://www.google.com/maps/place/Yasiru+Traders/@6.8322982,80.0037234,17z/data=!3m1!4b1!4m5!3m4!1s0x3ae251f6a92b2dfb:0x2c48005d609d2d0a!8m2!3d6.8322963!4d80.0037467">Terms & Conditions</a></li>
      
    </ul>
  </div>
  <div class="col social">
    <h1>Contact Us</h1>
    <ul>
      <li><a href="https://www.facebook.com/"><img src="Images/fb.png" width="32" style="width: 32px;"></a></li>
      <li><a href="https://yasirutraders.business.site/"><img src="Images/web.png" width="32" style="width: 32px;"></a></li>
      <li><a href="mailto:info@yasirutraders.com"><img src="Images/gmail.png" width="32" style="width: 32px;"></a></li>
    </ul>
  </div>
<div class="clearfix"></div>
</div>
</div></center>
<!-- END OF FOOTER -->

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>



</body>
</html>