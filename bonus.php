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
    <td width="796"><?php


function setImage(){
	include 'connectdb.php';
	if(isset($_POST["URL"])){
		$query = "UPDATE customer SET cusImage = '".$_POST["URL"]."' WHERE customerID = '".$_SESSION["ID"]."'";
		$result = mysqli_query($connection,$query);
		if (!$result) {
		 	die("databases query failed.");
		} else {
			echo $_SESSION["ID"];
			session_unset();
			echo $_POST["URL"];
			echo "Add sucessful";
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
			echo "made it";
			$row = mysqli_fetch_assoc($result);
			if ($row["cusImage"] == NULL) {
				echo "<li> Please paste the image URL below to set: </li>";
				echo  ' <td width="796">
    <form action="bonus.php" method="post">
	Enter Image URL: <input type="text" name="URL" oninput = "checkImage(this.value)"><br>
	<input type="submit">
	</form>';
				echo '<div id="photo"> </div>';
				echo  '<script>
function checkImage(val) {
    if (val.match(/\.(jpeg|jpg|gif|png)$/) != null){
		document.getElementById("photo").innerHTML = "<img src=&#34;" + val + "&#34;>";
	} else {
		document.getElementById("photo").innerHTML = "invalid url";
	}
}
</script>';

				
			
			} else {
				echo '<div id="photo"> </div>';
				echo  '<script>
function checkImage(val) {
    if (val.match(/\.(jpeg|jpg|gif|png)$/) != null){
		document.getElementById("photo").innerHTML = "<img src=&#34" + val + "&#34>";
	} else {
		document.getElementById("photo").innerHTML = "invalid url";
	}
	checkImage("'.$row["cusImage"].'
}
</script>';

			
			}
		}
		
		
	}
	
}

function displayData(){
	include 'connectdb.php';
	if (!isset($_GET["ID"])){
	$query = "SELECT * FROM customer ORDER BY lastName";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		 die("databases query failed.");
	}
	echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo "<a href='bonus.php?ID=";
		echo $row['customerID'];
		echo "'>";
		echo implode(",", $row);
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