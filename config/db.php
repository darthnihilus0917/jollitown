<?php
$server = "localhost:3306";
$user = "root";
$password = "masteradmin";
$schema = "jollitowns";
$con = mysqli_connect($server,$user,$password,$schema) or die(mysql_error());
?>