<?php

include "authguard.php";

$uid = $_SESSION['uid'];

$pid = 0;

include_once "../Shared/connection.php";

$rating = 0;
$comment = "";
$qty = 0;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $location = $_POST['location'];
    $pid = $_POST['pid'];
    if (isset($_POST['rating']) && isset($_POST['comment'])) {
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
    } else if (isset($_POST['qty'])) {
        $qty = $_POST['qty'];
    }
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

    $insertCustomer = mysqli_query($conn, "INSERT INTO `customer` (`uid`, `fname`, `lname`, `dob`, `age`) VALUES ('$uid', '$fname', '$lname', '$dob', '$age')");
    $insertAddress = mysqli_query($conn, "INSERT INTO `address` (`uid`, `state`, `dist`, `city`, `pincode`, `area`) VALUES ('$uid', '$state', '$dist', '$city', '$pin', '$area')");

    if ($insertCustomer && $insertAddress) {
        if ($location == "viewProduct.php") {
            header("location: rating-comment.php?pid=$pid&rating=$rating&comment=$comment");
        } else if ($location == 'checkOut.php') {
            header("location: $location?pid=$pid&qty=$qty&location=$location");
        } else if ($location == 'viewCart.php') {
            header("location: checkOut.php");
        } else {
            header("location: $location");
        }
    } else {
        echo mysqli_error($conn);
    }

}

?>