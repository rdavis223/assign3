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
	echo "<form action=&#34;insertCustomer.php&#34; method=&#34;post&#34;>";
	if (isset($_POST["customerID"])){
		echo "New Phone Number: (without spaces or hyphens) <input type=&#34;text&#34; name=&#34;phone&#34;><br>";
	} else {
		echo "customerID: <input type=&#34;text&#34; name=&#34;customerID&#34;><br>";
	}
	echo "<input type=&#34;submit&#34;></form>";
}
session_start();
getPhone();
updatePhone();
display();
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