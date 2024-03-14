<?php

$pid = $_GET['pid'];

include_once "../Shared/connection.php";

$status = mysqli_query($conn, "DELETE FROM `products` WHERE pid = '$pid'");

if ($status) {
    // echo "Product deleted successfully";
    header("location:home.php");
} else {
    echo mysqli_error($conn);
}


?>