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
                z-index: 5;
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
                height: 50px;
                float: left;
                padding: 0 5px;
            }

            .product-container .product-right .product-detail .product-name h1 {
                font-size: 1.5rem;
                font-weight: 500;
            }

            /* ------------------------------------ */
            /* -------------- Brand name ---------------- */
            /* ------------------------------------ */
            .product-container .product-right .product-detail .brand-name {
                width: 100%;
                height: 50px;
                float: left;
                padding: 0 5px;
            }

            .product-container .product-right .product-detail .brand-name h3 {
                font-size: 1.2rem;
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
                padding: 10px 5px;
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
            /* ------------- product quantity --------- */
            /* ---------------------------------------- */
            .product-container .product-right .product-detail .product-qty {
                width: 100%;
                float: left;
                padding: 10px 5px;
                font-size: 1rem;
                font-weight: 500;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            /* ---------------------------------------- */
            /* ------------- product rating ----------- */
            /* ---------------------------------------- */
            .product-container .product-right .product-detail .product-rating {
                width: 100%;
                float: left;
                padding: 10px 5px;
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
                width: 70%;
                height: 50px;
                background: #d8d8d8;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .footer .footer-container {
                width: 70%;
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

            /* ------------------------------------------ */
            /* ----------------- Modal ------------------ */
            /* ------------------------------------------ */
            dialog {
                width: 650px;
                height: 700px;
                position: fixed;
                top: 50%;
                left: 50%;
                z-index: 3;
                display: none;
                justify-content: center;
                align-items: center;
                background: #f3f3f3;
                transform: translate(-50%, -50%);
                overflow-y: scroll;
                border: none;
            }

            dialog::-webkit-scrollbar {
                width: 0px;
            }

            dialog .row {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                background: transparent;
            }

            /* ------------------------------------- */
            /* -------------- Header ---------------- */
            /* ------------------------------------- */
            dialog .row .modal-header {
                position: sticky;
                top: 0;
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                text-align: center;
                font-size: 30px;
                font-weight: 600;
                color: #555;
                background: #f3f3f3;
                z-index: 1;
            }

            dialog .row .modal-header h3 {
                width: 100%;
                height: 100%;
                line-height: 50px;
            }

            dialog .row .modal-header .close {
                position: absolute;
                top: 0;
                right: 0;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 30px;
                font-weight: 600;
                color: #555;
                cursor: pointer;
                background: none;
                border: none;
            }

            /* ------------------------------------- */
            /* --------------- Form ---------------- */
            /* ------------------------------------- */
            dialog .row form {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
                padding: 10px 15px;
            }

            dialog .row form .row-7 {
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            dialog .row form .discription {
                width: 100%;
                height: 150px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            /* ------------------------------------- */
            /* -------------- Labels --------------- */
            /* ------------------------------------- */
            .row-7 label {
                width: 100%;
                height: 20px;
                margin-bottom: 5px;
                font-size: 16px;
                font-weight: 600;
                color: #555;
            }

            .discription label {
                width: 100%;
                height: 20px;
                margin-bottom: 5px;
                font-size: 16px;
                font-weight: 600;
                color: #555;
            }

            /* ------------------------------------- */
            /* -------------- Inputs --------------- */
            /* ------------------------------------- */
            .row-7 input {
                width: 100%;
                height: 30px;
                padding: 0 10px;
                border: none;
                border-bottom: 1px solid #ccc;
                outline: none;
                font-size: 16px;
                font-weight: 400;
                color: #555;
                background: none;
            }

            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .discription textarea {
                width: 100%;
                height: 100%;
                padding: 5px;
                border: 1px solid #ccc;
                outline: none;
                font-size: 16px;
                font-weight: 400;
                color: #555;
                background: none;
                resize: none;
            }

            textarea::-webkit-scrollbar {
                width: 5px;
            }

            textarea::-webkit-scrollbar-track {
                background: transparent;
            }

            textarea::-webkit-scrollbar-thumb {
                background: #2292d3;
                border-radius: 5px;
            }

            /* ------------------------------------- */
            /* -------------- Dropdown ------------- */
            /* ------------------------------------- */
            .row-7 .category {
                position: relative;
                min-width: 120px;
                width: 200px;
                height: 100%;
                border: 0.5px solid #d8d8d8;
                background: #e8e8e8;
                text-transform: uppercase;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
            }

            .category label,
            .category input {
                cursor: pointer;
            }

            .category-box {
                position: fixed;
                top: 130px;
                left: 15px;
                width: 200px;
                overflow: hidden;
                max-height: 0px;
                transition: all 0.5s linear;
                z-index: 10;
            }

            .category-box .option {
                width: 100%;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fff;
                border-bottom: 0.5px solid #d8d8d8;
                cursor: pointer;
            }

            .category-box .option .cat-name {
                color: #777;
                font-size: 1em;
                font-weight: 500;
                transition: all 0.3s linear;
            }

            .category-box .option:hover {
                background: #2292d3;

                & .cat-name {
                    color: #fff;
                    transform: scale(1.1);
                }
            }

            /* -------------------------------------- */
            /* -------------- Show Menu -------------- */
            /* -------------------------------------- */
            .active-cat-menu {
                max-height: 320px;
            }

            /* --------------------------------------- */
            /* -------------- upload Img ------------- */
            /* --------------------------------------- */

            .row-7 input[type="file"] {
                width: 100%;
                height: 30px;
                border: none;
                border-bottom: 1px solid #ccc;
                outline: none;
                font-size: 16px;
                font-weight: 400;
                color: #555;
                background: none;
            }

            .row-7 input[type="file"]::-webkit-file-upload-button {
                width: 150px;
                height: 30px;
                border: none;
                border-bottom: 1px solid #ccc;
                outline: none;
                text-align: left;
                font-size: 16px;
                font-weight: 400;
                color: #2292d3;
                background: none;
                cursor: pointer;
            }

            .row-7 input[type="file"]::-webkit-file-upload-button:hover {
                color: #1b7bbd;
            }

            /* ------------------------------------- */
            /* -------------- Button --------------- */
            /* ------------------------------------- */
            dialog .row form .button {
                width: 100%;
                margin-bottom: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: transparent;
            }

            dialog .row form .button button {
                width: 150px;
                height: 40px;
                border: none;
                outline: none;
                font-size: 16px;
                font-weight: 500;
                color: #fff;
                background: #2292d3;
                cursor: pointer;
                text-transform: uppercase;
                border-radius: 5px;
            }

            dialog .row form .button button:hover {
                background: #1b7bbd;
            }

            dialog .row form .button button:active {
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

        <!-- ------------------------------------------ -->
        <!-- ------------------ MODAL ----------------- -->
        <!-- ------------------------------------------ -->
        <dialog modal>
            <div class="row">
                <div class="modal-header">
                    <h3>Edit Product</h3>
                    <button class="close" type="button" close-modal>&times;</button>
                </div>
                <?php
                $uid = $_SESSION['uid'];
                $pid = $_GET['pid'];
                include "../Shared/connection.php";
                $viewProduct = mysqli_query($conn, "SELECT * FROM `products` WHERE `pid` = '$pid'");
                $getVendor = mysqli_query($conn, "SELECT `brand` FROM `vendor` WHERE `uid` = '$uid'");
                $vendor = mysqli_fetch_assoc($getVendor);
                $product = mysqli_fetch_assoc($viewProduct);
                $brand = $vendor['brand'];
                $category = $product['category'];
                $img = $product['imgurl'];
                $name = $product['name'];
                $price = $product['price'];
                $disc = $product['disc'];
                $qty = $product['qty'];
                $detail = $product['detail'];
                echo '
                    <form action="updateProduct.php?pid=' . $pid . '" method="post" enctype="multipart/form-data">
                        <div class="row-7 category">
                            <label for="category">Product Category</label>
                            <input type="text" value="' . $category . '" name="category" id="category" placeholder="" readonly required>
                            <div class="category-box">
                                <div class="option">
                                    <div class="cat-name">
                                        Fashion
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        Books
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        Electronics
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        HomeAppliances
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        Furniture
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        Grocery
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        Toys & Games
                                    </div>
                                </div>
                                <div class="option">
                                    <div class="cat-name">
                                        Sports & Fitness
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-7">
                            <label for="pname">Product Name</label>
                            <input type="text" value="' . $name . '" name="pname" id="pname" required>
                        </div>
                        <div class="row-7">
                            <label for="price">Product Price</label>
                            <input type="number" value="' . $price . '" name="price" id="price" required>
                        </div>
                        <div class="row-7">
                            <label for="pdisc">Product Discount (in %)</label>
                            <input type="number" value="' . $disc . '" name="pdisc" id="pdisc" required>
                        </div>
                        <div class="row-7">
                            <label for="pqty">Product Quantity</label>
                            <input type="number" value="' . $qty . '" name="pqty" id="pqty" required>
                        </div>
                        <div class="discription">
                            <label for="pdesc">Product Description</label>
                            <textarea name="pdesc" id="pdesc" rows="3">' . $detail . '</textarea>
                        </div>
                        <div class="row-7">
                            <label for="pimg">Upload Image</label>
                            <input type="file" value="' . $img . '" name="pimg" id="pimg">
                        </div>
                        <div class="button">
                            <button type="submit">Save Changes</button>
                        </div>
                    </form>
                ';
                ?>
            </div>
        </dialog>

        <div class="product-container">
            <?php

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
                            <div class="price">' . $price - ($price * $disc) / 100 . '</div>
                        </div>
                        <div class="product-discount">
                            <div class="discount">' . $disc . '</div> &nbsp; &nbsp;
                            <div class="price">' . $price . '</div>
                        </div>
                        <div class="product-qty">
                            <span>Avaibility: </span>&nbsp;&nbsp;
                            <span>' . $qty . '</span>
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
                            </div>&nbsp;&nbsp;
                            <div class="rating-value">' . $rating . '</div> &nbsp;&nbsp;&nbsp;
                            <div class="product-number">(' . $totalRating . ')</div>
                        </div>
                        <div class="buttons">
                            <button id="edit" open-modal>Edit Details</button>
                            <button id="delete">Delete Product</button>
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

                            $reviews = mysqli_query($conn, "SELECT * FROM `comment` JOIN `customer` ON `comment`.`uid` = `customer`.`uid` WHERE `comment`.pid='$pid'");

                            while ($commentRow = mysqli_fetch_assoc($reviews)) {
                                $fname = $commentRow['fname'];
                                $lname = $commentRow['lname'];
                                $comment = $commentRow['comment'];
                                $date =
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
                    </div>
                </div>
            </div>
        </div>

        <script>

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

            const pid = <?php echo $pid; ?>;

            // ----------------------------------------
            // ---------------- Delete -------------------
            // ----------------------------------------
            let del = document.querySelector("#delete");
            del.addEventListener("click", () => {
                let confirm = window.confirm("Are you sure you want to delete this product?");
                if (confirm) {
                    window.location = 'deleteProduct.php?pid=' + pid;
                }
            })

            // ----------------------------------------
            // ---------------- Edit ------------------
            // ----------------------------------------
            const edit = document.querySelector("[open-modal]");
            const modal = document.querySelector("[modal]");
            const close = document.querySelector("[close-modal]");
            edit.addEventListener("click", () => {
                // alert("Edit");
                // window.location = 'cart.php?pid=' + pid + '&qty=' + qty.value + '&location=' + location;
                modal.style.display = "flex";
                modal.showModal();
            })
            close.addEventListener("click", () => {
                modal.style.display = "none";
                modal.close();
            })

            // ----------------------------------------
            // -------------- Drop Down ---------------
            // ----------------------------------------
            let category = document.querySelector('.category');
            let categorylist = document.querySelector('.category-box');
            let options = document.querySelectorAll('.option');
            category.addEventListener('click', () => {
                categorylist.classList.toggle('active-cat-menu');
            })

            let inputCat = document.querySelector('#category');
            Array.from(options).forEach(element => {
                element.addEventListener('click', () => {
                    inputCat.value = element.childNodes[1].innerText;
                })
            })

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

</html