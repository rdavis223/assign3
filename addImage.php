<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>First Item</title>
<link href="assign3.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table class = "center" width="1000" border="1">
  <tr>
    <td width="188" class="sidebar">
    <button class= "btn" onclick="location.href = 'cInfo.php';">Customer Info</button>
    <button class= "btn" onclick="location.href = 'deleteCustomer.php';">Delete Customer</button>
    <button class= "btn" onclick="location.href = 'insertCustomer.php';">Insert Customer</button>
    <button class= "btn" onclick="location.href = 'insertPurchase.php';">Insert Purchase</button>
    <button class= "btn" onclick="location.href = 'pInfo.php';">Product Info</button>
    <button class= "btn" onclick="location.href = 'neverPurchased.php';">Products never purchased</button>
    <button class= "btn" onclick="location.href = 'quantitySearch.php';">Search purchases by quantity</button>
    <button class= "btn" onclick="location.href = 'addImage.php';">Add Image</button>
    <button class= "btn" onclick="location.href = 'totalSales.php';">Total Sales</button>
    <button class= "btn" onclick="location.href = 'updatePhone.php';">Update Phone</button>
    
    
    
    </td>
    <td width="829" class = "main"><?php


function setImage(){
	$_SESSION["menu"] = 0;
	include 'connectdb.php';
	if(isset($_POST["URL"])){
		$query = "UPDATE customer SET cusImage = '".$_POST["URL"]."' WHERE customerID = '".$_SESSION["ID"]."'";
		$result = mysqli_query($connection,$query);
		if (!$result) {
		 	die("databases query failed.");
		} else {
			session_unset();
			echo "Photo added sucessfully";
		}
		
	}

}


function getImage(){
	include 'connectdb.php';
	if (isset($_GET["ID"])){
		$_SESSION["ID"] = $_GET["ID"];
		$query = "SELECT cusImage FROM customer WHERE customerID = '".$_GET["ID"]."'";
		$result = mysqli_query($connection,$query);
		if (!$result) {
		 	die("databases query failed.");
		} else {
			$row = mysqli_fetch_assoc($result);
			if ($row1["cusImage"] == NULL) {
				$_SESSION["menu"] = 1;
				echo "Please enter the image URL below to set: <br>";
				echo  '
    <form action="addImage.php" method="post">
	Enter Image URL: <input type="text" name="URL" oninput = "checkImage(this.value)"><br>
	<p id ="submit"></p>
	</form>';
				echo '<p id="photo"> </p>';
				echo  '<script>
function checkImage(val) {
    if (val.match(/\.(jpeg|jpg|gif|png)$/) != null && val.length <= 100){
		document.getElementById("photo").innerHTML = "';
		echo "<img src='";
		echo '"' ;
		echo '+ val +';
		echo '"';
		echo "'>";
		echo '"';
		echo ";";
		echo 'document.getElementById("submit").innerHTML = "';
		echo '<input type=' ;
		echo "'submit'";
		echo '>';
		echo '";';
		echo '} else if (val.length > 100){
		document.getElementById("photo").innerHTML = "URL too long to store, must be 100 characters or less";
	document.getElementById("submit").innerHTML = "";
	}';
	echo ' else {
		document.getElementById("photo").innerHTML = "Invalid URL";
		document.getElementById("submit").innerHTML = "";
	}
}
</script>';

				
			
			} else {
				echo '<img src="'.$row1["cusImage"].'">';

			
			}
		}
		
		
	}
	
}

function displayData(){
	include 'connectdb.php';
	if ($_SESSION["menu"] == 0){
	$query = "SELECT customerID FROM customer ORDER BY lastName";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		 die("databases query failed.");
	}
	echo "Data displayed as customerId|firstName|lastName|city|agentID|phone";
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo "<a href='addImage.php?ID=";
		echo $row['customerID'];
		echo "'>";
		echo implode("|", $row);
		echo "</a>";
		echo "</li>";
		
	}
	mysqli_free_result($result);
	echo "</ol>";
	}
	}
	session_start();
	setImage();
	getImage();
	displayData();

?>


</td>
  </tr>
</table>
</body>
</html>