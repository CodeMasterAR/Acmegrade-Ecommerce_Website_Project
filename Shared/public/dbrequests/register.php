<?php

// Create connection
include_once "../../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['usertype'];

    $encoded_password = md5($password);

    $email_check_result = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'");

    if(mysqli_num_rows($email_check_result) > 0) {
        $_SESSION['toaster_message'] = "Email Id Already Exists";
        $_SESSION['toaster_type'] = "warning"; 
        echo "<script>
            localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
            localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
            window.location.href = '../../app.php';
        </script>";
        exit();
    }
    else {
        $status = mysqli_query($conn, "INSERT INTO `user` (`email`, `password`, `user_type`) VALUES ('$email', '$encoded_password','$user_type')");
    
        if ($status) {
            $_SESSION['toaster_message'] = "You heva been sucessfuly registered 😊";
            $_SESSION['toaster_type'] = "success"; 
            echo "<script>
                localStorage.setItem('toaster_message', '" . $_SESSION['toaster_message'] . "');
                localStorage.setItem('toaster_type', '" . $_SESSION['toaster_type'] . "');
                window.location.href = '../../app.php';
            </script>";
            exit();
        } else {
            echo "Registration failed: <br>";
            echo mysqli_error($conn);
        }
    }
}

?>