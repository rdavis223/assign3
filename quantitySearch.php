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
    <td width="796">
    <form action="quantitySearch" method="post">
	quantity: <input type="text" name="quantity"><br>
	<input type="submit">
	</form>
	<?php
function deleteCustomer(){
	include 'connectdb.php';
	if (isset($_POST["quantity"])){
		echo $_POST["customerID"];
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
deleteCustomer();

?>
<form action="deleteCustomer.php" method="post">
customerID: <input type="text" name="customerID"><br>
<input type="submit">
</form>

</td>
  </tr>
</table>
</body>
</html>