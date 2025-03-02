<?php
require("./connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM ATTENDANCE WHERE ATTENDANCE_ID= $id";
$result = mysqli_query($conn, $sql);

$run = mysqli_fetch_assoc($result);
$date = $run['DATE'];
$intime = $run['CHECK_IN_TIME'];
$outtime = $run['CHECK_OUT_TIME'];
$status = $run['STATUS'];

if (isset($_POST['submit'])) {
    $date = $_POST['DATE'];
    $intime = $_POST['CHECK_IN_TIME'];
    $outtime = $_POST['CHECK_OUT_TIME'];
    $status = $_POST['STATUS'];


    $sql = "UPDATE 
     `ATTENDANCE`
      SET 
      DATE ='$date',
    CHECK_IN_TIME ='$intime',
    CHECK_OUT_TIME   ='$outtime',
      STATUS = '$status'
       WHERE 
       ATTENDANCE_ID = $id";

    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "
        <script>
        alert('Updated successfully!')
        window.location.href='./attendes.php'
        </script>
        
        ";
    }else{
        die("error".mysqli_error($conn));

    }
}


?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
<div class="parent d-flex flex-row gap-5">
    <div class="left fixed-top h-100" style="width: 20%;">
        <?php include('nav.php')
        ?>
    </div>

    <div class="right d-flex p-5 flex-column w-75 align-items-center justify-content-center" style="margin-left: auto;">
 

              
                             
                                <form action="" method="POST" class="d-flex flex-column p-3 gap-2 p-5 ">
                                    <h1 class="modal-title text-center" id="formModalLabel" style= "color:#1d3b52">Update Employees</h1>
                                    <label for="date" class="fw-bold"style="color:#337bb2">Date</label>
                                    <input type="date" name="DATE" id="" class="form-control" required value="<?php echo $date?>">
                                    <label for="checkin" class="fw-bold"style="color:#337bb2">CheckinTime</label>
                                    <input type="time" name="CHECK_IN_TIME" id="" class="form-control" value="<?php echo $intime?>">
                                    <label for="checkin" class="fw-bold"style="color:#337bb2">CheckOut</label>
                                    <input type="time" name="CHECK_OUT_TIME" id="" class="form-control" value="<?php echo $outtime?>">
                                    <label for="status" class="fw-bold" style="color:#337bb2">Status:</label>
                                    <select name="STATUS" id="" class="form-control">
                                        <option value="select disabled">choose status</option>
                                        <option value="PRESENT">PRESENT</option>
                                        <option value="ABSENT">ABSENT</option>
                                        <option value="LATE">LATE</option>
                                    </select>
                                    <button class="btn  text-light mt-2" style="width: fit-content; align-self:center; background:#1d3b52" name="submit">Record Employee</button>
                                </form>

                            </div>
                     
    </div>
<style>
    form{
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
        
        

    }
    body {
            background-color: rgba(196, 203, 206, 0.48);
        }

</style>
</body>

</html>