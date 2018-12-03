3<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Search purchases by quantity</title>
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
    <p>Please enter a quantity below. Any purchase above the given value will be displayed</p>
    <form action="quantitySearch.php" method="post">
	quantity: <input type="text" name="quantity"><br>
	<input type="submit">
	</form>
	<?php
function quantitySearch(){
	include 'connectdb.php';
	if (isset($_POST["quantity"])){
		//query all products over a given quantity and display those products in a list
		$query = "SELECT customer.firstName, customer.lastName, purchase.quantity, product.description FROM (customer INNER JOIN purchase ON customer.customerID = purchase.customerID) INNER JOIN product ON purchase.productID = product.productID WHERE purchase.quantity > ".$_POST["quantity"] ;
		$result = mysqli_query($connection, $query);
		if (!$result){
			echo mysqli_error($connection);
		} else {
				echo "Data displayed as firstName|lastName|quantity|description <br>";
				$flag = 0;
				while ($row =mysqli_fetch_assoc($result)) {
					echo "<li>";
					echo implode("|",$row);
					echo "</li>";
					$flag = 1;
			
			}
				if ($flag == 0){
					echo "No products found";
			}
		}
		
		
	}
	include 'disconnectdb.php';
}
quantitySearch();

?>


</td>
  </tr>
</table>
</body>
</html>