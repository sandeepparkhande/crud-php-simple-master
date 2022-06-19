<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$code = mysqli_real_escape_string($mysqli, $_POST['code']);
	
	$startdate = mysqli_real_escape_string($mysqli, $_POST['startdate']);
	//$enddate = mysqli_real_escape_string($mysqli, $_POST['enddate']);
	
	// checking empty fields
	if(empty($code) || empty($startdate)) {	
			
		if(empty($code)) {
			echo "<font color='red'>Code field is empty.</font><br/>";
		}
		
		if(empty($startdate)) {
			echo "<font color='red'>Start Date field is empty.</font><br/>";
		}
				
	} else {	
		//updating the table
		//$result = mysqli_query($mysqli, "UPDATE Gen_Numbers SET startdate='$startdate',enddate='$enddate' WHERE code='$code'");

		$result = mysqli_query($mysqli, "UPDATE Gen_Numbers SET startdate='$startdate',enddate = DATE_ADD('$startdate', INTERVAL 1 YEAR) 
 WHERE code='$code'");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$code = $_GET['code'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Gen_Numbers WHERE code='$code'");

	if($result)
	{

while($res = mysqli_fetch_array($result))
{
	$code = $res['code'];
	$enddate = $res['enddate'];
	$startdate = $res['startdate'];
}
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Code</td>
				<td><input type="text" name="code" value="<?php echo $code;?>"></td>
			</tr>
			<tr> 
				<td>Start Date</td>
				<td><input type="text" name="startdate" value="<?php echo $startdate;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="code" value=<?php echo $_GET['code'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
