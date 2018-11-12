<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>First Item</title>
<link href="assign3.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="1000" border="1">
  <tr>
    <td width="188" class="sidebar">Menu items will go here</td>
    <td width="796">
	<?php
function neverPurchased(){
	include 'connectdb.php';
	$query = "SELECT description FROM product WHERE product.productID NOT IN (SELECT productID FROM purchase)";
	$result = mysqli_query($connection, $query);
	if (!$result){
		echo mysqli_error($connection);
	} else {
			$flag = 0;
			while ($row =mysqli_fetch_assoc($result)) {
				echo "<li>";
				echo implode("",$row);
				echo "</li>";
				$flag = 1;
			
		}
			if ($flag == 0){
				echo "No products to show";
		}
	}
}
neverPurchased();

?>


</td>
  </tr>
</table>
</body>
</html>