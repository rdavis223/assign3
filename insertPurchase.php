<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert Purchase</title>
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
	<?php
function insert(){
	include 'connectdb.php';
	if (isset($_POST["customerID"])){
		$query = "SELECT * FROM purchase WHERE productID = ".$_POST["productID"]." and customerID = ".$_POST["customerID"];
		$result = mysqli_query($connection,$query);
		if ($result->num_rows == 0 || !$result) {
			$query = "INSERT INTO purchase VALUES(".$_POST["productID"].",".$_POST["customerID"].",".$_POST["quantity"].")";
			$result = mysqli_query($connection,$query);
			if (!$result){
				echo mysqli_error($connection);
			} else {
				echo "Added Successfully ";
			}
			
		} else {
			if ($_POST["quantity"] > 0){
				$query = "UPDATE purchase SET quantity = quantity + ".$_POST["quantity"]." WHERE customerID = ".$_POST["customerID"]." and productID = ".$_POST["productID"];
				$result = mysqli_query($connection,$query);
				if (!$result){
					echo mysqli.error($connection);
				} else {
					echo "Updated successfully";
				}
			}
			else {
				echo "Quantity cannot be negative";
			}
			
		
		}
		
		
	}
}
insert();

?>
<p>Please use the form below to insert a new purchase. The customerID and productID must already exist. </p>
<form action="insertPurchase.php" method="post">
customerID: <input type="text" name="customerID"><br>
productID: <input type="text" name="productID"><br>
quantity: <input type="text" name="quantity"><br>
<input type="submit">
</form>


</td>
  </tr>
</table>
</body>
</html>