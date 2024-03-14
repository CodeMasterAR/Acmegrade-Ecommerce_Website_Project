<?php

// Create connection
include_once "connection.php";


// get the value from the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $user_type = $_POST['usertype'];


    $encoded_password = md5($password);

    // $cur1 = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$username'");
    // mysqli_num_rows($cur1);

    $status = mysqli_query($conn, "INSERT INTO `user` (`email`, `password`, `mobile`, `user_type`) VALUES ('$email', '$encoded_password', '$mobile' ,'$user_type')");

    if ($status) {
        header("location: login.html");
    } else {
        echo "Registration failed: <br>";
        echo mysqli_error($conn);
    }
}

?>