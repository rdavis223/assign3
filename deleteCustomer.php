<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Delete Customer</title>
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
function deleteCustomer(){
	include 'connectdb.php';
	if (isset($_POST["customerID"])){
		$query = "DELETE FROM customer WHERE customerID = '".$_POST["customerID"]."'";
		$result = mysqli_query($connection, $query);
		if (!$result){
			echo mysqli_error($connection);
		} else if (mysqli_fetch_assoc($result) == FALSE){
			echo ("customer id does not exist");
		
		
		} else {
			echo "Delete sucessful";
		}
		
		
	}
}
deleteCustomer();

?>
<p>Please enter customerID to delete customer </p>
<form action="deleteCustomer.php" method="post">
customerID: <input type="text" name="customerID"><br>
<input type="submit">
</form>

</td>
  </tr>
</table>
</body>
</html>