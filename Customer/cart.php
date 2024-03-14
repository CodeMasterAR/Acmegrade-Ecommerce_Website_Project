<?php

include_once "authguard.php";


$uid = $_SESSION['uid'];
$pid = $_GET['pid'];
$location = $_GET['location'];
$qty = 0;
include_once "../Shared/connection.php";
if (isset($_GET['qty'])) {
    $qty = $_GET['qty'];
} else {
    $qty = 1;
}
$checkCart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `uid` = '$uid' AND `pid` = '$pid'");

if (mysqli_num_rows($checkCart) > 0) {
    $getCart = mysqli_fetch_assoc($checkCart);
    $cqty = $getCart['cqty'];
    if ($cqty == $qty) {
        if ($location == "viewProduct.php") {
            header("location: viewProduct.php?pid=$pid");
        } else {
            header("location: $location");
        }
    } else {
        $updateCart = mysqli_query($conn, "UPDATE `cart` SET `cqty` = '$qty' WHERE `uid` = '$uid' AND `pid` = '$pid'");
        if ($updateCart) {
            if ($location == "viewProduct.php") {
                header("location: viewProduct.php?pid=$pid");
            } else {
                header("location: $location");
            }
        } else {
            echo mysqli_error($conn);
        }
    }
} else {
    $status = mysqli_query($conn, "INSERT INTO `cart` (`uid`, `pid`, `cqty`) VALUES ('$uid', '$pid', '$qty')");
    if ($status) {
        // echo "Product added to cart successfully";
        if ($location == "viewProduct.php") {
            header("location: viewProduct.php?pid=$pid");
        } else {
            header("location: $location");
        }
    } else {
        echo mysqli_error($conn);
    }
}

?>