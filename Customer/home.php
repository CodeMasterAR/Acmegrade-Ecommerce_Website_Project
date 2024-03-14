<?php

include "authguard.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ShopGlamor.com</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
        <style>
            .header {
                width: 100%;
                height: 120px;
                background: transparent;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 10;
            }

            .main-body {
                width: 100%;
                height: 620px;
                margin: 120px 3%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                background: transparent;
                border-top: 1px solid #e8e8e8;
            }


            /* ---------------------------------- */
            /* -------------- Section ----------- */
            /* ---------------------------------- */
            .main-body section {
                min-width: 300px;
                width: 100%;
                height: 100%;
                overflow: hidden;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                flex-flow: row wrap;
                overflow-y: scroll;
            }

            ::-webkit-scrollbar {
                width: 0px;
            }

            /* ---------------------------------- */
            /* --------- Product - Card --------- */
            /* ---------------------------------- */
            .main-body section .product-card {
                width: 100%;
                max-width: 220px;
                height: 385px;
                background: #f8f8f8;
                margin: 0 5px 5px 0;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                flex-direction: column;
                border-radius: none;
                border: 1px solid #e8e8e8;
                cursor: pointer;
            }

            .main-body section .product-card:hover {
                transform: scale(0.98);
            }

            /* ------------------------------------- */
            /* -------------- Image ----------------- */
            /* ------------------------------------- */
            .main-body section .product-card .img {
                width: 100%;
                height: 240px;
                background: #eee;
            }

            .main-body section .product-card .img img {
                width: 100%;
                height: 100%;
                object-fit: fill;
            }

            /* ------------------------------------- */
            /* -------------- Detail --------------- */
            /* ------------------------------------- */
            .main-body section .product-card .detail {
                width: 100%;
                height: 144px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-bottom: 2px;
                color: #777;
            }

            /* -------------------------------------- */
            /* -------------- Price ----------------- */
            /* -------------------------------------- */
            .main-body section .product-card .detail .price {
                width: 100%;
                font-size: 0.8rem;
                font-weight: 400;
                margin-bottom: 2px;
            }

            .main-body section .product-card .detail .price::before {
                content: "₹ ";
            }

            .main-body section .product-card .detail .price::after {
                content: " /-";
            }

            /* ---------------------------------------- */
            /* ------------------- Name --------------- */
            /* ---------------------------------------- */
            .main-body section .product-card .detail .name {
                width: 100%;
                font-size: 0.9em;
                font-weight: 500;
                margin-bottom: 2px;
            }

            /* -------------------------------------- */
            /* -------------- Discount -------------- */
            /* -------------------------------------- */
            .main-body section .product-card .detail .discount {
                width: 100%;
                font-size: 0.8rem;
                font-weight: 400;
                margin-bottom: 2px;
            }

            .main-body section .product-card .detail .discount span:nth-child(1) {
                color: red;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .main-body section .product-card .detail .discount span:nth-child(1)::after {
                content: "% Off";
            }

            .main-body section .product-card .detail .discount span:nth-child(2) {
                text-decoration: line-through;
                color: #777;
                font-weight: 400;
            }

            .main-body section .product-card .detail .discount span:nth-child(2)::before {
                content: "₹ ";
            }

            .main-body section .product-card .detail .discount span:nth-child(2)::after {
                content: " /-";
            }

            /* -------------------------------------- */
            /* -------------- Rating ---------------- */
            /* -------------------------------------- */
            .main-body section .product-card .detail .rating {
                width: 100%;
                height: 15px;
                font-size: 0.7em;
                margin-bottom: 5px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .rating .star-border {
                position: relative;
                width: 16px;
                height: 16px;
                display: inline-block;
                background: #eee;
                clip-path: polygon(50% 0%, 61% 38%, 100% 38%, 67% 60%, 78% 100%, 50% 76%, 22% 100%, 33% 60%, 0% 38%, 40% 38%);
            }

            .rating .star-border .rating-star {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 16px;
                height: 16px;
                transform: translate(-50%, -50%);
                background: #eee;
                clip-path: polygon(50% 0%, 61% 38%, 100% 38%, 67% 60%, 78% 100%, 50% 76%, 22% 100%, 33% 60%, 0% 38%, 40% 38%);
            }

            /* ---------------------------------------- */
            /* -------------- Add - Wishlit ----------- */
            /* ---------------------------------------- */
            .main-body section .product-card .detail .add-wishlist {
                width: 100%;
                height: 20px;
                padding: 3px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .main-body section .product-card .detail .add-wishlist button {
                border: none;
                outline: none;
                color: #fff;
                padding: 5px;
                font-size: 0.8em;
                font-weight: 500;
                background: #2292d3;
            }

            .main-body section .product-card .detail .add-wishlist button:hover {
                background: #1b7bbd;
            }

            .main-body section .product-card .detail .add-wishlist button:active {
                transform: scale(0.98);
            }
        </style>
    </head>

    <body>

        <div class="header">
            <?php
            include "menu.html";
            include "category.php";
            ?>
        </div>

        <div class='main-body'>

            <section>

                <?php
                include "../Shared/connection.php";
                $category = '';
                if (isset($_GET['search'])) {
                    $search = urldecode($_GET['search']);

                    $search = mysqli_real_escape_string($conn, $search);

                    $getQuery = mysqli_query($conn, "SELECT * FROM `products` JOIN `vendor` ON `products`.`vid` = `vendor`.`uid` WHERE `name` LIKE '%$search%' OR `category` LIKE '%$search%' OR `brand` LIKE '%$search%'");

                    if (mysqli_num_rows($getQuery) > 0) {
                        while ($findProduct = mysqli_fetch_assoc($getQuery)) {
                            $pid = $findProduct['pid'];
                            $pname = $findProduct['name'];
                            $price = $findProduct['price'];
                            $discount = $findProduct['disc'];
                            $img = $findProduct['imgurl'];

                            $ratings = mysqli_query($conn, "SELECT AVG(`rating`) FROM `rating` WHERE `pid` = '$pid'");
                            $totratings = mysqli_query($conn, "SELECT COUNT(`rating`) FROM `rating` WHERE `pid` = '$pid'");

                            $fetchrating = mysqli_fetch_assoc($ratings);
                            $fetchTotalRating = mysqli_fetch_assoc($totratings);

                            $totalRating = $fetchTotalRating['COUNT(`rating`)'];

                            $rating = round($fetchrating['AVG(`rating`)'], 1);

                            $discountedPrice = $price - ($price * ($discount / 100));

                            echo '
                                <div class="product-card" onclick="viewProduct(' . $pid . ')">
                                    <div class="img">
                                        <img src="' . $img . '" alt="">
                                    </div>
                                    <div class="detail">
                                        <div class="price">' . number_format($discountedPrice, 0) . '</div>
                                        <div class="name">' . $pname . '</div>
                                        <div class="discount">
                                            <span>' . $discount . '</span> &nbsp; <span>' . $price . '</span>
                                        </div>
                                        <div class="rating">
                                            <div class="stars" id="rating' . $pid . '">
                                                <div class="star-border">
                                                    <div class="rating-star"></div>
                                                </div>
                                                <div class="star-border">
                                                    <div class="rating-star"></div>
                                                </div>
                                                <div class="star-border">
                                                    <div class="rating-star"></div>
                                                </div>
                                                <div class="star-border">
                                                    <div class="rating-star"></div>
                                                </div>
                                                <div class="star-border">
                                                    <div class="rating-star"></div>
                                                </div>
                                            </div>&nbsp;&nbsp;
                                            <div class="rating-value">' . $rating . '</div> &nbsp;&nbsp;&nbsp;
                                            <div class="product-number">(' . $totalRating . ')</div>
                                        </div>
                                        <div class="add-wishlist">
                                            <button id="add-wish' . $pid . '" onclick="event.stopPropagation()">Add to Wishlist</button>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    } else {
                        echo "<h3>Product not Found</h3>";
                    }
                } else {

                    if (isset($_GET['category'])) {
                        $category = urldecode($_GET['category']);
                    }

                    if ($category == '' || $category == 'all') {
                        $productQuery = mysqli_query($conn, "SELECT * FROM products");
                        $totalProduct = mysqli_num_rows($productQuery);

                        if ($totalProduct > 0) {
                            while ($row = mysqli_fetch_assoc($productQuery)) {
                                $pid = $row['pid'];
                                $pname = $row['name'];
                                $price = $row['price'];
                                $discount = $row['disc'];
                                $img = $row['imgurl'];

                                $ratings = mysqli_query($conn, "SELECT AVG(`rating`) FROM `rating` WHERE `pid` = '$pid'");
                                $totratings = mysqli_query($conn, "SELECT COUNT(`rating`) FROM `rating` WHERE `pid` = '$pid'");

                                $fetchrating = mysqli_fetch_assoc($ratings);
                                $fetchTotalRating = mysqli_fetch_assoc($totratings);

                                $totalRating = $fetchTotalRating['COUNT(`rating`)'];

                                $rating = round($fetchrating['AVG(`rating`)'], 1);

                                $discountedPrice = $price - ($price * ($discount / 100));
                                $discountedPrice = $price - ($price * $discount) / 100;

                                echo '
                                    <div class="product-card" onclick="viewProduct(' . $pid . ')">
                                        <div class="img">
                                            <img src="' . $img . '" alt="">
                                        </div>
                                        <div class="detail">
                                            <div class="price">' . number_format($discountedPrice, 0) . '</div>
                                            <div class="name">' . $pname . '</div>
                                            <div class="discount">
                                                <span>' . $discount . '</span> &nbsp; <span>' . $price . '</span>
                                            </div>
                                            <div class="rating">
                                                <div class="stars" id="rating' . $pid . '">
                                                    <div class="star-border">
                                                        <div class="rating-star"></div>
                                                    </div>
                                                    <div class="star-border">
                                                        <div class="rating-star"></div>
                                                    </div>
                                                    <div class="star-border">
                                                        <div class="rating-star"></div>
                                                    </div>
                                                    <div class="star-border">
                                                        <div class="rating-star"></div>
                                                    </div>
                                                    <div class="star-border">
                                                        <div class="rating-star"></div>
                                                    </div>
                                                </div>&nbsp;&nbsp;
                                                <div class="rating-value">' . $rating . '</div> &nbsp;&nbsp;&nbsp;
                                                <div class="product-number">(' . $totalRating . ')</div>
                                            </div>
                                            <div class="add-wishlist">
                                                <button id="add-wish' . $pid . '" onclick="event.stopPropagation()">Add to Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                        } else {
                            echo "<h3>Product not Found</h3>";
                        }
                    } else {
                        $productQuery = mysqli_query($conn, "SELECT * FROM `products` WHERE `category` = '$category'");
                        $totalProduct = mysqli_num_rows($productQuery);

                        if ($totalProduct > 0) {

                            while ($row = mysqli_fetch_assoc($productQuery)) {
                                $pid = $row['pid'];
                                $pname = $row['name'];
                                $price = $row['price'];
                                $discount = $row['disc'];
                                $img = $row['imgurl'];

                                $ratings = mysqli_query($conn, "SELECT AVG(`rating`) FROM `rating` WHERE `pid` = '$pid'");
                                $totratings = mysqli_query($conn, "SELECT COUNT(`rating`) FROM `rating` WHERE `pid` = '$pid'");

                                $fetchrating = mysqli_fetch_assoc($ratings);
                                $fetchTotalRating = mysqli_fetch_assoc($totratings);

                                $totalRating = $fetchTotalRating['COUNT(`rating`)'];

                                $rating = round($fetchrating['AVG(`rating`)'], 1);

                                $discountedPrice = $price - ($price * ($discount / 100));
                                $discountedPrice = $price - ($price * $discount) / 100;

                                echo '
                                        <div class="product-card" onclick="viewProduct(' . $pid . ')">
                                            <div class="img">
                                                <img src="' . $img . '" alt="">
                                            </div>
                                            <div class="detail">
                                                <div class="price">' . number_format($discountedPrice, 0) . '</div>
                                                <div class="name">' . $pname . '</div>
                                                <div class="discount">
                                                    <span>' . $discount . '</span> &nbsp; <span>' . $price . '</span>
                                                </div>
                                                <div class="rating">
                                                    <div class="stars" id="rating' . $pid . '">
                                                        <div class="star-border">
                                                            <div class="rating-star"></div>
                                                        </div>
                                                        <div class="star-border">
                                                            <div class="rating-star"></div>
                                                        </div>
                                                        <div class="star-border">
                                                            <div class="rating-star"></div>
                                                        </div>
                                                        <div class="star-border">
                                                            <div class="rating-star"></div>
                                                        </div>
                                                        <div class="star-border">
                                                            <div class="rating-star"></div>
                                                        </div>
                                                    </div>&nbsp;&nbsp;
                                                    <div class="rating-value">' . $rating . '</div> &nbsp;&nbsp;&nbsp;
                                                    <div class="total-rating">(' . $totalRating . ')</div>
                                                </div>
                                                <div class="add-wishlist">
                                                    <button id="add-wish' . $pid . '" onclick="event.stopPropagation()">Add to Wishlist</button>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                            }
                        } else {
                            echo "<h3>No Product Found</h3>";
                        }
                    }
                }
                ?>
            </section>
        </div>

        <script>

            <?php
            echo 'cat_name.innerText = "' . $category . '"';
            ?>

            function addItem(pid) {
                window.location = `wishlist.php?pid=${pid}`;
            }

            function viewProduct(pid) {
                window.location = `viewProduct.php?pid=${pid}`;
            }

            const addWish = document.querySelectorAll(".add-wishlist button");
            Array.from(addWish).forEach((btn) => {
                btn.addEventListener("click", e => {
                    window.location = `wishlist.php?pid=${btn.id.slice(8)}`;
                })
            })

            const stars = document.querySelectorAll(".stars");
            Array.from(stars).forEach(element => {
                const ID = element.id;
                const star = document.querySelectorAll(`#${ID} .rating-star`);
                const rating = parseFloat(document.querySelector(`#${ID} ~ .rating-value`).innerText);
                let floor = Math.floor(rating);
                let decimal = rating - floor;
                let ceil = Math.ceil(rating);
                for (let i = 0; i < 5; i++) {
                    if (i < floor) {
                        star[i].style.background = "linear-gradient(90deg, #ffaa00 100%, #eee 0%)";
                    }
                    else if (i < ceil) {
                        star[i].style.background = `linear-gradient(90deg, #ffaa00 ${decimal * 100}%, #ccc 0%)`;
                    }
                    else {
                        star[i].style.background = "linear-gradient(90deg, #ffaa00 0%, #ccc 0%)";
                    }
                }
            })

            // ----------------------------------
            // -- Set the input min max values --
            // ----------------------------------

            // ----------------------------------
            // -------------- Price -------------
            // ----------------------------------
            <?php
            if ($category == '' || $category == 'all') {
                $priceQuery = mysqli_query($conn, "SELECT MIN(`price`) AS `min`, MAX(`price`) AS `max` FROM `products`");
            } else {
                $priceQuery = mysqli_query($conn, "SELECT MIN(`price`) AS `min`, MAX(`price`) AS `max` FROM `products` WHERE `category` = '$category'");
            }

            $priceRow = mysqli_fetch_assoc($priceQuery);

            $minPrice = $priceRow['min'];
            $maxPrice = $priceRow['max'];
            ?>

            const priceInput = document.querySelectorAll(".price-input input");
            const rangeInput = document.querySelectorAll(".price-range-input input");
            const progress = document.querySelector(".slider .price-progress");
            rangeInput[0].min = <?php echo $minPrice; ?>;
            rangeInput[0].max = <?php echo $maxPrice; ?>;
            rangeInput[1].min = <?php echo $minPrice; ?>;
            rangeInput[1].max = <?php echo $maxPrice; ?>;

            // console.log(rangeInput[0].min, rangeInput[0].max, rangeInput[1].min, rangeInput[1].max);
            priceInput[0].value = Math.floor((rangeInput[0].max - rangeInput[0].min) / 4);
            priceInput[1].value = Math.ceil((rangeInput[1].max - rangeInput[1].min) * 3 / 4);
            // console.log(priceInput[0].value, priceInput[1].value);

            rangeInput[0].value = priceInput[0].value;
            rangeInput[1].value = priceInput[1].value;

            let minVal = priceInput[0].value, maxVal = priceInput[1].value;
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";

            let priceGap = Math.floor((rangeInput[1].max - rangeInput[1].min) / 10);
            priceInput.forEach(element => {
                element.addEventListener("input", e => {
                    minVal = parseInt(priceInput[0].value);
                    maxVal = parseInt(priceInput[1].value);

                    if ((maxVal - minVal >= priceGap) && maxVal <= 10000) {
                        if (e.target.className === "input-min") {
                            rangeInput[0].value = minVal;
                            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        }
                        else {
                            rangeInput[1].value = maxVal;
                            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                        }
                    }
                })
            })
            rangeInput.forEach(element => {
                element.addEventListener("input", e => {
                    let minVal = parseInt(rangeInput[0].value),
                        maxVal = parseInt(rangeInput[1].value);

                    if (maxVal - minVal < priceGap) {
                        if (e.target.className === "range-min") {
                            rangeInput[0].value = maxVal - priceGap;
                        }
                        else {
                            rangeInput[1].value = minVal + priceGap;
                        }
                    }
                    else {
                        priceInput[0].value = minVal;
                        priceInput[1].value = maxVal;
                        progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                        progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";

                    }
                })
            })


            // -------------------------------------------
            // ----------------- Fliter ------------------
            // -------------------------------------------

            // ---------------- Price -------------------


            // ---------------- Rating ----------------



            // ---------------- Views -----------------
            // const viewrangeInput = document.querySelectorAll(".view-range-input input"),
            //     viewInput = document.querySelectorAll(".view-input input"),
            //     viewprogress = document.querySelector(".slider .view-progress");

            // let viewGap = 1000;
            // viewInput.forEach(element => {
            //     element.addEventListener("input", e => {
            //         let minVal = parseInt(viewInput[0].value),
            //             maxVal = parseInt(viewInput[1].value);

            //         if ((maxVal - minVal >= viewGap) && maxVal <= 10000) {
            //             if (e.target.className === "view-input-min") {
            //                 viewrangeInput[0].value = minVal;
            //                 viewprogress.style.left = (minVal / viewrangeInput[0].max) * 100 + "%";
            //             }
            //             else {
            //                 viewrangeInput[1].value = maxVal;
            //                 viewprogress.style.right = 100 - (maxVal / viewrangeInput[1].max) * 100 + "%";
            //             }
            //         }
            //     })
            // })
            // viewrangeInput.forEach(element => {
            //     element.addEventListener("input", e => {
            //         let minVal = parseInt(viewrangeInput[0].value),
            //             maxVal = parseInt(viewrangeInput[1].value);

            //         if (maxVal - minVal < viewGap) {
            //             if (e.target.className === "view-range-min") {
            //                 viewrangeInput[0].value = maxVal - viewGap;
            //             }
            //             else {
            //                 viewrangeInput[1].value = minVal + viewGap;
            //             }
            //         }
            //         else {
            //             viewInput[0].value = minVal;
            //             viewInput[1].value = maxVal;
            //             viewprogress.style.left = (minVal / viewrangeInput[0].max) * 100 + "%";
            //             viewprogress.style.right = 100 - (maxVal / viewrangeInput[1].max) * 100 + "%";
            //         }
            //     })
            // })

            // ----------------------------------------------
            // ----------------- Apply Filter ---------------
            // ----------------------------------------------

            const apply = document.querySelectorAll(".filter-btn button");
            Array.from(apply).forEach(element => {
                element.addEventListener('click', () => {
                    let getId = element.getAttribute('id');
                    console.log(getId);
                    if (getId === "price") {
                        alert('Price Filter Applied');
                        <?php
                        if ($category == '' || $category == 'all') {
                            echo 'window.location = `home.php?min=${minVal}&max=${maxVal}`;';
                        } else {
                            echo 'window.location = `home.php?category=' . $category . '&min=${minVal}&max=${maxVal}`';
                        }
                        ?>
                    }
                })
            })

        </script>
    </body>

</html>