<?php

include_once "connection.php";

session_start();

$_SESSION['login_status'] = "false";

$email = $_POST['email'];
$password = $_POST['password'];

$enc_password = md5("$password");

$sql_cursor = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$enc_password'");

$matched_row_count = mysqli_num_rows($sql_cursor);

if ($matched_row_count == 0) {
    echo "Invalid Credentials";
} else {
    $row = mysqli_fetch_assoc($sql_cursor);
    $email = $row['email'];
    $uid = $row['uid'];
    $usertype = $row['user_type'];

    if ($usertype == "Vendor") {
        $_SESSION['login_status'] = "true";
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $uid;
        $_SESSION['usertype'] = $usertype;

        header("location:../Vendor/home.php");
    } else if ($usertype == "Customer") {
        $_SESSION['login_status'] = "true";
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $uid;
        $_SESSION['usertype'] = $usertype;

        header("location:../Customer/home.php");
    }
}

?>