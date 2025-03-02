<?php
require("./connect.php");
// require("./dashboard/employee.php")
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM `ATTENDANCE` WHERE ATTENDANCE_ID =$id";
 $result  = mysqli_query($conn,$sql);
if($result){
    echo 
    "
    <script>
    alert('One Record Deleted Successfully!')
  window.location.href= './attendes.php'

    </script>
    "
    
    ;
}

}
?>