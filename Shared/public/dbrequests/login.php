<?php

include_once "../../connection.php";
session_start();

$_SESSION['login_status'] = "false";

$email = $_POST['email'];
$password = $_POST['password'];
$enc_password = md5($password);

$sql_cursor = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$enc_password'");

$matched_row_count = mysqli_num_rows($sql_cursor);

if ($matched_row_count == 0) {
    $_SESSION['toaster_message'] = "Username or Password not matched!!";
    $_SESSION['toaster_type'] = "warning"; 
    // Redirect to app.php after setting local storage
    echo "<script>
        localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
        localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
        window.location.href = '../../app.php';
    </script>";
    exit();
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
        $_SESSION['toaster_message'] = "Welcome to ShopGlamor!, have a nice earning 😊";
        $_SESSION['toaster_type'] = "success";
        echo "<script>
            localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
            localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
            window.location.href = '../../app.php';
        </script>";
        exit();
    } else if ($usertype == "Customer") {
        $_SESSION['login_status'] = "true";
        $_SESSION['email'] = $email;
        $_SESSION['uid'] = $uid;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['toaster_message'] = "Welcome to ShopGlamor!, have a nice shopping 😊";
        $_SESSION['toaster_type'] = "success";
        echo "<script>
            localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
            localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
            window.location.href = '../../app.php';
        </script>";
        exit();
    }
}

?>
