<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "searchjobs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'UTF8');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>