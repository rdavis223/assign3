<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Total Sales</title>
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
    <p>Enter a productID to view the total units sold and sales number for that product. 
    <form action="totalSales.php" method="post">
	productID: <input type="text" name="productID"><br>
	<input type="submit">
	</form>
	<?php
function totalSales(){
	//if product id is set
	if (isset($_POST["productID"])){
		include 'connectdb.php';
		//query to check if the product ID dosen't exist
		$query1 = "SELECT * FROM product WHERE productID = '".$_POST["productID"]."'";
		$result1 = mysqli_query($connection, $query1);
		
		if ($result1->num_rows == 0){
			echo "productID does not exist";	
		} else {
		// do inner join product with purchase
		$query = "SELECT description, purchase.quantity, cost FROM purchase INNER JOIN product ON product.productID = purchase.productID WHERE product.productID = '".$_POST["productID"]."'";
		$result = mysqli_query($connection, $query);
		if (!$result){
			echo mysqli_error($connection);
		} else {
				$totalCost = 0;
				$totalUnits = 0;
				$desc = "";
				$row = mysqli_fetch_assoc($result);
				$totalCost = $totalCost + $row["cost"] *$row["quantity"];
				$totalUnits = $totalUnits + $row["quantity"];
				$desc = $row["description"];
				//add the costs and units for totals
				while ($row =mysqli_fetch_assoc($result)) {
					$totalCost = $totalCost + $row["cost"] * $row["quantity"];
					$totalUnits = $totalUnits + $row["quantity"];
			}
		
			//display values
			echo "<li>Product: ".$desc."</li>";
			echo "<li>Units: ".$totalUnits."</li>";
			echo "<li>Sales: $".$totalCost."</li>";
				
		}
		}
	include 'disconnectdb.php';
	}
}

totalSales();

?>


</td>
  </tr>
</table>
</body>
</html>