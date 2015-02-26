<?php
include('connect.php');

// Escape user inputs for security
$number = $_POST['number'];

$cust_name = $_POST['cust_name'];

    
$anal_name = $_POST['anal_name'];

$date = $_POST['date'];
 
// attempt insert query execution
$sql = "INSERT INTO escalations (pmr_number,customer_name,analyst_name,date) VALUES ('$number','$cust_name','$anal_name', '$date')";

mysql_query($sql);

header("Location:index.php");

?>