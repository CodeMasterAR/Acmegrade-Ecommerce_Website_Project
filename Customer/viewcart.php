<?php

include "authguard.php";

include "menu.html";

if (isset($_GET['delete'])) {
    $cid = $_GET['delete'];
    include_once "../Shared/connection.php";
    $deleteQuery = mysqli_query($conn, "DELETE FROM `cart` WHERE `cart`.cid = '$cid'");
}
if (isset($_GET['update']) && isset($_GET['qty'])) {
    $cid = $_GET['update'];
    $qty = $_GET['qty'];
    include_once "../Shared/connection.php";
    $updateQuery = mysqli_query($conn, "UPDATE `cart` SET `cqty` = '$qty' WHERE `cart`.cid = '$cid'");
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart</title>
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

            .font-weight {
                font-weight: 500;
            }

            /* --------------------------------- */
            /* ----------- Cart Body ----------- */
            /* --------------------------------- */
            .cart-container {
                width: 100%;
                margin: 80px 3% 0 3%;
                display: flex;
                justify-content: center;
                align-items: flex-start;
            }

            /* ---------------------------------- */
            /* --------------- Cart ------------- */
            /* ---------------------------------- */
            .cart-container .cart {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
            }

            /* --------------------------------- */
            /* ----------- Cart Title ---------- */
            /* --------------------------------- */
            .cart-container .cart .cart-title {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                border-bottom: 1px solid #c8c8c8;
            }

            .cart-container .cart .cart-title i {
                width: 50px;
                height: 50px;
                text-align: center;
                line-height: 50px;
                font-weight: 600;
                color: #2292d3;
            }

            .cart-container .cart .cart-title h1 {
                width: 80%;
                color: #2292d3;
                font-size: 1.5em;
            }

            /* --------------------------------- */
            /* ----------- Cart Table ---------- */
            /* --------------------------------- */
            .cart-container .cart .cart-table {
                width: 100%;
                max-height: 400px;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                border-bottom: 1px solid #c8c8c8;
                overflow-y: scroll;
            }

            ::-webkit-scrollbar {
                width: 0;
            }

            .cart-container .cart .cart-table table {
                width: 100%;
            }

            /* ------------------------------------ */
            /* ----------- Cart Table Row --------- */
            /* ------------------------------------ */
            .cart-container .cart .cart-table table tr {
                width: 100%;
                height: 45px;
            }

            .cart-container .cart .cart-table .table-head {
                background: #e8e8e8;
                position: sticky;
                top: 0;
            }

            .cart-container .cart .cart-table .table-body {
                background: #f5f5f5;
            }

            /* ------------------------------------ */
            /* ----------- Cart Table Col --------- */
            /* ------------------------------------ */
            .cart-container .cart .cart-table table tr th,
            .cart-container .cart .cart-table table tr td {
                text-align: center;
                font-size: 0.8rem;
                color: #555;
            }

            .cart-container .cart .cart-table table tr .index-col {
                width: 30px;
            }

            .cart-container .cart .cart-table table tr .img-col {
                width: 40px;
            }

            .cart-container .cart .cart-table table tr .img-col img {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                object-fit: fill;
            }

            .cart-container .cart .cart-table table tr .name-col {
                width: 40%;
            }

            .cart-container .cart .cart-table table tr .price {
                width: 50px;
            }

            .price::before {
                content: "₹ ";
            }

            .price::after {
                content: "/-";
            }

            .cart-container .cart .cart-table table tr .quantity {
                width: 80px;
            }

            .cart-container .cart .cart-table table tr .quantity div {
                display: inline-block;
            }

            .cart-container .cart .cart-table table tr .quantity div {
                width: 20px;
                height: 20px;
                text-align: center;
                line-height: 20px;
                font-weight: 600;
                border-radius: 50%;
                color: #555;
                cursor: pointer;
                background: #f2f2f2;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            }

            .cart-container .cart .cart-table table tr .quantity div:active {
                transform: scale(0.98);
                box-shadow: none;
            }

            .cart-container .cart .cart-table table tr .quantity input {
                width: 40px;
                height: 20px;
                text-align: center;
                line-height: 20px;
                font-weight: 600;
                border: none;
                outline: none;
                background: none;
                margin: 0 5px;
            }

            input::-webkit-inner-spin-button {
                appearance: none;
            }

            .cart-container .cart .cart-table table tr .cart-btn {
                width: 70px;
            }

            /* ------------------------------------- */
            /* --------- Cart Table Button --------- */
            /* ------------------------------------- */
            .cart-container .cart .cart-table table tr td button {
                width: 80%;
                height: 100%;
                border: none;
                outline: none;
                background: #2292d3;
                cursor: pointer;
                color: #fff;
                font-size: 0.85em;
                font-weight: 500;
                padding: 8px 0;
                margin: 3px 0;
                border-radius: 3px;
            }

            .cart-container .cart .cart-table table tr td button:hover {
                background: #1b7bbd;
            }

            .cart-container .cart .cart-table table tr td button:active {
                transform: scale(0.98);
            }

            /* --------------------------------------- */
            /* ------------- Cart Summary ------------ */
            /* --------------------------------------- */
            .summary {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
            }

            .summary .buy-btn {
                max-width: 300px;
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: flex-start;
                margin: 10px 0;
            }

            .summary .buy-btn button {
                width: 100%;
                height: 100%;
                border: none;
                outline: none;
                background: #2292d3;
                cursor: pointer;
                color: #fff;
                font-size: 1em;
                font-weight: 500;
                padding: 8px 0;
                margin: 3px 0;
                border-radius: 3px;
            }

            .buy-btn button:hover {
                background: #1b7bbd;
            }

            .buy-btn button:active {
                transform: scale(0.98);
            }

            .cart-container .cart .cart-summary {
                width: 300px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                justify-self: flex-end;
                align-items: center;
                margin: 10px 0;
                border-top: 1px solid #c8c8c8;
                border-bottom: 1px solid #c8c8c8;
            }

            .cart-container .cart .cart-summary h3 {
                width: 100%;
                text-align: center;
                background: #e8e8e8;
                color: #555;
                font-size: 1em;
                padding: 6px 0;
                margin: 0;
            }

            .cart-container .cart .cart-summary .count-subtotal {
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

            .cart-container .cart .cart-summary .count-subtotal p {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 0.8em;
                color: #555;
                margin: 5px 0;
            }

            .cart-container .cart .cart-summary .total {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 0.8em;
                color: #555;
                padding: 5px 10px;
                background: #f5f5f5;
            }

            .cart-container .cart .cart-summary .total p {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;
                font-size: 1em;
                color: #555;
                margin: 0;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <?php include "menu.html" ?>
        </div>

        <div class="cart-container">
            <div class="cart">
                <div class="cart-title">
                    <i class="fa-brands fa-opencart"></i>
                    <h1>Your Cart</h1>
                </div>
                <div class="cart-table">
                    <table>
                        <tr class="table-head">
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                        <?php

                        include_once "../Shared/connection.php";
                        $uid = $_SESSION['uid'];
                        $cartQuery = mysqli_query($conn, "SELECT * FROM `cart` JOIN `products` ON `cart`.pid = `products`.pid WHERE `cart`.uid = '$uid'");

                        $totalItems = mysqli_num_rows($cartQuery);
                        $summary_status = false;
                        if ($totalItems > 0) {
                            $summary_status = true;
                            $sno = 0;
                            $subTotal = 0;
                            $discount = 0;
                            $delivery_charge = 0;
                            $total = 0;
                            while ($row = mysqli_fetch_assoc($cartQuery)) {
                                $sno++;
                                $pid = $row['pid'];
                                $cid = $row['cid'];
                                $name = $row['name'];
                                $img = $row['imgurl'];
                                $price = $row['price'];
                                $qty = $row['cqty'];
                                $disc = $row['disc'];
                                $subTotal += ($price - ($price * $disc) / 100) * $qty;
                                $discountedPrice = $price - ($price * $disc) / 100;

                                echo '
                                <tr class="table-body">
                                    <td class="index-col font-weight">' . $sno . '</td>
                                    <td class="img-col">
                                        <img src="' . $img . '" alt="">
                                    </td>
                                    <td class="name-col font-weight">' . $name . '</td>
                                    <td class="price font-weight">' . number_format($discountedPrice, 0) . '</td>
                                    <td class="quantity">
                                        <div class="decrease"><i class="fa-solid fa-minus"></i></div>
                                        <input type="number" name="qty" id="qty' . $cid . '" value="' . $qty . '" max="10" min="1">
                                        <div class="increase"><i class="fa-solid fa-plus"></i></div>
                                    </td>
                                    <td class="cart-btn"><button class="remove" id="remove' . $cid . '">Remove</button></td>
                                </tr>
                                ';
                            }

                            if ($subTotal < 500) {
                                $delivery_charge = 50;
                                $discount = 0;
                            } else if ($subTotal < 2000) {
                                $delivery_charge = 70;
                                $discount = 5;
                            } else if ($subTotal < 5000) {
                                $delivery_charge = 100;
                                $discount = 10;
                            } else if ($subTotal < 15000) {
                                $delivery_charge = 150;
                                $discount = 15;
                            } else {
                                $delivery_charge = 200;
                                $discount = 20;
                            }

                            $total = number_format(($subTotal - ($subTotal * $discount) / 100) + $delivery_charge, 0);
                        }
                        ?>
                    </table>
                </div>
                <div class="summary">
                    <?php
                    if ($summary_status) {
                        echo '
                            <div class="buy-btn">
                                <button>Place Order</button>
                            </div>
                            <div class="cart-summary">
                                <h3>Cart Summary</h3>
                                <div class="count-subtotal">
                                    <p>Total Items: <span>' . $totalItems . '</span></p>
                                    <p>Subtotal: <span>₹ ' . number_format($subTotal, 0) . '/-</span></p>
                                    <p>Discount: <span>' . $discount . '% OFF</span></p>
                                    <p>Delivery Charge: <span>₹' . $delivery_charge . '/-</span></p>
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
        </div>
        <script>

            // -------------------------------------
            // --------- Remove from cart ----------
            // -------------------------------------
            const removebtn = document.querySelectorAll('.remove');
            Array.from(removebtn).forEach(element => {
                element.addEventListener('click', e => {
                    const cartid = e.target.id.substr(6,);
                    if (confirm("Are you sure want to delete item?")) {
                        window.location = `viewcart.php?delete=${cartid}`;
                    }
                })
            });

            // -------------------------------------
            // ------------ Cart Summary -----------
            // -------------------------------------
            const placeOrder = document.querySelector('.buy-btn button');
            placeOrder.addEventListener('click', () => {
                let location = 'viewCart.php';
                window.location = 'checkOut.php?location=' + location;
            })

            // -------------------------------------
            // ------------ Quantity ---------------
            // -------------------------------------
            const increase = document.querySelectorAll('.increase');
            const decrease = document.querySelectorAll('.decrease');
            Array.from(increase).forEach(element => {
                element.addEventListener('click', () => {
                    let qty = element.parentNode.childNodes[3].valueAsNumber;
                    if (qty < 10) {
                        qty = qty + 1;
                    }
                    let cid = parseInt(element.parentNode.childNodes[3].id.slice(3));
                    window.location = `viewCart.php?update=${cid}&qty=${qty}`;
                })
            })

            Array.from(decrease).forEach(element => {
                element.addEventListener('click', () => {
                    let qty = element.parentNode.childNodes[3].valueAsNumber;
                    if (qty > 1) {
                        qty = qty - 1;
                    }
                    let cid = parseInt(element.parentNode.childNodes[3].id.slice(3));
                    window.location = `viewCart.php?update=${cid}&qty=${qty}`;
                })
            })
        </script>
    </body>

</html>