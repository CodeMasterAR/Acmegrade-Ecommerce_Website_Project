<?php

include_once "authguard.php";

if (isset($_GET['delete'])) {
    $cid = $_GET['delete'];

    include_once "../Shared/connection.php";
    $deleteQuery = mysqli_query($conn, "DELETE FROM `cart` WHERE `cid` = '$cid'");
}

if (isset($_GET['update']) && $_GET['qty']) {
    $cid = $_GET['update'];
    $qty = $_GET['qty'];
    include_once "../Shared/connection.php";
    $updateQuery = mysqli_query($conn, "UPDATE `cart` SET `cqty` = '$qty' WHERE `cid` = '$cid'");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check Out</title>

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

            /* ---------------------------------- */
            /* ------ Checkout-container -------- */
            /* ---------------------------------- */
            .checkout-container {
                width: 100%;
                height: 100%;
                margin: 80px 3%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                color: #555;
            }

            /* ----------------------------------- */
            /* ------------ checkout ------------- */
            /* ----------------------------------- */
            .checkout {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
            }

            /* ------------------------------------- */
            /* --------------- Address ------------- */
            /* ------------------------------------- */
            .checkout .Address {
                width: 100%;
                height: 120px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                color: #555;
                padding: 10px;
                background: #fafafa;
                margin-bottom: 10px;
            }

            .checkout .Address h5 {
                font-size: 20px;
                font-weight: 500;
                padding-top: 20px;
                color: #555;
            }

            .checkout .Address .user-address {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                color: #555;
                padding: 10px;
                margin-bottom: 10px;
            }

            .checkout .Address .user-address a {
                font-size: 1em;
                font-weight: 500;
                color: #2292d3;
                text-decoration: none;
            }

            /* ----------------------------------- */
            /* ---------- product-detail --------- */
            /* ----------------------------------- */
            .checkout .product-detail {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding: 10px;
                background: #fafafa;
                margin-bottom: 10px;
            }

            /* --------------------------------------- */
            /* --------------- products -------------- */
            /* --------------------------------------- */
            .product-detail .products {
                max-height: 400px;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                background: #fafafa;
                overflow-y: scroll;
                flex-basis: 75%;
                flex-shrink: 0;
            }

            .products::-webkit-scrollbar {
                width: 5px;
            }

            .products::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 5px;
            }

            .products::-webkit-scrollbar-thumb {
                background: #2292d3;
                border-radius: 5px;
            }

            /* --------------------------------------- */
            /* --------------- product --------------- */
            /* --------------------------------------- */
            .product-detail .products .product {
                width: 100%;
                height: 250px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 10px;
            }

            /* --------------------------------------- */
            /* --------------- product-img ----------- */
            /* --------------------------------------- */
            .product-detail .products .product .product-img {
                width: 30%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fafafa;
            }

            .product-detail .products .product .product-img img {
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
                font-size: 1.5em;
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

            .quantity .decrease,
            .quantity .increase,
            .quantity .decre,
            .quantity .incre {
                width: 30px;
                height: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #f5f5f5;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 50%;
                cursor: pointer;
            }

            .decrease:active,
            .increase:active,
            .decre:active,
            .incre:active {
                box-shadow: none;
                transform: scale(0.98);
            }

            .products .product .product-info .quantity input {
                width: 50px;
                height: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fafafa;
                border: none;
                outline: none;
                text-align: center;
                font-size: 1em;
                font-weight: 500;
                color: #555;
                margin: 0 3px;
            }

            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .products .product .product-info .remove {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 5px;
            }

            .products .product .product-info .remove button {
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

            /* ----------------------------------- */
            /* ------------- summary ------------- */
            /* ----------------------------------- */
            .product-detail .summary {
                width: 20%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-end;
                background: #fafafa;
                flex-basis: 20%;
                flex-shrink: 20;
            }

            .product-detail .summary .checkout-summary {
                min-width: 150px;
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                justify-self: flex-end;
                align-items: center;
                border-top: 1px solid #c8c8c8;
                border-bottom: 1px solid #c8c8c8;
            }

            .summary .checkout-summary h3 {
                width: 100%;
                text-align: center;
                background: #e8e8e8;
                color: #555;
                font-size: 1em;
                padding: 6px 0;
                margin: 0;
            }

            .summary .checkout-summary .count-subtotal {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 5px 10px;
                background: #f5f5f5;
                border-top: 1px solid #c8c8c8;
                border-bottom: 1px solid #c8c8c8;
            }

            .summary .checkout-summary .count-subtotal p {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.8em;
                color: #555;
                margin: 5px 0;
            }

            .summary .checkout-summary .total {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 0.8em;
                color: #555;
                padding: 5px 10px;
                background: #f5f5f5;
            }

            .summary .checkout-summary .total p {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 1em;
                color: #555;
                margin: 0;
            }

            /* --------------------------------- */
            /* ------------ payment ------------ */
            /* --------------------------------- */
            .checkout .payment {
                width: 100%;
                height: 50px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                margin-bottom: 10px;
            }

            .checkout .payment .pay-btn {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: #fafafa;
                padding-left: 10px;
            }

            .checkout .payment .pay-btn button {
                width: 150px;
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
                margin-right: 10px;
            }

            button:hover {
                background: #1b7bbd;
            }

            button:active {
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
        <div class="checkout-container">
            <div class="checkout">
                <div class="Address">
                    <h5>Address</h5>
                    <div class="user-address">
                        <?php

                        $uid = $_SESSION['uid'];
                        include_once "../Shared/connection.php";
                        $status = false;
                        $getAddress = mysqli_query($conn, "SELECT * FROM `address` WHERE `uid`='$uid'");
                        if (mysqli_num_rows($getAddress) == 0) {
                            if (isset($_GET['pid']) && isset($_GET['location']) && isset($_GET['qty'])) {
                                $pid = $_GET['pid'];
                                $location = $_GET['location'];
                                $qty = $_GET['qty'];
                                echo '<a href="customer_detail.php?pid=' . $pid . '&qty=' . $qty . '&location=' . $location . '">Add Your Detail</a>';
                            } else if (isset($_GET['location'])) {
                                $location = $_GET['location'];
                                echo '<a href="customer_detail.php?location=' . $location . '">Add Your Detail</a>';
                            }
                        } else {
                            $status = true;
                            $row = mysqli_fetch_assoc($getAddress);
                            $area = $row['area'];
                            $city = $row['city'];
                            $dist = $row['dist'];
                            $state = $row['state'];
                            $pin = $row['pincode'];

                            echo $area . ', ' . $city . ', ' . $dist . ', ' . $state . ', ' . $pin;
                        }
                        ?>
                    </div>
                </div>
                <div class="product-detail">
                    <div class="products">
                        <?php
                        $cart = false;

                        $totalItems = 0;
                        $subTotal = 0;
                        $discount = 0;
                        $deliveryCharge = 0;
                        $total = 0;

                        $pid = 0;
                        $qty = 0;
                        if (isset($_GET['pid']) && isset($_GET['location']) && isset($_GET['qty'])) {
                            $pid = $_GET['pid'];
                            $location = $_GET['location'];
                            $qty = $_GET['qty'];

                            $getProduct = mysqli_query($conn, "SELECT * FROM products WHERE pid = '$pid'");
                            $totalItems = mysqli_num_rows($getProduct);
                            if ($totalItems > 0) {
                                $product = mysqli_fetch_assoc($getProduct);
                                $name = $product['name'];
                                $price = $product['price'];
                                $disc = $product['disc'];
                                $image = $product['imgurl'];

                                $subTotal = $subTotal + ($price - ($price * $disc) / 100) * $qty;

                                if ($status) {
                                    echo '
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="' . $image . '" alt="">
                                            </div>
                                            <div class="product-info">
                                                <div class="name">
                                                    <h4>' . $name . '</h4>
                                                </div>
                                                <div class="price">
                                                    <span>₹' . $price - ($price * $disc) / 100 . '/-</span>
                                                </div>
                                                <div class="discount">
                                                    <span class="disc">' . $disc . '% OFF</span>&nbsp;&nbsp;<span
                                                        class="original-price">₹' . $price . '/-</span>
                                                </div>
                                                <div class="quantity">
                                                    <div class="decre"><i class="fa-solid fa-minus"></i></div>
                                                    <input type="number" name="qty" id="qty' . $pid . '" value="' . $qty . '" max="10" min="1">
                                                    <div class="incre"><i class="fa-solid fa-plus"></i></div>
                                                </div>
                                                <div class="remove">
                                                    <button onclick="remove()">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                                if ($subTotal < 500) {
                                    $deliveryCharge = 50;
                                    $discount = 0;
                                } else if ($subTotal < 2000) {
                                    $ddeliveryCharge = 70;
                                    $discount = 5;
                                } else if ($subTotal < 5000) {
                                    $deliveryCharge = 100;
                                    $discount = 10;
                                } else if ($subTotal < 15000) {
                                    $deliveryCharge = 150;
                                    $discount = 15;
                                } else {
                                    $deliveryCharge = 200;
                                    $discount = 20;
                                }
                            }
                        } else {
                            $cart = true;
                            $getCart = mysqli_query($conn, "SELECT * FROM cart WHERE `uid`='$uid'");
                            $totalItems = mysqli_num_rows($getCart);
                            if ($totalItems == 0) {
                                $status = false;
                            }
                            while ($row = mysqli_fetch_assoc($getCart)) {
                                $pid = $row['pid'];
                                $qty = $row['cqty'];
                                $cid = $row['cid'];
                                $getProduct = mysqli_query($conn, "SELECT * FROM `products` WHERE `pid` = '$pid'");
                                $product = mysqli_fetch_assoc($getProduct);
                                $name = $product['name'];
                                $price = $product['price'];
                                $disc = $product['disc'];
                                $image = $product['imgurl'];
                                $subTotal += ($price - ($price * $disc) / 100) * $qty;

                                if ($status) {
                                    echo '
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="' . $image . '" alt="">
                                            </div>
                                            <div class="product-info">
                                                <div class="name">
                                                    <h4>' . $name . '</h4>
                                                </div>
                                                <div class="price">
                                                    <span>₹' . number_format($price - ($price * $disc) / 100, 0) . '/-</span>
                                                </div>
                                                <div class="discount">
                                                    <span class="disc">' . $disc . '% OFF</span>&nbsp;&nbsp;<span
                                                        class="original-price">₹' . $price . '/-</span>
                                                </div>
                                                <div class="quantity">
                                                    <div class="decrease"><i class="fa-solid fa-minus"></i></div>
                                                    <input type="number" name="qty" id="cqty' . $cid . '" value="' . $qty . '" max="10" min="1">
                                                    <div class="increase"><i class="fa-solid fa-plus"></i></div>
                                                </div>
                                                <div class="remove" id="remove' . $cid . '">
                                                    <button>Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                                }
                            }
                            if ($subTotal < 500) {
                                $deliveryCharge = 50;
                                $discount = 0;
                            } else if ($subTotal < 2000) {
                                $deliveryCharge = 70;
                                $discount = 5;
                            } else if ($subTotal < 5000) {
                                $deliveryCharge = 100;
                                $discount = 10;
                            } else if ($subTotal < 15000) {
                                $deliveryCharge = 150;
                                $discount = 15;
                            } else {
                                $deliveryCharge = 200;
                                $discount = 20;
                            }
                        }
                        $total = number_format(($subTotal - ($subTotal * $discount) / 100) + $deliveryCharge, 0);

                        ?>
                    </div>
                    <div class="summary">
                        <?php
                        if ($status) {
                            echo ' 
                                <div class="checkout-summary">
                                    <h3>Checkout Summary</h3>
                                    <div class="count-subtotal">
                                        <p>Total Items: <span>' . $totalItems . '</span></p>
                                        <p>Subtotal: <span>₹' . number_format($subTotal, 0) . '/-</span></p>
                                        <p>Discount: <span>' . $discount . '% OFF</span></p>
                                        <p>Delivery Charge: <span>₹' . $deliveryCharge . '/-</span></p>
                                    </div>
                                    <div class="total">
                                        <p>Total: <span>₹' . $total . '/-</span></p>
                                    </div>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                </div>
                <?php
                if ($status) {
                    if ($cart) {
                        echo '
                            <div class="payment">
                                <div class="pay-btn">
                                    <button onclick="cartItem()">Pay Given Amount</button>
                                    <h5> ₹' . $total . '/- </h5>
                                </div>
                            </div>
                        ';
                    } else {
                        echo '
                            <div class="payment">
                                <div class="pay-btn">
                                    <button onclick="oneItem(' . $pid . ', ' . $qty . ')">Pay Given Amount</button>
                                    <h5> ₹' . $total . '/- </h5>
                                </div>
                            </div>
                        ';
                    }
                }
                ?>
            </div>
        </div>

        <script>

            // ----------------------------------------
            // -------------- Change Qty --------------
            // ----------------------------------------
            let dec = document.querySelector('.decre');
            let inc = document.querySelector('.incre');


            // For Direct Buy Now
            dec.addEventListener('click', () => {
                let qty = dec.parentNode.childNodes[3].valueAsNumber;
                if (qty > 1) {
                    qty = qty - 1;
                }
                let pid = dec.parentNode.childNodes[3].id.slice(3);
                window.location = `checkOut.php?pid=${pid}&qty=${qty}&location=checkOut.php`;
            })

            inc.addEventListener('click', () => {
                let qty = inc.parentNode.childNodes[3].valueAsNumber;
                if (qty < 10) {
                    qty = qty + 1;
                }
                let pid = inc.parentNode.childNodes[3].id.slice(3);
                console.log(pid)
                window.location = `checkOut.php?pid=${pid}&qty=${qty}&location=checkOut.php`;
            })

            // For Carts Item

            let decrease = document.querySelectorAll('.decrease');
            let increase = document.querySelectorAll('.increase');

            Array.from(decrease).forEach(element => {
                element.addEventListener('click', () => {
                    // alert('decrease');
                    let qty = element.parentNode.childNodes[3].valueAsNumber;
                    if (qty > 1) {
                        qty = qty - 1;
                    }
                    let cid = element.parentNode.childNodes[3].id.slice(4);
                    window.location = `checkOut.php?update=${cid}&qty=${qty}`;
                })
            });

            Array.from(increase).forEach(element => {
                element.addEventListener('click', () => {
                    let qty = element.parentNode.childNodes[3].valueAsNumber;
                    if (qty < 10) {
                        qty = qty + 1;
                    }
                    let cid = element.parentNode.childNodes[3].id.slice(4);
                    window.location = `checkOut.php?update=${cid}&qty=${qty}`;
                })
            });

            function remove() {
                const product = document.querySelector('.product-detail');
                const payment = document.querySelector('.payment');
                product.style.display = 'none';
                payment.style.display = 'none';
            }

            // ----------------------------------------
            // -------------- Remove Item -------------
            // ----------------------------------------
            let removeBtn = document.querySelectorAll('.remove');
            Array.from(removeBtn).forEach(element => {
                element.addEventListener('click', () => {
                    let cid = element.id.slice(6);
                    window.location = `checkOut.php?delete=${cid}`;
                })
            })

            // ----------------------------------------
            // -------------- Pay Amount --------------
            // ----------------------------------------

            function cartItem() {
                window.location = `orders.php?cart=true`;
            }

            function oneItem(pid, qty) {
                window.location = `orders.php?cart=false&pid=${pid}&qty=${qty}`;
            }
        </script>
    </body>

</html>