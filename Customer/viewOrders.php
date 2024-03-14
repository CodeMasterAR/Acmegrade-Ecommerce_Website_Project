<?php

include_once "authguard.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>View Orders</title>
        <style>
            .header {
                width: 100%;
                height: 60px;
                background: transparent;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
            }

            /* --------------------------------- */
            /* ---------- order-page ----------- */
            /* --------------------------------- */

            .order-page {
                width: 100%;
                margin: 80px 10%;
                background: #f5f5f5;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                flex-direction: column;
            }

            /* ----------------------------- */
            /* ------- Recent order -------- */
            /* ----------------------------- */
            .orders-container {
                width: 100%;
                max-height: 520px;
                height: 100%;
                background: #f5f5f5;
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                z-index: 1;
            }

            .orders-container .order-title {
                width: 100%;
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #f5f5f5;
            }

            .orders-container .order-title h4 {
                font-size: 1.5rem;
                font-weight: 500;
                color: #555;
            }

            /* -------------------------------- */
            /* -------------- history --------- */
            /* -------------------------------- */
            .history-container {
                width: 100%;
                max-height: 520px;
                height: 100%;
                background: #f5f5f5;
                position: relative;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                margin-top: 30px;
                align-items: center;
                z-index: 1;
            }

            .history-container .history-title {
                width: 100%;
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #f5f5f5;
            }

            .history-container .history-title h4 {
                font-size: 1.5rem;
                font-weight: 500;
                color: #555;

            }

            /* -------------------------------- */
            /* ------------- Products --------- */
            /* -------------------------------- */

            .products {
                width: 80%;
                height: 100%;
                max-height: 470px;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                overflow-y: scroll;
            }

            .products::-webkit-scrollbar {
                width: 5px;
            }

            .products::-webkit-scrollbar-track {
                background: #f5f5f5;
                border-radius: 5px;
            }

            .products::-webkit-scrollbar-thumb {
                background: #2292d3;
                border-radius: 5px;
            }

            /* --------------------------------------- */
            /* --------------- product --------------- */
            /* --------------------------------------- */
            .products .product {
                width: 100%;
                height: 320px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 10px;
            }

            /* --------------------------------------- */
            /* --------------- product-img ----------- */
            /* --------------------------------------- */
            .products .product .product-img {
                width: 30%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fafafa;
            }

            .products .product .product-img img {
                min-width: 200px;
                width: 100%;
                height: 100%;
                object-fit: fill;
            }

            /* ------------------------------------- */
            /* ------------- product-info ---------- */
            /* ------------------------------------- */
            .products .product .product-info {
                width: 70%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                padding: 0 10px;
                background: #fafafa;
            }

            .products .product .product-info .name {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .name h4 {
                font-size: 1.1em;
                font-weight: 500;
                color: #555;
            }

            .products .product .product-info .brand-name {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .brand-name h4 {
                font-size: 1em;
                font-weight: 500;
                color: #555;
            }

            .products .product .product-info .price {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .price span {
                font-size: 1em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }

            .products .product .product-info .discount {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .discount .disc {
                font-size: 1em;
                font-weight: 500;
                color: red;
                margin: 0;
            }

            .product-info .discount .original-price {
                text-decoration: line-through;
                font-size: 0.8em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }

            .products .product .product-info .quantity {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 10px;
            }

            .products .product .product-info .quantity span {
                font-size: 1em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }

            .products .product .product-info .address {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .address .addr {
                font-size: 1em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }

            .products .product .product-info .address .addr p {
                font-size: 0.8em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }

            .products .product .product-info .date {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .date span {
                font-size: 1em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <?php
            include "menu.html";
            ?>
        </div>
        <div class="order-page">
            <div class="orders-container">
                <div class='order-title'>
                    <h4>Recent Orders</h4>
                </div>
                <div class="products">
                    <?php

                    $uid = $_SESSION['uid'];

                    include "../Shared/connection.php";
                    $getOrders = mysqli_query($conn, "SELECT * FROM `orders` JOIN `products` ON `orders`.`pid` = `products`.`pid` WHERE `orders`.`uid` = '$uid'");

                    if (mysqli_num_rows($getOrders) > 0) {
                        while ($orders = mysqli_fetch_assoc($getOrders)) {
                            $pid = $orders['pid'];
                            $img = $orders['imgurl'];
                            $name = $orders['name'];
                            $price = $orders['price'];
                            $disc = $orders['disc'];
                            $qty = $orders['oqty'];
                            $cusid = $orders['uid'];
                            $date = $date = date("d M Y", strtotime($orders['buy_date']));
                            $getAddress = mysqli_query($conn, "SELECT * FROM `address` WHERE `uid` = '$cusid'");
                            $address = mysqli_fetch_assoc($getAddress);
                            $area = $address['area'];
                            $city = $address['city'];
                            $dist = $address['dist'];
                            $state = $address['state'];
                            $pincode = $address['pincode'];
                            $address = $area . ", " . $city . ", " . $dist . ", " . $state . ", " . $pincode;

                            $getVen = mysqli_query($conn, "SELECT * FROM `vendor` JOIN `products` ON `products`.`vid` = `vendor`.`uid` Where `products`.`pid` = '$pid'");
                            $vendor = mysqli_fetch_assoc($getVen);
                            $brand = $vendor['brand'];
                            echo '
                        <div class="product">
                            <div class="product-img">
                                <img src="' . $img . '" alt="">
                            </div>
                            <div class="product-info">
                                <div class="name">
                                    <h4>' . $name . '</h4>
                                </div>
                                <div class="brand-name">
                                    <h4>' . $brand . '</h4>
                                </div>
                                <div class="price">
                                    <span>' . number_format($price - ($price * $disc) / 100, 0) . '/-</span>
                                </div>
                                <div class="discount">
                                    <span class="disc">' . $disc . '% OFF</span>&nbsp;&nbsp;<span class="original-price">' . $price . '/-</span>
                                </div>
                                <div class="quantity">
                                    <span>Quantity: </span> &nbsp;&nbsp;
                                    <span>' . $qty . '</span>
                                </div>
                                <div class="address">
                                    <span class="addr">Address</span>
                                    <p>
                                        ' . $address . '
                                    </p>
                                </div>
                                <div class="date">
                                    <span>Order Date: </span> &nbsp;&nbsp;
                                    <span>' . $date . '</span>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="history-container">
                <div class='history-title'>
                    <h4>Order History</h4>
                </div>
                <div class="products">
                    <?php

                    $uid = $_SESSION['uid'];

                    include "../Shared/connection.php";
                    $getOrders = mysqli_query($conn, "SELECT * FROM `order_history` JOIN `products` ON `order_history`.`pid` = `products`.`pid` WHERE `order_history`.`uid` = '$uid'");

                    if (mysqli_num_rows($getOrders) > 0) {
                        while ($orders = mysqli_fetch_assoc($getOrders)) {
                            $pid = $orders['pid'];
                            $img = $orders['imgurl'];
                            $name = $orders['name'];
                            $price = $orders['price'];
                            $disc = $orders['disc'];
                            $qty = $orders['hqty'];
                            $cusid = $orders['uid'];
                            $orderdate = $date = date("d M Y", strtotime($orders['order_date']));
                            $deliverydate = $date = date("d M Y", strtotime($orders['delivery_date']));
                            $getAddress = mysqli_query($conn, "SELECT * FROM `address` WHERE `uid` = '$cusid'");
                            $address = mysqli_fetch_assoc($getAddress);
                            $area = $address['area'];
                            $city = $address['city'];
                            $dist = $address['dist'];
                            $state = $address['state'];
                            $pincode = $address['pincode'];
                            $address = $area . ", " . $city . ", " . $dist . ", " . $state . ", " . $pincode;

                            $getVen = mysqli_query($conn, "SELECT * FROM `vendor` JOIN `products` ON `products`.`vid` = `vendor`.`uid` Where `products`.`pid` = '$pid'");
                            $vendor = mysqli_fetch_assoc($getVen);
                            $brand = $vendor['brand'];
                            echo '
                        <div class="product">
                            <div class="product-img">
                                <img src="' . $img . '" alt="">
                            </div>
                            <div class="product-info">
                                <div class="name">
                                    <h4>' . $name . '</h4>
                                </div>
                                <div class="brand-name">
                                    <h4>' . $brand . '</h4>
                                </div>
                                <div class="price">
                                    <span>' . number_format($price - ($price * $disc) / 100, 0) . '/-</span>
                                </div>
                                <div class="discount">
                                    <span class="disc">' . $disc . '% OFF</span>&nbsp;&nbsp;<span class="original-price">' . $price . '/-</span>
                                </div>
                                <div class="quantity">
                                    <span>Quantity: </span> &nbsp;&nbsp;
                                    <span>' . $qty . '</span>
                                </div>
                                <div class="address">
                                    <span class="addr">Address</span>
                                    <p>
                                        ' . $address . '
                                    </p>
                                </div>
                                <div class="date">
                                    <span>Order Date: </span> &nbsp;&nbsp;
                                    <span>' . $orderdate . '</span>
                                </div>
                                <div class="date">
                                    <span>Delivery Date: </span> &nbsp;&nbsp;
                                    <span>' . $deliverydate . '</span>
                                </div>
                            </div>
                        </div>
                        ';
                        }
                    }

                    ?>
                </div>
            </div>
        </div>
    </body>

</html>