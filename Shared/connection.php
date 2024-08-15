<?php


// Local Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "acmegrade";


// Remote Database
// $servername = "sql211.infinityfree.com";
// $username = "if0_37011602";
// $password = "S3tlmObQLD";
// $database = "if0_37011602_shopglamor";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn->connect_error){
    echo "Error in SQL connection<br>";
    die;
}

?>