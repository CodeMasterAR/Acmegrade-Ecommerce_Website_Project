<?php

include "authguard.php";
$uid = $_SESSION['uid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    include_once "../Shared/connection.php";

    $updateVendor = mysqli_query($conn, "UPDATE `vendor` SET `fname` = '$fname', `lname` = '$lname', `dob`='$dob', `age` = '$age', `brand`='$brand' WHERE `uid` = '$uid'");
    $updateAddress = mysqli_query($conn, "UPDATE `address` SET `state` = '$state', `dist` = '$dist', `city` = '$city', `pincode` = '$pin', `area` = '$area' WHERE `uid` = '$uid'");

    if ($updateVendor && $updateAddress) {
        header("location: home.php");
    } else {
        echo mysqli_error($conn);
    }
}
?>