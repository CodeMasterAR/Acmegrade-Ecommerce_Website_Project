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

            .orders-container {
                width: 100%;
                height: 600px;
                margin: 80px 10%;
                background: #f5f5f5;
                position: relative;
                border-top: 1px solid #e5e5e5;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                z-index: 1;
            }

            /* ---------------------------------------- */
            /* --------------- No orders -------------- */
            /* ---------------------------------------- */

            .orders-container .no-orders {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #777;
            }

            /* --------------------------------------- */
            /* --------------- orders ---------------- */
            /* --------------------------------------- */

            .orders-container .products {
                width: 90%;
                max-height: 600px;
                height: 100%;
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
            .orders-container .products .product {
                width: 100%;
                height: 360px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 10px;
            }

            /* --------------------------------------- */
            /* --------------- product-img ----------- */
            /* --------------------------------------- */
            .orders-container .products .product .product-img {
                width: 30%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fafafa;
            }

            .orders-container .products .product .product-img img {
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
                font-size: 1.1em;
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

            .products .product .product-info .cus-name {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 10px;
            }

            .products .product .product-info .cus-name .c-name {
                font-size: 1em;
                font-weight: 500;
                color: #555;
                margin: 0;
            }

            .products .product .product-info .cus-name span {
                font-size: 1em;
                font-weight: 400;
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

            .products .product .product-info .sell {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .sell button {
                width: 100px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #2292d3;
                border-radius: 3px;
                border: none;
                outline: none;
                text-align: center;
                font-size: 1em;
                font-weight: 500;
                color: #fff;
                cursor: pointer;
            }

            .products .product .product-info .sell button:hover {
                background: #1a77b8;
            }

            .products .product .product-info .sell button:active {
                transform: scale(0.98);
            }
        </style>
    </head>

    <body>
        <div class="header">
            <?php
            include "menu.html";
            ?>
        </div>
        <div class="orders-container">
            <div class="products">
                <?php

                $uid = $_SESSION['uid'];

                include "../Shared/connection.php";
                $getOrders = mysqli_query($conn, "SELECT * FROM `orders` JOIN `products` ON `orders`.`pid` = `products`.`pid` WHERE `products`.`vid` = '$uid'");

                if (mysqli_num_rows($getOrders) > 0) {
                    while ($orders = mysqli_fetch_assoc($getOrders)) {
                        $pid = $orders['pid'];
                        $oid = $orders['oid'];
                        $img = $orders['imgurl'];
                        $name = $orders['name'];
                        $price = $orders['price'];
                        $disc = $orders['disc'];
                        $qty = $orders['oqty'];
                        $cusid = $orders['uid'];
                        $getAddress = mysqli_query($conn, "SELECT * FROM `address` WHERE `uid` = '$cusid'");
                        $address = mysqli_fetch_assoc($getAddress);
                        $area = $address['area'];
                        $city = $address['city'];
                        $dist = $address['dist'];
                        $state = $address['state'];
                        $pincode = $address['pincode'];
                        $address = $area . ", " . $city . ", " . $dist . ", " . $state . ", " . $pincode;

                        $getVen = mysqli_query($conn, "SELECT * FROM `vendor` JOIN `products` ON `products`.`vid` = `vendor`.`uid` WHERE `products`.`pid` = '$pid'");
                        $vendor = mysqli_fetch_assoc($getVen);
                        $brand = $vendor['brand'];

                        $getCustomer = mysqli_query($conn, "SELECT * FROM `customer` JOIN `orders` ON `customer`.`uid` = `orders`.`uid` WHERE `orders`.`pid` = '$pid'");
                        $customer = mysqli_fetch_assoc($getCustomer);
                        $fname = $customer['fname'];
                        $lname = $customer['lname'];
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
                                    <span>' . $price - ($price * $disc) / 100 . '/-</span>
                                </div>
                                <div class="discount">
                                    <span class="disc">' . $disc . '% OFF</span>&nbsp;&nbsp;<span class="original-price">' . $price . '/-</span>
                                </div>
                                <div class="quantity">
                                    <span>Quantity: </span> &nbsp;&nbsp;
                                    <span>' . $qty . '</span>
                                </div>
                                <div class="cus-name">
                                    <span class="c-name">Name: </span>&nbsp;&nbsp;
                                    <span>' . $fname . ' ' . $lname . '</span>
                                </div>
                                <div class="address">
                                    <span class="addr">Address</span>
                                    <p>
                                        ' . $address . '
                                    </p>
                                </div>
                                <div class="sell" id="sell' . $oid . '">
                                    <button>Sell</button>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo '
                    <div class="no-orders">
                        <h3>Orders Not Found</h3>
                    </div>
                    ';
                }

                ?>
            </div>
        </div>

        <script>
            let sell = document.querySelectorAll(".sell");

            Array.from(sell).forEach(element => {
                element.addEventListener('click', () => {
                    let id = element.id.slice(4);
                    window.location.href = "sell.php?oid=" + id;
                })
            })
        </script>
    </body>

</html>