<?php

include_once "authguard.php";

$uid = $_SESSION['uid'];
$pid = $_GET['pid'];

include_once "../Shared/connection.php";


$checkWishList = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE `uid` = '$uid' AND `pid` = '$pid'");

$matched = mysqli_num_rows($checkWishList);

if ($matched == 1) {
    header("location: home.php");
} else {
    $addWishlist = mysqli_query($conn, "INSERT INTO `wishlist` (`uid`, `pid`) VALUES ('$uid', '$pid')");
    if ($addWishlist) {
        header("location: home.php");
    }
}


?>