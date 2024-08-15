<?php
include_once "../../connection.php";
session_start();

$_SESSION['login_status'] = "false";

$email = $_POST['email'];
$password = $_POST['password'];
$enc_password = md5($password);

$email_check_result = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");

if(mysqli_num_rows($email_check_result) > 0) {
    $update_result = mysqli_query($conn, "UPDATE `user` SET `password` = '$enc_password' WHERE `email` = '$email'");
    
    if($update_result) {
        $_SESSION['message'] = "Password updated successfully!";
        header("location:../../app.php");
    } else {
        $_SESSION['message'] = "Failed to update password. Please try again.";
        header("location:../../app.php");
    }
} else {

    $_SESSION['message'] = "Email not found. Please check your email address.";
    header("location:../../app.php");
}

?>
