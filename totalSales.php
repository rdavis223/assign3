<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>First Item</title>
<link href="assign3.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="1000" border="1">
  <tr>
    <td width="188" class="sidebar">Menu items will go here</td>
    <td width="796">
    <form action="totalSales.php" method="post">
	productID: <input type="text" name="productID"><br>
	<input type="submit">
	</form>
	<?php
function totalSales(){
	if (isset($_POST["productID"])){
		include 'connectdb.php';
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
				while ($row =mysqli_fetch_assoc($result)) {
					$totalCost = $totalCost + $row["cost"] * $row["quantity"];
					$totalUnits = $totalUnits + $row["quantity"];
			}
			if ($desc == ""){
				echo "No product found for productID";
			
			} else {
			
			echo "<li>Product: ".$desc."</li>";
			echo "<li>Units: ".$totalUnits."</li>";
			echo "<li>Sales: $".$totalCost."</li>";
			}
				
		}
	}
}

totalSales();

?>


</td>
  </tr>
</table>
</body>
</html>