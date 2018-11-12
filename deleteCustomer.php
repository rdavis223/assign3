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
function deleteCustomer(){
	include 'connectdb.php';
	if (isset($_POST["customerID"])){
		$query = "DELETE FROM customer WHERE customerID = '".$_POST["customerID"]."'";
		$result = mysqli_query($connection, $query);
		if (!$result){
			echo mysqli_error($connection);
		} else {
			echo "Delete sucessful";
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