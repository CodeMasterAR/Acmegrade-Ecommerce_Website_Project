<?php

include "authguard.php";

$uid = $_SESSION['uid'];
include_once "../Shared/connection.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $location = $_POST['location'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $brand = $_POST['brand'];
    $state = $_POST['state'];
    $dist = $_POST['dist'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $area = $_POST['area'];

    $fname = str_replace("'", "\'", $fname);
    $lname = str_replace("'", "\'", $lname);
    $area = str_replace("'", "\'", $area);
    $brand = str_replace("'", "\'", $brand);
    $age = date_diff(date_create($dob), date_create('today'))->y;

    $insertVendor = mysqli_query($conn, "INSERT INTO `vendor` (`uid`, `fname`, `lname`, `dob`, `age`, `brand`) VALUES ('$uid', '$fname', '$lname', '$dob', '$age', '$brand')");
    $insertAddress = mysqli_query($conn, "INSERT INTO `address` (`uid`, `state`, `dist`, `city`, `pincode`, `area`) VALUES ('$uid', '$state', '$dist', '$city', '$pin', '$area')");

    if ($insertVendor && $insertAddress) {
        header("location: $location");
    } else {
        echo mysqli_error($conn);
    }

}

?>