<?php
require("./connect.php");
session_unset();
setcookie('user_name', $user['ADMIN_NAME'], time() - (86400 * 30), "/");
if(session_destroy()){
    echo"
    <script> 
    alert('logged out successfully!');
    window.location.href='./login.php'; 
    </script>
    ";
}else{
    die('error'.mysqli_error($conn));
    // echo"
    // <script>
    // alert('logged out failed!');
    // window.location.href='./?'; 
    // </script>
    // ";
}

?>