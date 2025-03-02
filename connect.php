<?php
$hostname = "localhost";
$user = "root";
$password = "";
$database = "XYZ";
$conn = mysqli_connect($hostname, $user, $password, $database);
if (!$conn) {
    die("not connected") . mysqli_error($conn);
}
session_start()


?>

