<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Gen_Numbers ORDER BY code DESC"); // using mysqli_query instead


?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Code</td>
		<td>Start Date</td>
		<td>End Date</td>
		<td>Update</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	if($result)
    {
		while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['code']."</td>";
		echo "<td>".$res['startdate']."</td>";
		echo "<td>".$res['enddate']."</td>";	
		echo "<td><a href=\"edit.php?code=$res[code]\">Edit</a> | <a href=\"delete.php?code=$res[code]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
}
	?>
	</table>
</body>
</html>
