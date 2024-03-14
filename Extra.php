/* ---------------------------------- */
/* -------------- Aside ------------- */
/* ---------------------------------- */
.main-body aside {
min-width: 200px;
width: 100%;
height: 100%;
display: flex;
flex-direction: column;
justify-content: flex-start;
align-items: flex-start;
overflow-y: scroll;
flex-basis: 15%;
}

::-webkit-scrollbar {
width: 0px;
}

/* ----------------------------------------- */
/* -------------- Filter Title ------------- */
/* ----------------------------------------- */
aside .filter-title {
width: 200px;
height: 50px;
display: flex;
justify-content: center;
align-items: center;
border-bottom: 1px solid #e5e5e5;
text-align: center;
padding: 10px 0;
color: #555;
}

aside .filter-title h3 {
font-size: 1.2rem;
font-weight: 500;
}

/* ----------------------------------------- */
/* ----------------- Filters --------------- */
/* ----------------------------------------- */
aside .filters {
width: 200px;
padding: 10px 0;
border-bottom: 1px solid #e5e5e5;
margin-bottom: 10px;
}

/* ----------------------------------------- */
/* ----------------- Filter ---------------- */
/* ----------------------------------------- */
aside .filters .filter {
width: 100%;
display: flex;
flex-direction: column;
justify-content: flex-start;
align-items: center;
padding: 5px 10px;
}

.filter h4 {
font-size: 1rem;
font-weight: 500;
color: #555;
margin-bottom: 5px;
}

.filter .filter-content {
width: 100%;
display: flex;
justify-content: flex-start;
align-items: center;
flex-direction: column;
}

/* ------------------------------------------ */
/* ------------- Filter Value --------------- */
/* ------------------------------------------ */
.filter .filter-value {
width: 100%;
display: flex;
justify-content: flex-start;
align-items: center;
flex-wrap: wrap;
margin-top: 5px;
}

.filter-content .filter-value {
width: 100%;
display: flex;
justify-content: space-between;
align-items: center;
flex-wrap: wrap;
margin: 10px 0;
}

.filter-value label {
font-size: 0.7rem;
font-weight: 600;
color: #555;
margin-right: 5px;
}

.filter-value input {
height: 30px;
width: 50px;
border: none;
outline: none;
font-size: 0.7rem;
font-weight: 500;
color: #555;
text-align: center;
border: 1px solid #ddd;
border-radius: 3px;
;
}

.filter-value input::-webkit-inner-spin-button {
-webkit-appearance: none;
margin: 0;
}

/* ------------------------------------------- */
/* -------------- Filter Range --------------- */
/* ------------------------------------------- */
.filter-content .slider {
width: 100%;
height: 5px;
border-radius: 5px;
background: #e2e2e2;
position: relative;
}

.slider .price-progress,
.slider .rating-progress,
.slider .view-progress {
position: absolute;
height: 5px;
left: 25%;
right: 25%;
border-radius: 5px;
background: #2292d3;
}

.price-range-input,
.rating-range-input,
.view-range-input {
position: relative;
width: 100%;
}

.price-range-input input,
.rating-range-input input,
.view-range-input input {
position: absolute;
top: -5px;
height: 5px;
width: 100%;
-webkit-appearance: none;
background: none;
pointer-events: none;
}

input[type="range"]::-webkit-slider-thumb {
height: 10px;
width: 10px;
border-radius: 50%;
background: #2292d3;
-webkit-appearance: none;
pointer-events: auto;
}

/* ------------------------------------------ */
/* --------------- Apply Btn ---------------- */
/* ------------------------------------------ */
.filter-content .filter-btn {
width: 100%;
display: flex;
justify-content: center;
align-items: center;
margin-top: 15px;
}

.filter-btn button {
width: 100%;
height: 30px;
border: none;
outline: none;
background: #2292d3;
border-radius: 3px;
font-size: 0.8rem;
font-weight: 500;
color: #fff;
cursor: pointer;
}

.filter-btn button:hover {
background: #1b7bbd;
}

.filter-btn button:active {
transform: scale(0.98);
}













<aside>
    <div class="filter-title">
        <h3>Filters</h3>
    </div>
    <div class="filters">
        <div class="filter">
            <h4>Price</h4>
            <div class="filter-content">
                <div class="filter-value price-input">
                    <label for="min-price">Min</label>
                    <input type="number" class="input-min" name="min" id="min-price" />
                    <span>&nbsp; - &nbsp;</span>
                    <label for="max-price">Max</label>
                    <input type="number" class="input-max" name="max" id="max-price" />
                </div>
                <div class="slider">
                    <div class="price-progress">
                    </div>
                </div>
                <div class="price-range-input">
                    <input type="range" class="range-min" value="500">
                    <input type="range" class="range-max" value="2000">
                </div>
                <div class="filter-btn">
                    <button type="button" name="price" id="price">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <div class="filters">
        <div class="filter">
            <h4>Rating</h4>
            <div class="filter-content">
                <div class="filter-value rating-input">
                    <label for="min-price">Min</label>
                    <input type="number" class="rating-input-min" name="min" id="min-rating" step="0.1" />
                    <span>&nbsp; - &nbsp;</span>
                    <label for="max-price">Max</label>
                    <input type="number" class="input-max" name="max" id="max-rating" step="0.1" />
                </div>
                <div class="slider">
                    <div class="rating-progress">
                    </div>
                </div>
                <div class="rating-range-input">
                    <input type="range" class="rating-range-min" step="0.1">
                    <input type="range" class="range-max" step="0.1">
                </div>
                <div class="filter-btn">
                    <button type="button" name="price" id="rating">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <div class="filters">
        <div class="filter">
            <h4>Views</h4>
            <div class="filter-content">
                <div class="filter-value view-input">
                    <label for="min-price">Min</label>
                    <input type="number" class="view-input-min" name="min" id="min-view" value="2500" />
                    <span>&nbsp; - &nbsp;</span>
                    <label for="max-price">Max</label>
                    <input type="number" class="input-max" name="max" id="max-view" value="7500" />
                </div>
                <div class="slider">
                    <div class="view-progress">
                    </div>
                </div>
                <div class="view-range-input">
                    <input type="range" class="view-range-min" min="0" max="10000" value="2500">
                    <input type="range" class="range-max" min="0" max="10000" value="7500">
                </div>
                <div class="filter-btn">
                    <button type="button" id="view">Apply</button>
                </div>
            </div>
        </div>
    </div>
