<?php

include 'authguard.php';

$uid = $_SESSION['uid'];

include_once "../Shared/connection.php";

$getVendor = mysqli_query($conn, "SELECT * FROM `vendor` WHERE `uid` = '$uid'");

if (mysqli_num_rows($getVendor) == 0) {
    header("location: vendor_detail.php?location=home.php");
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category = $_POST['category'];
        $name = $_POST['pname'];
        $price = $_POST['price'];
        $discount = $_POST['pdisc'];
        $qty = $_POST['pqty'];
        $details = $_POST['pdesc'];

        $name = str_replace("'", "\'", $name);
        $details = str_replace("'", "\'", $details);

        //print_r($_FILES);

        // echo print_r($_FILES['pimg']['tmp_name']);

        $dest_file_path = "../Shared/images/" . $category . "/" . $_FILES['pimg']['name'];

        move_uploaded_file($_FILES['pimg']['tmp_name'], $dest_file_path);

        // echo $dest_file_path;

        $status = mysqli_query($conn, "INSERT INTO `products` (`vid`,`name`,`price`,`disc`,`qty`,`detail`,`category`,`imgurl`) VALUES ('$uid','$name','$price','$discount','$qty','$details','$category','$dest_file_path')");

        if ($status) {
            // echo "<br>Product added successfully";
            header("location:home.php");
        } else {
            echo "Product addition failed";
            echo mysqli_error($conn);
        }
    }

}

?>