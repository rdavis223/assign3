<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Customer Purchases</title>
<link href="assign3.css" rel="stylesheet" type="text/css" />
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
    <td width="812" class = "main"><?php

function displayCustomerData(){
	include 'connectdb.php';
	if (isset($_GET["name"])){
		//if id is set display products that the customer has purchased
		$query = "SELECT description FROM product INNER JOIN purchase ON product.productID = purchase.productID WHERE customerID = ".$_GET["name"];
		$result = mysqli_query($connection,$query);
		if (!$result) {
		 die("databases query failed.");
		 
	}
		echo "Customer has purchased the following products: ";
		$flag = 0;
		while ($row =mysqli_fetch_assoc($result)) {
			echo "<li>";
			echo $row["description"];
			echo "</li>";
			$flag = 1;
		
	}
		if ($flag == 0){
			echo "No products found";
		}
	}
	include 'disconnectdb.php';
	
}

function displayData(){
	include 'connectdb.php';
	//display a list of customers as GET links
	$query = "SELECT customerID, firstName, lastName, city, agentID, phone FROM customer ORDER BY lastName";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		 die("databases query failed.");
	}
	echo "Data displayed as customerId|firstName|lastName|city|agentID|phone";
	echo "<br> Please click a customer to display products they have purchased";
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo "<a href='cInfo.php?name=";
		echo $row['customerID'];
		echo "'>";
		echo implode("|", $row);
		echo "</a>";
		echo "</li>";
		
	}
	mysqli_free_result($result);
	echo "</ol>";
	include 'disconnectdb.php';
	}
	displayCustomerData();
	displayData();

?>


</td>
  </tr>
</table>
</body>
</html>