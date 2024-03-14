<?php

include_once "authguard.php";

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Detail</title>
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

            .customer-container .row form .row-3 {
                width: 100%;
                height: 50px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            .customer-container .row form .extra {
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
            .customer-container .row form .address {
                width: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                background: transparent;
            }

            .customer-container .row form .address h5 {
                width: 100%;
                height: 30px;
                margin-bottom: 10px;
                font-size: 20px;
                font-weight: 600;
                color: #555;
            }

            .customer-container .row form .address .row-2 {
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
                <h1>Welcome to ShopGlamor</h1>
                <?php

                $uid = $_SESSION['uid'];

                include_once "../Shared/connection.php";

                $selectCustomer = mysqli_query($conn, "SELECT * FROM `customer` JOIN `address` ON `customer`.`uid` = `address`.`uid` WHERE `customer`.`uid` = '$uid'");

                $location = "";
                if (mysqli_num_rows($selectCustomer) == 0) {
                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $location = $_GET['location'];
                        if (isset($_GET['pid'])) {
                            $pid = $_GET['pid'];
                            if (isset($_GET['rating']) && isset($_GET['comment'])) {
                                $rating = $_GET['rating'];
                                $comment = $_GET['comment'];
                                echo '
                                    <form action="uploadCustomer.php" method="post" enctype="multipart/form-data">
                                        <div class="extra">
                                            <input type="hidden" name="pid" id="pid" value="' . $pid . '">
                                            <input type="hidden" name="location" id="location" value="' . $location . '">
                                            <input type="hidden" name="rating" id="rating" value="' . $rating . '">
                                            <input type="hidden" name="comment" id="comment" value="' . $comment . '">
                                        </div>
                                        <div class="row-3">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" id="fname" class="customer-detail" required>
                                        </div>
                                        <div class="row-3">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="customer-detail" required>
                                        </div>
                                        <div class="row-3">
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" name="dob" id="dob" class="customer-detail" required>
                                        </div>
                                        <div class="address">
                                            <h5>Address</h5>
                                            <div class="row-2">
                                                <div class="col-2">
                                                    <label for="state">State</label>
                                                    <input type="text" name="state" class="customer-container" id="state" required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="dist">District</label>
                                                    <input type="text" name="dist" class="customer-container" id="dist" required>
                                                </div>
                                            </div>
                                            <div class="row-2">
                                                <div class="col-2">
                                                    <label for="city">City</label>
                                                    <input type="text" name="city" class="customer-container" id="city" required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="pin">Pincode</label>
                                                    <input type="number"  minlength="6" maxlength="6" name="pin" class="customer-container" id="pin" required>
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
                            } else if (isset($_GET['qty'])) {
                                $qty = $_GET['qty'];
                                echo '
                                    <form action="uploadCustomer.php" method="post" enctype="multipart/form-data">
                                        <div class="extra">
                                            <input type="hidden" name="pid" id="pid" value="' . $pid . '">
                                            <input type="hidden" name="location" id="location" value="' . $location . '">
                                            <input type="hidden" name="qty" id="qty" value="' . $qty . '">
                                        </div>
                                        <div class="row-3">
                                            <label for="fname">First Name</label>
                                            <input type="text" name="fname" id="fname" class="customer-detail" required>
                                        </div>
                                        <div class="row-3">
                                            <label for="lname">Last Name</label>
                                            <input type="text" name="lname" id="lname" class="customer-detail" required>
                                        </div>
                                        <div class="row-3">
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" name="dob" id="dob" class="customer-detail" required>
                                        </div>
                                        <div class="address">
                                            <h5>Address</h5>
                                            <div class="row-2">
                                                <div class="col-2">
                                                    <label for="state">State</label>
                                                    <input type="text" name="state" class="customer-container" id="state" required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="dist">District</label>
                                                    <input type="text" name="dist" class="customer-container" id="dist" required>
                                                </div>
                                            </div>
                                            <div class="row-2">
                                                <div class="col-2">
                                                    <label for="city">City</label>
                                                    <input type="text" name="city" class="customer-container" id="city" required>
                                                </div>
                                                <div class="col-2">
                                                    <label for="pin">Pincode</label>
                                                    <input type="number"  minlength="6" maxlength="6" name="pin" class="customer-container" id="pin" required>
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
                            echo '
                                <form action="uploadCustomer.php" method="post" enctype="multipart/form-data">
                                    <div class="extra">
                                        <input type="hidden" name="location" id="location" value="' . $location . '">
                                    </div>
                                    <div class="row-3">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="fname" id="fname" class="customer-detail" required>
                                    </div>
                                    <div class="row-3">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" id="lname" class="customer-detail" required>
                                    </div>
                                    <div class="row-3">
                                        <label for="dob">Date Of Birth</label>
                                        <input type="date" name="dob" id="dob" class="customer-detail" required>
                                    </div>
                                    <div class="address">
                                        <h5>Address</h5>
                                        <div class="row-2">
                                            <div class="col-2">
                                                <label for="state">State</label>
                                                <input type="text" name="state" class="customer-container" id="state" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="dist">District</label>
                                                <input type="text" name="dist" class="customer-container" id="dist" required>
                                            </div>
                                        </div>
                                        <div class="row-2">
                                            <div class="col-2">
                                                <label for="city">City</label>
                                                <input type="text" name="city" class="customer-container" id="city" required>
                                            </div>
                                            <div class="col-2">
                                                <label for="pin">Pincode</label>
                                                <input type="number"  minlength="6" maxlength="6" name="pin" class="customer-container" id="pin" required>
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
                        echo '';
                    }
                } else {
                    $row = mysqli_fetch_assoc($selectCustomer);
                    $fname = $row['fname'];
                    $lname = $row['lname'];
                    $dob = $row['dob'];
                    $state = $row['state'];
                    $dist = $row['dist'];
                    $city = $row['city'];
                    $pin = $row['pincode'];
                    $area = $row['area'];
                    echo '
                        <form action="updateCustomer.php" method="post" enctype="multipart/form-data">
                            
                            <div class="row-3">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" value="' . $fname . '" id="fname" class="customer-detail" required>
                            </div>
                            <div class="row-3">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" value="' . $lname . '" id="lname" class="customer-detail" required>
                            </div>
                            <div class="row-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" value="' . $dob . '" class="customer-detail" required>
                            </div>
                            <div class="address">
                                <h5>Address</h5>
                                <div class="row-2">
                                    <div class="col-2">
                                        <label for="state">State</label>
                                        <input type="text" name="state" value="' . $state . '" class="customer-container" id="state" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="dist">District</label>
                                        <input type="text" name="dist" value="' . $dist . '" class="customer-container" id="dist" required>
                                    </div>
                                </div>
                                <div class="row-2">
                                    <div class="col-2">
                                        <label for="city">City</label>
                                        <input type="text" name="city" value="' . $city . '" class="customer-container" id="city" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="pin">Pincode</label>
                                        <input type="number" minlength="6" maxlength="6" name="pin" value="' . $pin . '" class="customer-container" id="pin" required>
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