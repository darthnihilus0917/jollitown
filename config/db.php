<?php
$server = "localhost:3306";
$user = "root";
$password = "masteradmin";
$schema = "jollitown";
$conn = new mysqli($server, $user, $password, $schema);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>