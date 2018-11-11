<?php
include 'connectdb.php';
$query = "SELECT description FROM purchase WHERE customerID =".$_REQUEST['data'];
$result = mysqli_query($connection,$query);
if (!$result) {
	die("databases query failed.");
}
echo "<ol>";
	echo "<h1> Products Purchased: </h1>
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<li>";
		echo $row["description"];
		echo "</li>";
		
	}
	</ol>
?>