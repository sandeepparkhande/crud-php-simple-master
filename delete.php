<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$code = $_GET['code'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM Gen_Numbers WHERE code='$code'");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

