<?php

$database = 'Auction';
$server = 'localhost';
$username = 'root';
$password = '';

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}

else
echo 
    "Connected successfully";

?>