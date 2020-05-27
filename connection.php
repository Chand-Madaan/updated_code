<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "ADB_Wholesalers";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if ($conn-> connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

?>