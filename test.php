<?php

// query the database and get the count
$result = mysql_query("SELECT id FROM escalations");
$num_rows = mysql_num_rows($result);

// echo out how many results there are in the db
echo $num_rows;


// code snippet to insert the form data into the database

$dbhost = 'host';
$dbuser = 'user';
$dbpass = 'pass';

// connect to database

$connect = mysqli_connect($dbhost, $dbuser, $dbpass);

// if the cant connect to databae throw error message

if (! $connect)
{   
    die ('Could not connect: ' . mysql_error());
}

// Escape user inputs for security
$number = mysqli_real_escape_string($link, $_POST['number']);

 
// attempt insert query execution
$sql = "INSERT INTO tableName (field_name) VALUES ('$number')";

// if successful print message, if not print the error code
if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}

?>