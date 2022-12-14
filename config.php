<?php
$servername = "localhost";
$username = "root";
$password = "jash1401";
$dbname = "online_bookstore";

$conn = mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
?>
