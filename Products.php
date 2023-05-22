<?php
session_start();
$usname = $_SESSION['usname'];
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
<HTML>
<HEAD>
<TITLE>Cart</TITLE>
<link href="CSS/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="CSS/menubar.css">

<link rel="stylesheet" href="CSS/Products.css">
</HEAD>
<BODY>
<div id="shopping-cart">

<ul>
  <li><a href="welcome_page.php">Home</a></li>
  <li><a href="tracking.php">Your Orders</a></li>
  <li><a href="customerfeedback.php">Rate</a></li>
  <li><a href="CusProfile.php">Profile</a></li>
  <li><a href="welcome_page.php">Log-out</a></li>
	</ul><hr>

	<img src="Images/yasiru logo.jpg" style="width: 200px;height: 100px;"><br><br>


<a id="btnEmpty" href="Products.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="Products.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="Images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				

		}
		$_SESSION['total'] = $total_price;
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
<a href="pay.php">
   <button id="pay" >pay</button>
</a>
<br>
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM Products ORDER BY PID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="Products.php?action=add&code=<?php echo $product_array[$key]["PID"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["img"]; ?> " class="product-image"></div>
			<div class="product-tile-footer">
			<div class="product-title" hidden><?php echo $product_array[$key]["PID"]; ?></div>
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-title"><?php echo $product_array[$key]["Size"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["Price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
</HTML>