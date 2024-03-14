<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            /* Category */
            .category-container {
                position: fixed;
                top: 50px;
                width: 100%;
                height: 50px;
                padding: 0 3%;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #dfdfdf;
                z-index: 48;
            }

            /* --------------------------- */
            /* ----------- left ---------- */
            /* --------------------------- */
            .cat-left {
                width: 70vw;
                min-width: 200px;
                height: 100%;
                display: flex;
                justify-content: flex-start;
                align-items: center;
            }

            .cat-left .category {
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

            .category:hover {
                background: #eee;
            }

            .cat-left .category .cat,
            .cat-left .category .cat-title {
                width: 100%;
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .cat-left .category .cat-title h5 {
                margin: 0;
                padding: 0;
                font-size: 1.2em;
                font-weight: 500;
                color: #555;
            }

            .cat-left .category .cat a {
                width: 100%;
                height: 100%;
                text-decoration: none;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #555;
                font-size: 0.9em;
            }

            /* ------------------------ */
            /* --------- Menu --------- */
            /* ------------------------ */
            .cat-detail {
                position: fixed;
                top: 105px;
                left: 3%;
                width: 200px;
                overflow: hidden;
                max-height: 0;
                transition: all 0.5s linear;
            }

            .cat-detail .cat-option {
                width: 100%;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #fff;
                border-bottom: 0.5px solid #d8d8d8;
            }

            .cat-detail .cat-option .cat-name {
                color: #777;
                font-size: 1em;
                font-weight: 500;
                transition: all 0.3s linear;
            }

            .cat-detail .cat-option:hover {
                background: #2292d3;

                & .cat-name {
                    color: #fff;
                    transform: scale(1.1);
                }
            }

            /* --------------------------- */
            /* ---------- Active --------- */
            /* --------------------------- */
            .active-cat-detail {
                max-height: 380px;
            }

            /* ----------------------------- */
            /* ----------- Right ----------- */
            /* ----------------------------- */
            .cat-right {
                width: 30vw;
                min-width: 180px;
                height: 100%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
                flex-shrink: 20;
            }

            .cat-right .contact {
                width: 200px;
                height: 100%;
                display: flex;
                flex-direction: column;
                align-items: flex-end;
            }

            .cat-right .contact h6 {
                margin: 0;
                padding: 0;
                font-size: 0.9em;
                font-weight: 500;
                color: #555;
                width: 100%;
                height: 50%;
                display: flex;
                justify-content: flex-end;
                align-items: center;
            }
        </style>
    </head>

    <body>
        <div class="category-container">
            <div class="cat-left">
                <div class="category">
                    <div class="cat-title">
                        <h5>Category</h5>
                    </div>
                    <div class="cat-detail">
                        <div class="cat-option">
                            <div class="cat-name">
                                All
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Fashion
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Books
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Electronics
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                HomeAppliances
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Furniture
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Grocery
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Toys & Games
                            </div>
                        </div>
                        <div class="cat-option">
                            <div class="cat-name">
                                Sports & Fitness
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category">
                    <div class="cat">
                        <a href="home.php">Home</a>
                    </div>
                </div>
                <div class="category">
                    <div class="cat">
                        <a href="" id="category-name"></a>
                    </div>
                </div>
            </div>
            <div class="cat-right">
                <div class="contact">
                    <h6>Helpline: +91 9876543210</h6>
                    <h6>Email: shopglamor@sg.in</h6>
                </div>
            </div>
        </div>
        <script>
            const cat_title = document.querySelector('.cat-title');
            const cat_detail = document.querySelector('.cat-detail');
            cat_title.addEventListener('click', () => {
                cat_detail.classList.toggle('active-cat-detail');
            })

            const cat_name = document.querySelector('#category-name');
            const cat_option = document.querySelectorAll('.cat-option');
            Array.from(cat_option).forEach((element) => {
                element.addEventListener('click', () => {
                    cat_name.innerText = element.childNodes[1].innerText;
                    cat_detail.classList.remove('active-cat-detail');
                    const category = encodeURIComponent(cat_name.innerText.toLowerCase());
                    window.location = `home.php?category=${category}`;
                })
            })

        </script>
    </body>

</html>