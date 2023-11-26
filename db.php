<?php
$host="localhost";
$username="root";
$password="vedanth123";
$database="varnothsava";

$con=mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo 'database connected';
}
?>