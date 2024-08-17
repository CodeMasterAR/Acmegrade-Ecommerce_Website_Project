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
        $_SESSION['toaster_message'] = "Password updated successfully! 😊";
        $_SESSION['toaster_type'] = "success"; 
        echo "<script>
            localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
            localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
            window.location.href = '../../app.php';
        </script>";
        exit();
    } else {
        $_SESSION['toaster_message'] = "Failed to update password. Please try again.";
        $_SESSION['toaster_type'] = "warning"; 
        echo "<script>
            localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
            localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
            window.location.href = '../../app.php';
        </script>";
        exit();
    }
} else {
    $_SESSION['toaster_message'] = "Email not found. Please check your email address.";
    $_SESSION['toaster_type'] = "warning"; 
    echo "<script>
        localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
        localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
        window.location.href = '../../app.php';
    </script>";
    exit();
}

?>
