<?php
require("./connect.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // validation and security
    function verify($data)
    {
        return htmlspecialchars(trim(stripslashes($data)), ENT_QUOTES, 'UTF-8');
    }
    $name = verify($_POST['ADMIN_NAME']);
    $password = verify($_POST['PASSWORD']);
    $sql = "SELECT * FROM `ADMIN` WHERE ADMIN_NAME ='$name' AND PASSWORD= '$password' ";
    $run = mysqli_query($conn, $sql);
    if (mysqli_num_rows($run) > 0) {
        $user = mysqli_fetch_assoc($run);
        if ($password == $user['PASSWORD']) {
            $_SESSION['USERID'] = $user['ADMIN_ID'];
            $_SESSION['NAME'] = $user['ADMIN_NAME'];
            $_SESSION['PASSWORD'] = $user['PASSWORD'];
            $username = $_SESSION['NAME'];
            echo "<script>
   alert('Welcome $username');
   window.location.href='./dashboard.php'
   </script>";
        }
    } else {
        echo "
        <div class='alert alert-danger fixed-top top-0 '>User Not Found, Login failed! check your credentials.</div>
   ";
    }
    // // vrifying session and cookie
    //     if (isset($_SESSION['NAME'])) {
    //         $username =  $_SESSION['NAME'];
    //     } elseif (isset($_COOKIE["user_name"])) {
    //         $_SESSION['NAME'] = $_COOKIE["user_name"];
    //         $username = $_SESSION['NAME'];
    //     } else {
    //         header('location: login.php');
    //         exit();
    //     }
    // $username = htmlspecialchars($_COOKIE["user_name"]); // Prevent XSS
    // echo "
    // <script>
    // alert('Welcome back, $username');
    // </script>
    // ";


}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="d-flex align-items-center justify-content-center">
    <form action="" method="POST" class="d-flex  flex-column p-5 gap-2 ">
        <h1 class="text-center" style="color:#337bb2">XYZ_Login</h1>
        <label for="name" class="input-label fw-bold">Name:</label>
        <input type="text" class="form-control" name="ADMIN_NAME" style="border: none; border-bottom:1px solid black">
        <label for="password" class="input-label fw-bold">Password:</label>
        <input type="password" class="form-control" name="PASSWORD" style="border: none; border-bottom:1px solid black">
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
            <label class="form-check-label" for="remember_me">Remember Me</label>
        </div>


        <button class="btn text-light" name="submit" style="background-color: black;color:white; border-radius: 10px 0px;">Enter</button>

        </input>
        <style>
            form {
                width: 30%;
                box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
                border: 5px solid #1d3b52;
                border-radius: 10px;
            }

            button {
                align-self: center;
                background-color: black;
                color: white;
            }
        </style>
</body>

</html>