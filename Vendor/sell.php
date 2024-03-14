<?php

include_once "authguard.php";

$uid = $_SESSION['uid'];

include_once "../Shared/connection.php";

if (isset($_GET['oid'])) {
    $oid = $_GET['oid'];

    $getOrder = mysqli_query($conn, "SELECT * FROM `orders` WHERE `oid` = '$oid'");

    $order = mysqli_fetch_assoc($getOrder);

    $userid = $order['uid'];
    $pid = $order['pid'];
    $qty = $order['oqty'];
    $order_date = $order['buy_date'];

    $product = mysqli_query($conn, "UPDATE `products` SET `qty` = `qty` - '$qty' WHERE `pid` = '$pid'");

    $deleteOrder = mysqli_query($conn, "DELETE FROM `orders` WHERE `oid` = '$oid'");

    $insertHistory = mysqli_query($conn, "INSERT INTO `order_history` (`uid`, `pid`,`hqty`,`order_date`) VALUES ('$userid', '$pid', '$qty','$order_date')");

    if ($deleteOrder && $insertHistory) {
        header("location: viewOrders.php");
    } else {
        echo mysqli_error($conn);
    }
}

?>