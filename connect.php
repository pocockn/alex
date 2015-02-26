<?php

// code snippet to insert the form data into the database
$dbhost = 'localhost';
$dbuser = 'alex';
$dbpass = '';
$db_name = "ibm";

// connect to database

mysql_connect("$dbhost", "$dbuser", "$dbpass")or
die ("cannot connect to server");

mysql_select_db("$db_name")or die("Cannot select DB");


?>