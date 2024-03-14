<?php

include "authguard.php";

include "menu.html";

$delete = false;

if (isset($_GET['delete'])) {
    $wid = $_GET['delete'];
    $delete = true;
    include_once "../Shared/connection.php";
    $deleteQuery = mysqli_query($conn, "DELETE FROM `wishlist` WHERE `wishlist`.wid = '$wid'");
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wishlist</title>
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
            /* ----------- wishlist Body ----------- */
            /* --------------------------------- */
            .wishlist-container {
                width: 100%;
                margin: 80px 3% 0 3%;
                display: flex;
                justify-content: center;
                align-items: flex-start;
            }

            /* ---------------------------------- */
            /* --------------- wishlist ------------- */
            /* ---------------------------------- */
            .wishlist-container .wishlist {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
            }

            /* --------------------------------- */
            /* ----------- wishlist Title ---------- */
            /* --------------------------------- */
            .wishlist-container .wishlist .wishlist-title {
                width: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                border-bottom: 1px solid #c8c8c8;
            }

            .wishlist-container .wishlist .wishlist-title i {
                width: 50px;
                height: 50px;
                text-align: center;
                line-height: 50px;
                font-weight: 600;
                color: #2292d3;
            }

            .wishlist-container .wishlist .wishlist-title h1 {
                width: 80%;
                color: #2292d3;
                font-size: 1.5em;
            }

            /* --------------------------------- */
            /* ----------- wishlist Table ---------- */
            /* --------------------------------- */
            .wishlist-container .wishlist .wishlist-table {
                width: 100%;
                max-height: 500px;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                border-bottom: 1px solid #c8c8c8;
                overflow-y: scroll;
            }

            ::-webkit-scrollbar {
                width: 0;
            }

            .wishlist-container .wishlist .wishlist-table table {
                width: 100%;
            }

            /* ------------------------------------ */
            /* ----------- wishlist Table Row --------- */
            /* ------------------------------------ */
            .wishlist-container .wishlist .wishlist-table table tr {
                width: 100%;
                height: 45px;
            }

            .wishlist-container .wishlist .wishlist-table .table-head {
                background: #e8e8e8;
                position: sticky;
                top: 0;
            }

            .wishlist-container .wishlist .wishlist-table .table-body {
                background: #f5f5f5;
            }

            /* ------------------------------------ */
            /* ----------- wishlist Table Col --------- */
            /* ------------------------------------ */
            .wishlist-container .wishlist .wishlist-table table tr th,
            .wishlist-container .wishlist .wishlist-table table tr td {
                text-align: center;
                font-size: 0.8rem;
                color: #555;
            }

            .wishlist-container .wishlist .wishlist-table table tr .index-col {
                width: 30px;
            }

            .wishlist-container .wishlist .wishlist-table table tr .img-col {
                width: 40px;
            }

            .wishlist-container .wishlist .wishlist-table table tr .img-col img {
                width: 35px;
                height: 35px;
                border-radius: 50%;
                object-fit: fill;
            }

            .wishlist-container .wishlist .wishlist-table table tr .name-col {
                width: 40%;
            }

            .wishlist-container .wishlist .wishlist-table table tr .price {
                width: 50px;
            }

            .price::before {
                content: "₹";
            }

            .price::after {
                content: "/-";
            }

            .wishlist-container .wishlist .wishlist-table table tr .disc {
                width: 40px;
                color: red;
            }

            .disc::after {
                content: "% OFF";
            }

            .qty input {
                height: 30px;
                border: none;
                outline: none;
                border: 0.5px solid #c8c8c8;
                background: #f0f0f0;
                text-align: center;
                font-weight: 500;
                color: #555;
            }

            .wishlist-container .wishlist .wishlist-table table tr .wishlist-btn {
                width: 70px;
            }

            /* ------------------------------------- */
            /* --------- wishlist Table Button --------- */
            /* ------------------------------------- */
            .wishlist-container .wishlist .wishlist-table table tr td button {
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

            .wishlist-container .wishlist .wishlist-table table tr td button:hover {
                background: #1b7bbd;
            }

            .wishlist-container .wishlist .wishlist-table table tr td button:active {
                transform: scale(0.98);
            }
        </style>
    </head>

    <body>
        <div class="header">
            <?php include "menu.html" ?>
        </div>

        <div class="wishlist-container">
            <div class="wishlist">
                <div class="wishlist-title">
                    <i class="fa-solid fa-heart"></i>
                    <h1>Your Wishlist</h1>
                </div>
                <div class="wishlist-table">
                    <table>
                        <tr class="table-head">
                            <th>Sno</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Discounted Price</th>
                            <th>Remove</th>
                            <th>Add to Cart</th>
                        </tr>
                        <?php

                        include_once "../Shared/connection.php";
                        $uid = $_SESSION['uid'];
                        $wishlistQuery = mysqli_query($conn, "SELECT * FROM `wishlist` JOIN `products` ON `wishlist`.pid = `products`.pid WHERE `wishlist`.uid = '$uid'");

                        $totalItems = mysqli_num_rows($wishlistQuery);

                        if ($totalItems > 0) {
                            $sno = 0;
                            while ($row = mysqli_fetch_assoc($wishlistQuery)) {
                                $sno++;
                                $pid = $row['pid'];
                                $wid = $row['wid'];
                                $name = $row['name'];
                                $img = $row['imgurl'];
                                $price = $row['price'];
                                $disc = $row['disc'];
                                $discountedPrice = $price - ($price * $disc / 100);
                                echo '
                                <tr class="table-body">
                                    <td class="index-col font-weight">' . $sno . '</td>
                                    <td class="img-col">
                                        <img src="' . $img . '" alt="">
                                    </td>
                                    <td class="name-col font-weight">' . $name . '</td>
                                    <td class="price font-weight">' . $price . '</td>
                                    <td class="disc font-weight">' . $disc . '</td>
                                    <td class="price font-weight">' . number_format($discountedPrice, 0) . '</td>
                                    <td class="wishlist-btn"><button class="remove" id="remove' . $wid . '">Remove</button></td>
                                    <td class="wishlist-btn"><button class="add-cart" id="add' . $pid . '">Add to Cart</button></td>
                                </tr>
                                ';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <script>

            // -------------------------------------
            // --------- Remove from wishlist ----------
            // -------------------------------------
            const removebtn = document.querySelectorAll('.remove');
            Array.from(removebtn).forEach(element => {
                element.addEventListener('click', () => {
                    const wid = element.id.substr(6,);
                    if (confirm("Are you sure want to delete item?")) {
                        window.location = `viewWishlist.php?delete=${wid}`;
                    }
                })
            });

            const addwishlistbtn = document.querySelectorAll('.add-cart');
            Array.from(addwishlistbtn).forEach(element => {
                element.addEventListener('click', () => {
                    const pid = element.id.slice(3);
                    window.location = `cart.php?pid=${pid}&location=viewWishlist.php`;
                })
            })

        </script>
    </body>

</html>