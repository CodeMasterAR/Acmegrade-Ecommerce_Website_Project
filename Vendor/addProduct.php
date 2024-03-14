<?php

include_once "authguard.php";

include "menu.html";

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo "ShopGlamor - Trade Hub" ?></title>
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
            /* ------------- Customer Detail ---------- */
            /* ---------------------------------------- */
            .customer-container {
                width: 100%;
                margin: 80px 3%;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                background: #eee;
            }

            .customer-container .row {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: center;
                background: transparent;
            }

            /* ------------------------------------- */
            /* -------------- Title ---------------- */
            /* ------------------------------------- */
            .customer-container .row h1 {
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                text-align: center;
                font-size: 30px;
                font-weight: 600;
                color: #555;
            }

            /* ------------------------------------- */
            /* --------------- Form ---------------- */
            /* ------------------------------------- */
            .customer-container .row form {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
                padding: 10px 15px;
            }

            .customer-container .row form .row-7 {
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            .customer-container .row form .discription {
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
                top: 210px;
                left: calc(3% + 15px);
                width: 200px;
                overflow: hidden;
                max-height: 0px;
                transition: all 0.5s linear;
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
            .customer-container .row form .button {
                width: 100%;
                margin-bottom: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: transparent;
            }

            .customer-container .row form .button button {
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

            .customer-container .row form .button button:hover {
                background: #1b7bbd;
            }

            .customer-container .row form .button button:active {
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

        <div class="customer-container">
            <div class="row">
                <h1>Welcome to ShopGlamor - Trade Hub</h1>
                <form action="uploadProduct.php" method="post" enctype="multipart/form-data">
                    <div class="row-7 category">
                        <label for="category">Product Category</label>
                        <input type="text" name="category" id="category" placeholder="" readonly required>
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
                        <input type="text" name="pname" id="pname" required>
                    </div>
                    <div class="row-7">
                        <label for="price">Product Price</label>
                        <input type="number" name="price" id="price" required>
                    </div>
                    <div class="row-7">
                        <label for="pdisc">Product Discount (in %)</label>
                        <input type="number" name="pdisc" id="pdisc" required>
                    </div>
                    <div class="row-7">
                        <label for="pqty">Product Quantity</label>
                        <input type="number" name="pqty" id="pqty" required>
                    </div>
                    <div class="discription">
                        <label for="pdesc">Product Description</label>
                        <textarea name="pdesc" id="pdesc" rows="3"></textarea>
                    </div>
                    <div class="row-7">
                        <label for="pimg">Upload Image</label>
                        <input type="file" name="pimg" id="pimg" required>
                    </div>
                    <div class="button">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <script>

            // ----------------------------
            // ------ Dropdown Menu -------
            // ----------------------------
            const category = document.querySelector('.category');
            const menu = document.querySelector('.category-box');
            category.addEventListener('click', () => {
                menu.classList.toggle('active-cat-menu');
            })

            const option = document.querySelectorAll('.option');
            const catInput = document.querySelector('#category');
            Array.from(option).forEach(element => {
                element.addEventListener('click', () => {
                    catInput.value = element.childNodes[1].innerText;
                })
            })
        </script>
    </body>

</html>