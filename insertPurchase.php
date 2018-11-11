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
function insert(){
	include 'connectdb.php';
	if (isset($_POST["customerID"])){
		echo "im here";
		$query = "SELECT * FROM purchase WHERE productID = ".$_POST["productID"]." and customerID = ".$_POST["customerID"];
		$result = mysqli_query($connection,$query);
		if ($result->num_rows == 0 || !$result) {
		 	$query = "INSERT INTO purchase VALUES (".$_POST["purchaseID"].",".$_POST["customerID"].",".$_POST["quantity"].")";
			$result = mysqli_query($connection,$query);
			if (!$result){
				echo mysqli.error($connection);
			} else {
				echo "Added Successfully";
			}
			
		} else {
			$query = "UPDATE purchase SET quantity = quantity + ".$_POST["quantity"]." WHERE customerID = ".$_POST["customerID"]." and productID = ".$_POST["productID"];
			$result = mysqli_query($connection,$query);
			if (!$result){
				echo mysqli.error($connection);
			} else {
				echo "Updated successfully";
			}
			
		
		}
		
		
	}
	insert();
}

?>
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