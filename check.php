<?php
if(isset($_SESSION['ADMIN_NAME'])){
    $user = $_SESSION['NAME'];
}
elseif(empty($_SESSION['NAME'])){
    echo"
    <script>
    alert('Login First');
    window.location.href = './login.php'
    </script
    ";
}
?>