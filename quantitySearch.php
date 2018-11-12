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
    <form action="quantitySearch.php" method="post">
	quantity: <input type="text" name="quantity"><br>
	<input type="submit">
	</form>
	<?php
function quantitySearch(){
	include 'connectdb.php';
	if (isset($_POST["quantity"])){
		$query = "SELECT customer.firstName, customer.lastName, purchase.quantity, product.description FROM (customer INNER JOIN purchase ON customer.customerID = purchase.customerID) INNER JOIN product ON purchase.productID = product.productID WHERE purchase.quantity > ".$_POST["quantity"] ;
		$result = mysqli_query($connection, $query);
		if (!$result){
			echo mysqli_error($connection);
		} else {
				$flag = 0;
				while ($row =mysqli_fetch_assoc($result)) {
					echo "<li>";
					echo implode(",",$row);
					echo "</li>";
					$flag = 1;
			
			}
				if ($flag == 0){
					echo "No products found";
			}
		}
		
		
	}
}
quantitySearch();

?>


</td>
  </tr>
</table>
</body>
</html>