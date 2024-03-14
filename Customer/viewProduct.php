<?php

include_once "authguard.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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

            /* ---------------------------------------- */
            /* ---------- Product container ----------- */
            /* ---------------------------------------- */
            .product-container {
                width: 70%;
                margin: 80px 3% 0 3%;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                background: #efefef;
                /* border: 1px solid firebrick; */
            }

            /* ------------------------------------- */
            /* -------------- left ----------------- */
            /* ------------------------------------- */
            .product-container .product-left {
                width: 100%;
                height: 350px;
                float: left;
                flex-basis: 30%;
            }

            /* -------------------------------------- */
            /* -------------- product img ----------- */
            /* -------------------------------------- */
            .product-container .product-left .product-img {
                min-width: 200px;
                width: 100%;
                height: 100%;
                float: left;
                background: #e8e8e8;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .product-container .product-left .product-img img {
                width: 100%;
                height: 100%;
                object-fit: fill;
            }

            /* ------------------------------------- */
            /* -------------- right ---------------- */
            /* ------------------------------------- */
            .product-container .product-right {
                min-width: 200px;
                width: 80%;
                height: 350px;
                float: left;
                padding: 0 5px;
                background: #e8e8e8;
                flex-basis: 70%;
            }

            .product-container .product-right .product-detail {
                width: 100%;
                height: 100%;
                float: left;
                color: #555;
            }

            /* ------------------------------------ */
            /* -------------- name ---------------- */
            /* ------------------------------------ */
            .product-container .product-right .product-detail .product-name {
                width: 100%;
                height: 45px;
                float: left;
                padding: 0 5px;
            }

            .product-container .product-right .product-detail .product-name h1 {
                font-size: 1.3rem;
                font-weight: 500;
            }

            /* ------------------------------------ */
            /* -------------- brand --------------- */
            /* ------------------------------------ */
            .product-container .product-right .product-detail .brand-name {
                width: 100%;
                height: 30px;
                float: left;
                padding: 0 5px;
            }

            .product-container .product-right .product-detail .brand-name h3 {
                font-size: 1.1rem;
                font-weight: 500;
            }

            /* ---------------------------------------- */
            /* ------------- product price ------------ */
            /* ---------------------------------------- */
            .product-container .product-right .product-detail .product-price {
                width: 100%;
                float: left;
                padding: 0 5px;
                font-size: 20px;
                font-weight: 500;
            }

            .price::before {
                content: "₹";
            }

            .price::after {
                content: "/-";
            }

            /* ---------------------------------------- */
            /* ------------- product discount --------- */
            /* ---------------------------------------- */
            .product-container .product-right .product-detail .product-discount {
                width: 100%;
                float: left;
                padding: 5px 5px;
                font-size: 20px;
                font-weight: 500;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .discount {
                color: red;
                font-size: 25px;
                font-weight: 500;
            }

            .discount::after {
                content: "% OFF";
            }

            .product-discount .price {
                text-decoration: line-through;
                color: #555;
                font-size: 15px;
                font-weight: 500;
                margin-left: 10px;
            }

            /* ---------------------------------------- */
            /* ------------- product rating ----------- */
            /* ---------------------------------------- */
            .product-container .product-right .product-detail .product-rating {
                width: 100%;
                float: left;
                padding: 5px 5px;
                font-size: 15px;
                font-weight: 500;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .product-rating .star-border {
                position: relative;
                width: 25px;
                height: 25px;
                display: inline-block;
                background: #f9f9f9;
                clip-path: polygon(50% 0%, 61% 38%, 100% 38%, 67% 60%, 78% 100%, 50% 76%, 22% 100%, 33% 60%, 0% 38%, 40% 38%);
            }

            .product-rating .rating-star {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 25px;
                height: 25px;
                transform: translate(-50%, -50%);
                background: #f9f9f9;
                clip-path: polygon(50% 0%, 61% 38%, 100% 38%, 67% 60%, 78% 100%, 50% 76%, 22% 100%, 33% 60%, 0% 38%, 40% 38%);
            }


            /* ---------------------------------------- */
            /* ------------ product quantity----------- */
            /* ---------------------------------------- */
            .product-container .product-right .product-detail .quantity {
                width: 100%;
                float: left;
                padding: 5px 5px;
                font-size: 15px;
                font-weight: 500;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                flex-direction: column;
            }

            .quantity input {
                width: 50px;
                height: 30px;
                text-align: center;
                border: none;
                outline: none;
                font-size: 20px;
                font-weight: 500;
                background: none;
                padding: 10px;
                color: #555;
                background: #f2f2f2;
                margin: 0 10px;
            }

            .quantity input::-webkit-inner-spin-button {
                appearance: none;
            }

            .product-detail .quantity .enter-qty {
                width: 100%;
                float: left;
                font-size: 15px;
                font-weight: 500;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                padding: 10px 0;
            }

            .enter-qty .decrease,
            .enter-qty .increase {
                width: 30px;
                height: 30px;
                background: #e2e2e2;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-size: 1.2rem;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            }

            .enter-qty .decrease:active,
            .enter-qty .increase:active {
                box-shadow: none;
                transform: scale(0.98);
            }

            /* ---------------------------------- */
            /* ------------ buttons ------------- */
            /* ---------------------------------- */
            .product-container .product-detail .buttons {
                width: 100%;
                float: left;
                padding: 10px 5px;
                font-size: 15px;
                font-weight: 500;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .buttons button {
                width: 150px;
                height: 45px;
                border: none;
                outline: none;
                font-size: 1rem;
                font-weight: 500;
                background: #2292d3;
                margin-right: 10px;
                cursor: pointer;
                color: #fff;
                border-radius: 3px;
            }

            .buttons button:hover {
                background: #1b7bbd;
            }

            .buttons button:active {
                transform: scale(0.98);
            }

            /* ------------------------------------------ */
            /* ------------------ footer ---------------- */
            /* ------------------------------------------ */
            .footer {
                width: 100%;
                height: 320px;
                background: #e8e8e8;
                position: fixed;
                bottom: 0;
                left: 0;
                z-index: 10;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
            }

            /* -------------------------------------------- */
            /* ------------------ footer nav --------------- */
            /* -------------------------------------------- */
            .footer .footer-nav {
                width: 80%;
                height: 50px;
                background: #d8d8d8;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .footer .footer-container {
                width: 80%;
                height: 270px;
                background: #eee;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .footer .footer-nav .detail,
            .footer .footer-nav .review {
                position: relative;
                min-width: 120px;
                width: 200px;
                height: 100%;
                border: 0.5px solid #d2d2d2;
                background: #ddd;
                text-transform: uppercase;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-weight: 500;
                color: #555;
            }

            .footer .footer-nav .detail:hover,
            .footer .footer-nav .review:hover {
                background: #e4e4e4;
            }

            /* ---------------------------------------- */
            /* -------------- footer detail ------------ */
            /* ---------------------------------------- */
            .footer .footer-container .footer-detail {
                display: block;
                width: 100%;
                height: 100%;
                padding: 10px;
                overflow-y: scroll;
                font-size: 15px;
                font-weight: 500;
                color: #555;
                text-align: justify;
            }

            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            ::-webkit-scrollbar-thumb {
                background: #2292d3;
                border-radius: 5px;
            }

            /* --------------------------------------- */
            /* -------------- footer review ----------- */
            /* --------------------------------------- */
            .footer .footer-container .footer-review {
                display: none;
                width: 100%;
                height: 100%;
            }

            .footer .footer-container .footer-review .review-box {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* ------------------------------------------ */
            /* -------------- read review ---------------- */
            /* ------------------------------------------ */
            .footer .footer-container .footer-review .read-review {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                flex-basis: 70%;
                overflow-y: scroll;
            }

            .footer .footer-container .footer-review .read-review .see-review {
                width: 100%;
                height: 70px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                margin-bottom: 5px;
            }

            .read-review .see-review .user-icon {
                width: 70px;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .user-icon i {
                width: 35px;
                height: 35px;
                background: #fff;
                line-height: 35px;
                text-align: center;
                border-radius: 50%;
                color: #777;
            }

            .read-review .see-review .reviews {
                width: 100%;
                height: 100%;
                padding-left: 5px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
                color: #555;
                border-bottom: 0.5px solid #dfdfdf;
            }

            .read-review .see-review .reviews .name-time {
                width: 100%;
                height: 15px;
                font-size: 15px;
                font-weight: 500;
                margin-bottom: 15px;
            }

            .read-review .see-review .reviews .review {
                width: 100%;
                height: 40px;
                font-size: 13px;
                font-weight: 400;
                overflow-y: scroll;
                line-height: 17px;
            }

            .review::-webkit-scrollbar {
                width: 0px;
            }

            /* ---------------------------------------- */
            /* -------------- Give review -------------- */
            /* ---------------------------------------- */
            .footer .footer-container .footer-review .give-review {
                min-width: 200px;
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                flex-basis: 30%;
                border-left: 1px solid #dfdfdf;
                padding: 0;
            }

            .footer .footer-container .footer-review .give-review h4 {
                width: 100%;
                height: 25px;
                text-align: center;
                color: #555;
                margin: 0;
            }

            .footer .footer-container .footer-review .give-review form {
                width: 90%;
                height: 270px;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;

            }

            .footer .footer-container .footer-review .give-review form h6 {
                width: 100%;
                height: 20px;
                text-align: left;
                color: #555;
                margin: 0;
            }

            .footer .footer-container .footer-review .give-review .give-rating {
                width: 100%;
                height: 30px;
                display: flex;
                justify-content: center;
                align-items: flex-start;
            }


            .give-rating input {
                width: 100%;
                border: 1px solid #d8d8d8;
                outline: none;
                width: 50px;
                font-size: 1rem;
                font-weight: 600;
                color: #555;
                text-align: center;
                background: #eee;
                margin: 0;
            }

            .footer .footer-container .footer-review .give-review .give-comment {
                width: 100%;
                height: 130px;
            }

            .give-comment textarea {
                width: 100%;
                height: 100px;
                border: 1px solid #d8d8d8;
                outline: none;
                resize: none;
                font-size: 1rem;
                font-weight: 500;
                color: #555;
                padding: 10px;
                background: #eaeaea;
            }

            .footer .footer-container .footer-review .give-review .submit-btn {
                width: 100%;
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0;
            }

            .submit-btn button {
                width: 150px;
                height: 45px;
                border: none;
                outline: none;
                font-size: 1rem;
                font-weight: 500;
                background: #2292d3;
                cursor: pointer;
                color: #fff;
                border-radius: 3px;
            }

            .submit-btn button:hover {
                background: #1b7bbd;
            }

            .submit-btn button:active {
                transform: scale(0.98);
            }
        </style>
    </head>

    <body onload="rating()">
        <div class="header">
            <?php

            include "menu.html";

            ?>
        </div>

        <div class="product-container">
            <?php
            $pid = $_GET['pid'];

            include "../Shared/connection.php";

            $viewProduct = mysqli_query($conn, "SELECT * FROM `products` WHERE `products`.pid = $pid");

            $ratings = mysqli_query($conn, "SELECT * FROM `rating` WHERE `pid` = '$pid'");

            $rating = 0;
            $totalRating = 0;
            if (mysqli_num_rows($ratings) > 0) {
                $totalRating = mysqli_num_rows($ratings);
                while ($ratingRow = mysqli_fetch_assoc($ratings)) {
                    $rating += $ratingRow['rating'];
                }
                $rating = number_format($rating / $totalRating, 1);
            }

            $row = mysqli_fetch_assoc($viewProduct);

            $img = $row['imgurl'];
            $name = $row['name'];
            $price = $row['price'];
            $disc = $row['disc'];
            $detail = $row['detail'];
            $vid = $row['vid'];

            $getBrand = mysqli_query($conn, "SELECT * FROM `vendor` WHERE `uid` = '$vid'");

            $brand = mysqli_fetch_assoc($getBrand)['brand'];

            $discountedPrice = $price - ($price * $disc) / 100;

            echo '
                <div class="product-left">
                    <div class="product-img">
                        <img src="' . $img . '" alt="">
                    </div>
                </div>
                <div class="product-right">
                    <div class="product-detail">
                        <div class="product-name">
                            <h1>' . $name . '</h1>
                        </div>
                        <div class="brand-name">
                            <h3>' . $brand . '</h3>
                        </div>
                        <div class="product-price">
                            <div class="price">' . number_format($discountedPrice, 0) . '</div>
                        </div>
                        <div class="product-discount">
                            <div class="discount">' . $disc . '</div> &nbsp; &nbsp;
                            <div class="price">' . $price . '</div>
                        </div>
                        <div class="product-rating">
                            <div class="rating" id="rating' . $pid . '">
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
                            </div>
                            &nbsp;&nbsp;
                            <div class="rating-value">' . $rating . '</div> &nbsp;&nbsp;&nbsp;
                            <div class="product-number">(' . $totalRating . ')</div>
                        </div>
                        <div class="quantity">
                            <div>Quantity</div>
                            <div class="enter-qty">
                                <div class="decrease"><i class="fa-solid fa-minus"></i></div>
                                <input type="number" name="qty" id="qty' . $pid . '" value="1" max="10" min="1">
                                <div class="increase"><i class="fa-solid fa-plus"></i></div>
                            </div>
                        </div>
                        <div class="buttons">
                            <button>Go to Cart</button>
                            <button>Buy Now</button>
                        </div>
                    </div>
                </div>
            ';
            ?>
        </div>

        <div class="footer">
            <div class="footer-nav">
                <div class="detail">Details</div>
                <div class="review">Reviews</div>
            </div>
            <div class="footer-container">
                <div class="footer-detail">
                    <?php

                    echo $detail;

                    ?>
                </div>
                <div class="footer-review">
                    <div class="review-box">
                        <div class="read-review">
                            <?php

                            $reviews = mysqli_query($conn, "SELECT * FROM `comment` JOIN `customer` ON `comment`.`uid` = `customer`.`uid` WHERE `comment`.`pid`='$pid'");

                            while ($commentRow = mysqli_fetch_assoc($reviews)) {
                                $fname = $commentRow['fname'];
                                $lname = $commentRow['lname'];
                                $comment = $commentRow['comment'];
                                $date = date("d M Y", strtotime($commentRow['comment_date']));
                                echo '
                                    <div class="see-review">
                                        <div class="user-icon">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="reviews">
                                            <div class="name-time">
                                                <span>' . $fname . ' ' . $lname . '</span>&nbsp;&nbsp;
                                                <span>' . $date . '</span>
                                            </div>
                                            <div class="review">
                                                ' . $comment . '
                                            </div>
                                        </div>
                                    </div>
                                ';
                            }
                            ?>
                        </div>
                        <div class="give-review">
                            <h4>Your Review</h4>
                            <form action='rating-comment.php' method="post" required>
                                <?php
                                echo '<input type="hidden" name="location" value="viewProduct.php">';
                                echo '<input type="hidden" name="pid" value="' . $pid . '">';
                                ?>
                                <h6>Give Rating</h6>
                                <div class="give-rating">
                                    <div class="your-rating">

                                    </div>
                                    <input type="number" name="rating" value=0 min="0" max="5" step="0.1" required>
                                </div>
                                <div class="give-comment">
                                    <h6>Give Comment</h6>
                                    <textarea name="comment"></textarea>
                                </div>
                                <div class="submit-btn">
                                    <button type="submit">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>


            // ----------------------------------------
            // -------------- Change Qty --------------
            // ----------------------------------------
            const decrease = document.querySelector(".decrease");
            const increase = document.querySelector(".increase");
            const qty = document.querySelector("input[name='qty']");
            decrease.addEventListener("click", () => {
                if (qty.value > 1) {
                    qty.value--;
                }
            });
            increase.addEventListener("click", () => {
                if (qty.value < 10) {
                    qty.value++;
                }
            });



            // ----------------------------------------
            // -------------- footer ------------------
            // ----------------------------------------
            const detail = document.querySelector(".detail");
            const review = document.querySelector(".review");
            const footerDetail = document.querySelector(".footer-detail");
            const footerReview = document.querySelector(".footer-review");
            detail.addEventListener("click", () => {
                footerDetail.style.display = "block";
                footerReview.style.display = "none";
            });
            review.addEventListener("click", () => {
                footerDetail.style.display = "none";
                footerReview.style.display = "block";
            });

            // ----------------------------------------
            // -------------- Add cart ----------------
            // ----------------------------------------
            const pid = <?php echo $pid; ?>;
            const addCart = document.querySelector(".buttons button:nth-child(1)");
            addCart.addEventListener("click", () => {
                const location = "viewCart.php";
                window.location = 'cart.php?pid=' + pid + '&qty=' + qty.value + '&location=' + location;
            })

            const buy = document.querySelector(".buttons button:nth-child(2)");
            buy.addEventListener("click", () => {
                const location = "checkOut.php";
                window.location = 'checkOut.php?pid=' + pid + '&qty=' + qty.value + '&location=' + location;
            })

            // ----------------------------------------
            // -------------- Rating ------------------
            // ----------------------------------------

            const rating = () => {

                const ratingValue = <?php echo $rating ?>;

                const floor = Math.floor(ratingValue);
                const decimal = ratingValue - floor;
                const ceil = Math.ceil(ratingValue);

                const star = document.querySelectorAll("#rating<?php echo $pid; ?> .rating-star");

                for (let i = 0; i < 5; i++) {
                    if (i < floor) {
                        star[i].style.background = "linear-gradient(90deg, #ffaa00 100%, #f9f9f9 0%)";
                    }
                    else if (i < ceil) {
                        star[i].style.background = `linear-gradient(90deg, #ffaa00 ${decimal * 100}%, #f9f9f9 0%)`;
                    }
                    else {
                        star[i].style.background = "linear-gradient(90deg, #ffaa00 0%, #f9f9f9 0%)";
                    }
                }
            }






        </script>
    </body>

</html>