<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Update Phone</title>
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
function getPhone(){
	include 'connectdb.php';
	//if customerID is set display the old phone number
	if (isset($_POST["customerID"])){
		$query = "SELECT phone FROM customer WHERE customerID = ".$_POST["customerID"];
		$result = mysqli_query($connection,$query);
		$_SESSION["customerID"] = $_POST["customerID"];
		if (!$result) {
			echo mysqli_error($connection);
		} else {
			$row = mysqli_fetch_assoc($result);
			echo "Old Number: ".$row["phone"];
		
		}
		
		
		
	}
	include 'disconnectdb.php';
}
function updatePhone(){
	
	
	include 'connectdb.php';
	//if phone number is set from the form update phone number and display message if successful
	if (isset($_POST["phone"])){
		$query = "UPDATE customer SET phone = '".$_POST["phone"]."' WHERE customerID = ".$_SESSION["customerID"];
		$result = mysqli_query($connection,$query);
		if (!$result) {
			echo mysqli_error($connection);
		} else {
			echo "Phone number updated";
		
		}
		session_destroy();
		
		
		
	}
	include 'disconnectdb.php';

}
function display(){
	//display new phone number form if customerID is set, if nothing is set display customerID input form
	echo "<form action='updatePhone.php'; method='post'>";
	if (isset($_POST["customerID"])){
		echo "Please enter new phone number for the customer <br>";
		echo "New Phone Number: (without spaces or hyphens) <input type='text' name='phone'><br>";
	} else {
		echo "Please enter customerID below <br>";
		echo "customerID: <input type='text' name='customerID'><br>";
	}
	echo "<input type='submit'></form>";
}
session_start();
getPhone();
updatePhone();
display();
?>


</td>
  </tr>
</table>
</body>
</html>