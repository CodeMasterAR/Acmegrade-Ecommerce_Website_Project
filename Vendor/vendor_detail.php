<?php

include_once "authguard.php";

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>vendor Detail</title>
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
            /* ------------- vendor Detail ---------- */
            /* ---------------------------------------- */
            .vendor-container {
                width: 100%;
                margin: 80px 3%;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                background: #eee;
            }

            .vendor-container .row {
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
            .vendor-container .row h1 {
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
            .vendor-container .row form {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
                padding: 10px 15px;
            }

            .vendor-container .row form .row-3 {
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            .vendor-container .row form .extra {
                display: none;
            }

            /* ------------------------------------- */
            /* -------------- Labels --------------- */
            /* ------------------------------------- */
            .row-3 label {
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
            .row-3 input {
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

            /* ------------------------------------- */
            /* -------------- Address -------------- */
            /* ------------------------------------- */
            .vendor-container .row form .address {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            .vendor-container .row form .address h5 {
                width: 100%;
                height: 30px;
                margin-bottom: 10px;
                font-size: 20px;
                font-weight: 600;
                color: #555;
            }

            .vendor-container .row form .address .row-2 {
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: transparent;
            }

            .address .row-2 .col-2 {
                width: 45%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
                margin: 0;
                margin-right: 10px;
            }

            .address .row-2 .col-2 label {
                width: 100%;
                margin-bottom: 5px;
                font-size: 16px;
                font-weight: 600;
                color: #555;
            }

            .address .row-2 .col-2 input {
                width: 100%;
                border: none;
                border-bottom: 1px solid #ccc;
                outline: none;
                font-size: 16px;
                font-weight: 400;
                color: #555;
                background: none;
                padding: 0;
                margin: 0;
            }

            input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .address .text-area {
                width: 100%;
                height: 70px;
                margin-bottom: 10px;
                padding: 0 4%;
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                align-items: flex-start;
                background: transparent;
            }

            .address .text-area label {
                width: 100%;
                height: 20px;
                margin-bottom: 5px;
                font-size: 16px;
                font-weight: 600;
                color: #555;
            }

            .address .text-area textarea {
                width: 100%;
                height: 50px;
                padding: 10px;
                border: none;
                border-bottom: 1px solid #ccc;
                outline: none;
                font-size: 16px;
                font-weight: 400;
                color: #555;
                background: none;
                resize: none;
            }

            /* ------------------------------------- */
            /* -------------- Button --------------- */
            /* ------------------------------------- */
            .vendor-container .row form .button {
                width: 100%;
                margin-bottom: 5px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: transparent;
            }

            .vendor-container .row form .button button {
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

            .vendor-container .row form .button button:hover {
                background: #1b7bbd;
            }

            .vendor-container .row form .button button:active {
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

        <div class="vendor-container">
            <div class="row">
                <h1>Become a Member of Shop Glamor Trade Hub</h1>
                <?php

                $uid = $_SESSION['uid'];

                include_once "../Shared/connection.php";

                $selectvendor = mysqli_query($conn, "SELECT * FROM `vendor` JOIN `address` ON `vendor`.`uid` = `address`.`uid` WHERE `vendor`.`uid` = '$uid'");

                $location = "";
                if (mysqli_num_rows($selectvendor) == 0) {
                    if (isset($_GET['location'])) {
                        $location = $_GET['location'];
                        echo '
                            <form action="uploadvendor.php" method="post" enctype="multipart/form-data">
                                <div class="extra">
                                    <input type="hidden" name="location" id="location" value="' . $location . '">
                                </div>
                                <div class="row-3">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" id="fname" class="vendor-detail" required>
                                </div>
                                <div class="row-3">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" id="lname" class="vendor-detail" required>
                                </div>
                                <div class="row-3">
                                    <label for="dob">Date Of Birth</label>
                                    <input type="date" name="dob" id="dob" class="vendor-detail" required>
                                </div>
                                <div class="row-3">
                                    <label for="brand">Brand / Shop Name</label>
                                    <input type="text" name="brand" id="brand" class="vendor-detail" required>
                                </div>
                                <div class="address">
                                    <h5>Shop Address</h5>
                                    <div class="row-2">
                                        <div class="col-2">
                                            <label for="state">State</label>
                                            <input type="text" name="state" class="vendor-container" id="state" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="dist">District</label>
                                            <input type="text" name="dist" class="vendor-container" id="dist" required>
                                        </div>
                                    </div>
                                    <div class="row-2">
                                        <div class="col-2">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="vendor-container" id="city" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="pin">Pincode</label>
                                            <input type="number"  minlength="6" maxlength="6" name="pin" class="vendor-container" id="pin" required>
                                        </div>
                                    </div>
                                    <div class="text-area">
                                        <label for="area">Area</label>
                                        <textarea name="area" id="area" col="30" row="10"></textarea>
                                    </div>
                                </div>
                                <div class="button">
                                    <button type="submit">Submit</button>
                                </div>
                            </form>
                        ';
                    }
                } else {
                    $row = mysqli_fetch_assoc($selectvendor);
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $dob = $row['dob'];
                    $brand = $row['brand'];
                    $state = $row['state'];
                    $dist = $row['dist'];
                    $city = $row['city'];
                    $pin = $row['pincode'];
                    $area = $row['area'];
                    echo '
                        <form action="updatevendor.php" method="post" enctype="multipart/form-data">
                            
                            <div class="row-3">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" value="' . $fname . '" id="fname" class="vendor-detail" required>
                            </div>
                            <div class="row-3">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" value="' . $lname . '" id="lname" class="vendor-detail" required>
                            </div>
                            <div class="row-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" value="' . $dob . '" class="vendor-detail" required>
                            </div>
                            <div class="row-3">
                                <label for="dob">Brand / Shop Name</label>
                                <input type="text" value="' . $brand . '" name="brand" id="brand" class="vendor-detail" required>
                            </div>
                            <div class="address">
                                <h5>Shop Address</h5>
                                <div class="row-2">
                                    <div class="col-2">
                                        <label for="state">State</label>
                                        <input type="text" name="state" value="' . $state . '" class="vendor-container" id="state" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="dist">District</label>
                                        <input type="text" name="dist" value="' . $dist . '" class="vendor-container" id="dist" required>
                                    </div>
                                </div>
                                <div class="row-2">
                                    <div class="col-2">
                                        <label for="city">City</label>
                                        <input type="text" name="city" value="' . $city . '" class="vendor-container" id="city" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="pin">Pincode</label>
                                        <input type="number" minlength="6" maxlength="6" name="pin" value="' . $pin . '" class="vendor-container" id="pin" required>
                                    </div>
                                </div>
                                <div class="text-area">
                                    <label for="area">Area</label>
                                    <textarea name="area" id="area" col="30" row="10">' . $area . '</textarea>
                                </div>
                            </div>
                            <div class="button">
                                <button type="submit">Save Changes</button>
                            </div>
                        </form>
                    ';
                }
                ?>
            </div>
        </div>

    </body>

</html>