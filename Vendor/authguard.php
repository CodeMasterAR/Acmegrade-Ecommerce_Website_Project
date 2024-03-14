<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
        <title>Document</title>
    </head>

    <body>

    </body>

</html>

<?php

session_start();

if (!isset($_SESSION['login_status'])) {
    echo "illegal Attempt";
    die;
}
if ($_SESSION['login_status'] == "false") {
    echo "unauthorized access";
    die;
}

if ($_SESSION['usertype'] != "Vendor") {
    echo "You have no permission to access this page";
    die;
}

$email = $_SESSION['email'];
$uid = $_SESSION['uid'];
$usertype = $_SESSION['usertype'];

// echo "<div class='d-flex justify-content-evenly bg-secondary text-white'>
//         <div> id: " . $userid . "</div>  
//         <div> username: " . $username . "</div>
//         <div> user type: " . $usertype . "</div>
//     </div>";

?>