<?php
require("./connect.php");
// require("./dashboard/employee.php")
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM `employee` WHERE EMPLOYEE_ID =$id";
 $result  = mysqli_query($conn,$sql);
if($result){
    echo header('location:./employee.php');
    
    ;
}

}
?>