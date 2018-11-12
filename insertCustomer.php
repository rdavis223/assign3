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
		$query = "INSERT INTO customer VALUES (".$_POST["customerID"].",'".$_POST["firstName"]."','".$_POST["lastName"]."','".$_POST["city"]."',".$_POST["agentID"].",'".$_POST["phone"]."')";
		$result = mysqli_query($connection,$query);
		if (!$result) {
			echo mysqli_error($connection);
		} else {
			echo "Insert successful";	
		
		}
		
		
		
	}
}
insert();

?>
<form action="insertCustomer.php" method="post">
customerID: <input type="text" name="customerID"><br>
First Name: <input type="text" name="firstName"><br>
Last Name: <input type="text" name="lastName"><br>
City: <input type="text" name="city"><br>
Phone: (With no hyphen or brackets) <input type="text" name="phone"><br>
AgentID: (Leaving blank will default to null) <input type="text" name="agentID"><br>
<input type="submit">
</form>


</td>
  </tr>
</table>
</body>
</html>