<?php

include_once "../Shared/connection.php";
$pid = $_GET['pid'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['pname'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $disc = $_POST['pdisc'];
    $qty = $_POST['pqty'];
    $detail = $_POST['pdesc'];

    $name = str_replace("'", "\'", $name);
    $detail = str_replace("'", "\'", $detail);

    $imagpath = "";

    if ($_FILES['pimg']['name'] == "") {
        $sql = mysqli_query($conn, "SELECT * FROM `products` WHERE pid = '$pid'");
        $row = mysqli_fetch_assoc($sql);
        $imagepath = $row['imgurl'];
    } else {
        $imagepath = "../Shared/images/" . $category . "/" . $_FILES['pimg']['name'];
        move_uploaded_file($_FILES['pimg']['tmp_name'], $imagepath);
    }


    // echo $imagepath;
    // echo "<br>";

    $status = mysqli_query($conn, "UPDATE `products` SET `category` = '$category', `name` = '$name', `price` = '$price', `disc` = '$disc', `qty` = '$qty', `detail` = '$detail', `imgurl` = '$imagepath' WHERE `products`.pid = '$pid'");

    if ($status) {
        header("location:viewProduct.php?pid=$pid");
    } else {
        echo mysqli_error($conn);
    }
}


?>