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
	<?php
function getPhone(){
	include 'connectdb.php';
	if (isset($_POST["customerID"])){
		$query = "SELECT phone FROM customer WHERE customerID = ".$_POST["customerID"];
		$result = mysqli_query($connection,$query);
		$_SESSION["customerID"] = $_POST["customerID"];
		if (!$result) {
			echo mysqli_error($connection);
		} else {
			$row = mysqli_fetch_assoc($result);
			echo "Customer: ".implode("",$row);	
		
		}
		
		
		
	}
}
function updatePhone(){
	include 'connectdb.php';
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

}
function display(){
	echo "<form action='updatePhone.php'; method='post'>";
	if (isset($_POST["customerID"])){
		echo "New Phone Number: (without spaces or hyphens) <input type='text' name='phone'><br>";
	} else {
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