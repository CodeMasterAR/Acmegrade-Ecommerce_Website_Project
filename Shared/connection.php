<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "acmegrade";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn->connect_error){
    echo "Error in SQL connection<br>";
    die;
}

?>