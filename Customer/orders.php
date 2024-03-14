<?php

include_once "authguard.php";

$uid = $_SESSION['uid'];

include_once "../Shared/connection.php";

if (isset($_GET['cart'])) {
    $cart = $_GET['cart'];
    echo $cart;

    if ($cart) {
        $getCart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `uid` = '$uid'");
        while ($cartlist = mysqli_fetch_assoc($getCart)) {
            $pid = $cartlist['pid'];
            $qty = $cartlist['cqty'];
            $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`uid`, `pid`, `oqty`) VALUES ('$uid', '$pid', '$qty')");
            $deleteCart = mysqli_query($conn, "DELETE FROM `cart` WHERE `uid` = '$uid'");
            if ($insertOrder) {
                header("location: home.php");
            } else {
                echo mysqli_error($conn);
            }
        }
    }
    echo 'I am Run';
    $pid = $_GET['pid'];
    $qty = $_GET['qty'];
    $insertOrder = mysqli_query($conn, "INSERT INTO `orders` (`uid`, `pid`, `oqty`) VALUES ('$uid', '$pid', '$qty')");
    if ($insertOrder) {
        header("location: home.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>