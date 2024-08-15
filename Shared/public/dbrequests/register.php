<?php

// Create connection
include_once "../../connection.php";

// get the value from the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['usertype'];


    $encoded_password = md5($password);

    $status = mysqli_query($conn, "INSERT INTO `user` (`email`, `password`, `user_type`) VALUES ('$email', '$encoded_password','$user_type')");

    if ($status) {
        header("location: ../../app.php");
    } else {
        echo "Registration failed: <br>";
        echo mysqli_error($conn);
    }
}

?>