<?php

include "authguard.php";
$uid = $_SESSION['uid'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $state = $_POST['state'];
    $dist = $_POST['dist'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $area = $_POST['area'];

    $fname = str_replace("'", "\'", $fname);
    $lname = str_replace("'", "\'", $lname);
    $area = str_replace("'", "\'", $area);
    $age = date_diff(date_create($dob), date_create('today'))->y;

    include_once "../Shared/connection.php";

    $updateCustomer = mysqli_query($conn, "UPDATE `customer` SET `fname` = '$fname', `lname` = '$lname', `dob`='$dob', `age` = '$age' WHERE `uid` = '$uid'");
    $updateAddress = mysqli_query($conn, "UPDATE `address` SET `state` = '$state', `dist` = '$dist', `city` = '$city', `pincode` = '$pin', `area` = '$area' WHERE `uid` = '$uid'");

    if ($updateCustomer && $updateAddress) {
        header("location: home.php");
    } else {
        echo mysqli_error($conn);
    }
}
?>