<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>First Item</title>
<link href="assign3.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="1000" border="1">
  <tr>
    <td width="188" class="sidebar">Menu items will go here</td>
    <td width="796"><?php

function displayCustomerData(){
	include 'connectdb.php';
	if (isset($_GET["name"])){
		$query = "SELECT description FROM product INNER JOIN purchase ON product.productID = purchase.productID WHERE customerID = ".$_GET["name"];
		$result = mysqli_query($connection,$query);
		if (!$result) {
		 die("databases query failed.");
		 
	}
		echo "<h1>Customer has purchased the following products: </h1>";
		while ($row =mysqli_fetch_assoc($result)) {
			if ($row == ""){
				echo "No products found";
			}
			echo "<li>";
			echo $row["description"];
			echo "</li>";
		
	}
	}
	
}

function displayData(){
	include 'connectdb.php';
	$query = "SELECT * FROM customer ORDER BY lastName";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		 die("databases query failed.");
	}
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo "<a href='index.php?name=";
		echo $row['customerID'];
		echo "'>";
		echo implode(",", $row);
		echo "</a>";
		echo "</li>";
		
	}
	mysqli_free_result($result);
	echo "</ol>";
	}
	displayCustomerData();
	displayData();

?>


</td>
  </tr>
</table>
</body>
</html>