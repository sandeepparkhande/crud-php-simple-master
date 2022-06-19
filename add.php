<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");


if(isset($_POST['addCode'])) {	
	$code = mysqli_real_escape_string($mysqli, $_POST['code']);
	//$code = random_strings(56);
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
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO Gen_Numbers(code,startdate,enddate) VALUES('$code','$startdate',DATE_ADD('$startdate', INTERVAL 1 YEAR))");

	
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
