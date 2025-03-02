<?php
require('./login.php');
$cookie_name="user";
$cookie_value = "peace";
setcookie('user_name',$user['ADMIN_NAME'],time()+(86400*30),"/");

if(!isset($_COOKIE[$cookie_name])){
    echo "cookie. $cookie_name .failed";
}else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
  }

?>