</aside>



































// ----------------------------------
// -------------- Rating ------------
// ----------------------------------
// <?php
//     if ($category == '' || $category == 'All') {
//         $getProduct = mysqli_query($conn, "SELECT * FROM `products`");

//         $minRating = 5;

//         $maxRating = 0;

//         while ($fetch_products = mysqli_fetch_assoc($getProduct)) {
//             $pid = $fetch_products['pid'];

//             $get_rating = mysqli_query($conn, "SELECT AVG(`rating`) FROM `rating` WHERE `pid` = '$pid'");

//             $rating_value = mysqli_fetch_assoc($get_rating);

//             $ratingValue = round($rating_value['AVG(`rating`)'], 1);

//             if ($ratingValue < $minRating) {
//                 $minRating = $ratingValue;
//             }
//             if ($ratingValue > $maxRating) {
//                 $maxRating = $ratingValue;
//             }
//         }
//     } else {
//         $getProduct = mysqli_query($conn, "SELECT * FROM `products` WHERE `category` = '$category'");

//         $minRating = 5;

//         $maxRating = 0;

//         while ($fetch_products = mysqli_fetch_assoc($getProduct)) {
//             $pid = $fetch_products['pid'];

//             $get_rating = mysqli_query($conn, "SELECT AVG(`rating`) FROM `rating` WHERE `pid` = '$pid'");

//             $rating_value = mysqli_fetch_assoc($get_rating);

//             $ratingValue = round($rating_value['AVG(`rating`)'], 1);

//             if ($ratingValue < $minRating) {
//                 $minRating = $ratingValue;
//             }
//             if ($ratingValue > $maxRating) {
//                 $maxRating = $ratingValue;
//             }
//         }
//     }
//     ?>

// const ratingInput = document.querySelectorAll(".rating-input input");
// const ratingrangeInput = document.querySelectorAll(".rating-range-input input");
// const ratingprogress = document.querySelector(".slider .rating-progress");

// ratingrangeInput[0].min = <?php echo $minRating; ?>;
// ratingrangeInput[0].max = <?php echo $maxRating; ?>;
// ratingrangeInput[1].min = <?php echo $minRating; ?>;
// ratingrangeInput[1].max = <?php echo $maxRating; ?>;

// console.log(ratingrangeInput[0].min, ratingrangeInput[0].max, ratingrangeInput[1].min, ratingrangeInput[1].max);
// ratingInput[0].value = parseFloat((ratingrangeInput[0].max - ratingrangeInput[0].min) / 4).toFixed(1);
// ratingInput[1].value = parseFloat((ratingrangeInput[1].max - ratingrangeInput[1].min) * 3 / 4).toFixed(1);
// console.log(ratingInput[0].value, ratingInput[1].value);

// ratingrangeInput[0].value = ratingInput[0].value;
// ratingrangeInput[1].value = ratingInput[1].value;

// let minRatVal = rangeInput[0].value, maxRatVal = rangeInput[1].value;
// ratingprogress.style.left = (minRatVal / ratingrangeInput[0].max) * 100 + "%";
// ratingprogress.style.right = 100 - (maxRatVal / ratingrangeInput[1].max) * 100 + "%";

// let ratingGap = ratingrangeInput[1].value - ratingrangeInput[0].value;
// ratingInput.forEach(element => {
// element.addEventListener("input", e => {
// let minVal = parseInt(ratingInput[0].value),
// maxVal = parseInt(ratingInput[1].value);

// if ((maxVal - minVal >= ratingGap) && maxVal <= 10000) { // if (e.target.className==="rating-input-min" ) { //
    ratingrangeInput[0].value=minVal; // ratingprogress.style.left=(minVal / ratingrangeInput[0].max) * 100 + "%" ; // }
    // else { // ratingrangeInput[1].value=maxVal; // ratingprogress.style.right=100 - (maxVal /
    ratingrangeInput[1].max) * 100 + "%" ; // } // } // }) // }) // ratingrangeInput.forEach(element=> {
    // element.addEventListener("input", e => {
    // let minVal = parseInt(ratingrangeInput[0].value),
    // maxVal = parseInt(ratingrangeInput[1].value);

    // if (maxVal - minVal < ratingGap) { // if (e.target.className==="rating-range-min" ) { //
        ratingrangeInput[0].value=maxVal - priceGap; // } // else { // ratingrangeInput[1].value=minVal + priceGap; // }
        // } // else { // ratingInput[0].value=minVal; // ratingInput[1].value=maxVal; //
        ratingprogress.style.left=(minVal / ratingrangeInput[0].max) * 100 + "%" ; // ratingprogress.style.right=100 -
        (maxVal / ratingrangeInput[1].max) * 100 + "%" ; // } // }) // })