<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Purchase Info</title>
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
    <td width="812" class = "main">
	
	<form action="pInfo.php" method = "post">
  <select name="sortBy">
    <option value="cost">Price</option>
    <option value="description">Description</option>
  </select>
   <select name="orderBy">
    <option value="ASC">Ascending</option>
    <option value="DESC">Decesending</option>
  </select>
  <input type="submit">
</form>

	<?php
function displayData(){
	include 'connectdb.php';
	$query = "";
	if (!isset($_POST["orderBy"])){
		$query = "SELECT * FROM product ORDER BY cost ASC";
	} 
	else {
		echo "Sorting by ".$_POST["sortBy"]."|Ordering By: ".$_POST["orderBy"];
		$query = "SELECT * FROM product ORDER BY ".$_POST[sortBy]." ".$_POST[orderBy];
	}
	$result = mysqli_query($connection,$query);
	if (!$result) {
		 die("databases query failed.");
	}
	echo "<br> Data displayed as productID|description|cost|quantity";
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo implode("|", $row);
		echo "</li>";
		
	}
	mysqli_free_result($result);
	echo "</ol>";
	}
	displayData();

?>


</td>
  </tr>
</table>
</body>
</html>