<?php


$servername = "localhost";
$username = "username";

// Create connection
$conn = new mysqli($servername, 'root','','foodies');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
