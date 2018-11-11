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
	
	<form action="pInfo.php" method = "post">
  <select name="sortBy">
    <option value="cost">Price</option>
    <option value="description">Description</option>
  </select>
   <select name="orderBy">
    <option value="ASC">Ascending</option>
    <option value="DESC">Decesending</option>
  </select>
  <input type="submit">
</form>

	<?php
function displayData(){
	include 'connectdb.php';
	$query = "";
	if (!isset($_POST["orderBy"])){
		echo "reached";
		$query = "SELECT * FROM product ORDER BY cost ASC";
	} 
	else {
		$query = "SELECT * FROM product ORDER BY ".$_POST[sortBy]." ".$_POST[orderBy];
	}
	$result = mysqli_query($connection,$query);
	if (!$result) {
		 die("databases query failed.");
	}
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo implode(",", $row);
		echo "</li>";
		
	}
	mysqli_free_result($result);
	echo "</ol>";
	}
	displayData();

?>


</td>
  </tr>
</table>
</body>
</html>