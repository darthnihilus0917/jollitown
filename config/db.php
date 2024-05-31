<?php
$server = "localhost:3307";
$user = "root";
$password = "";
$schema = "jobee";
$conn = new mysqli($server, $user, $password, $schema);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>