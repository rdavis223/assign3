<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Products never purchased</title>
<link href="assign3.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="1000" border="1" class = "center">
  <tr>
    <td width="188" class="sidebar"><button class= "btn" onclick="location.href = 'cInfo.php';">Customer Purchases</button>
    <button class= "btn" onclick="location.href = 'deleteCustomer.php';">Delete Customer</button>
    <button class= "btn" onclick="location.href = 'insertCustomer.php';">Insert Customer</button>
    <button class= "btn" onclick="location.href = 'insertPurchase.php';">Insert Purchase</button>
    <button class= "btn" onclick="location.href = 'pInfo.php';">Product Info</button>
    <button class= "btn" onclick="location.href = 'neverPurchased.php';">Products never purchased</button>
    <button class= "btn" onclick="location.href = 'quantitySearch.php';">Search purchases by quantity</button>
    <button class= "btn" onclick="location.href = 'addImage.php';">Add Image</button>
    <button class= "btn" onclick="location.href = 'totalSales.php';">Total Sales</button>
    <button class= "btn" onclick="location.href = 'updatePhone.php';">Update Phone</button></td>
    <td width="812" class = "main">
	<?php
function neverPurchased(){
	include 'connectdb.php';
	//query all products that have never been purchased
	$query = "SELECT description FROM product WHERE product.productID NOT IN (SELECT purchase.productID FROM purchase)";
	$result = mysqli_query($connection, $query);
	if (!$result){
		echo mysqli_error($connection);
	} else {
			//list these products
			$flag = 0;
			echo "The following products have never been purchased";
			while ($row =mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo implode("",$row);
				echo "</li>";
				$flag = 1;
			
		}
			if ($flag == 0){
				echo "No products to show";
		}
	}
	include 'disconnectdb.php';
}
neverPurchased();

?>


</td>
  </tr>
</table>
</body>
</html>