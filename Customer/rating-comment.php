<?php

include "authguard.php";

$uid = $_SESSION['uid'];
$pid = 0;
include_once "../Shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $pid = $_GET['pid'];
    $rating = $_GET['rating'];
    $comment = $_GET['comment'];
    $comment = str_replace("'", "\'", $comment);
    // echo 'I am Run But You Can\'t see me';

    $insertRating = mysqli_query($conn, "INSERT INTO `rating` (`uid`, `pid`, `rating`) VALUES ('$uid', '$pid', '$rating')");
    $insertComment = mysqli_query($conn, "INSERT INTO `comment` (`uid`, `pid`, `comment`) VALUES ('$uid', '$pid', '$comment')");

    if ($insertRating && $insertComment) {
        // echo "Rating and Comment added successfully";
        header("location: viewProduct.php?pid=$pid");
    } else {
        echo mysqli_error($conn);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $location = $_POST['location'];
    $pid = $_POST['pid'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    $comment = str_replace("'", "\'", $comment);
    echo 'I am Run But You Can\'t see me';
    $checkCustomer = mysqli_query($conn, "SELECT * FROM `customer` WHERE `uid` = '$uid'");

    if (mysqli_num_rows($checkCustomer) == 0) {
        header("location: customer_detail.php?location=$location&pid=$pid&rating=$rating&comment=$comment");
        exit();
    }
    echo 'I am member of customer';
    echo "<br>";
    echo $comment;

    $checkRating = mysqli_query($conn, "SELECT * FROM `rating` WHERE `uid` = '$uid' AND `pid` = '$pid'");
    $checkComment = mysqli_query($conn, "SELECT * FROM `comment` WHERE `uid` = '$uid' AND `pid` = '$pid'");

    if (mysqli_num_rows($checkRating) > 0) {
        $updateRating = mysqli_query($conn, "UPDATE `rating` SET `rating` = '$rating' WHERE `uid` = '$uid' AND `pid` = '$pid'");
        if (!$updateRating) {
            echo mysqli_error($conn);
        }
    } else {
        $insertRating = mysqli_query($conn, "INSERT INTO `rating` (`uid`, `pid`, `rating`) VALUES ('$uid', '$pid', '$rating')");
    }

    if (mysqli_num_rows($checkComment) > 0) {
        if ($comment != "") {
            $updateComment = mysqli_query($conn, "UPDATE `comment` SET `comment` = '$comment' WHERE `uid` = '$uid' AND `pid` = '$pid'");
            if (!$updateComment) {
                echo mysqli_error($conn);
            }
        }
    } else {
        $insertComment = mysqli_query($conn, "INSERT INTO `comment` (`uid`, `pid`, `comment`) VALUES ('$uid', '$pid', '$comment')");
        if (!$insertComment) {
            echo mysqli_error($conn);
        }
    }

    header("location: viewProduct.php?pid=$pid");

}


?>