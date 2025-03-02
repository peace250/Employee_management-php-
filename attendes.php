<?php
require('./connect.php');

require('./check.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $date = $_POST['DATE'];
    $intime = $_POST['CHECK_IN_TIME'];
    $outtime = $_POST['CHECK_OUT_TIME'];
    $status = $_POST['STATUS'];
    $id = $_POST['ID'];
    $sql = "INSERT INTO `attendance`(DATE,CHECK_IN_TIME,CHECK_OUT_TIME,STATUS,EMPLOYEE_ID) VALUES ('$date','$intime','$outtime','$status','$id')";
    $runQuery = mysqli_query($conn, $sql);
    if ($runQuery) {
        echo "<script>alert('Attendance recorded successfully!');</script>";
    } else {
        die("error" . mysqli_error($conn));
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
    <div class="parent_element d-flex flex-row w-100">

        <div class="left_element fixed-top h-100" style="width: 20%;">
            <?php require('./nav.php'); ?>


        </div>
        <div class="right_element d-flex flex-column w-75 align-items-center justify-content-center" style="margin-left: auto;">
            <nav class="navbar-expand  w-100" style="height: fit-content;">
               
                <h2 class="h2 text-center mt-5">Attendance Made!</h2>
                <table class="hover table-striped w-75 table table-hover" style="margin-left: 10rem;">
                    <thead>
                        <th>No</th>
                        <th>Names</th>
                        <th>Date</th>
                        <th>Arrival_Time</th>
                        <th>Leave_Time</th>
                        <th>Status</th>
                        <th>Operation</th>
                    </thead>
                    <tbody>

                        <?php




                        $index = 0;
                        $sql = "SELECT * FROM EMPLOYEE INNER JOIN ATTENDANCE ON EMPLOYEE.EMPLOYEE_ID = ATTENDANCE.EMPLOYEE_ID ";
                        $runQ = mysqli_query($conn, $sql);
                        while ($show = mysqli_fetch_assoc($runQ)) {
                            $index++;
                            $id = $show['ATTENDANCE_ID'];
                            $date = $show['DATE'];
                            $intime = $show['CHECK_IN_TIME'];
                            $outtime = $show['CHECK_OUT_TIME'];
                            $status = $show['STATUS'];
                            $name = $show['FIRST_NAME'] . " " . $show['LAST_NAME'];

                            echo '
                        <tr>

                        <td>' . $index . '</td>
                        <td>' . $name . '</td>
                        <td>' . $date . '</td>
                        <td>' . $intime . '</td>
                        <td>' . $outtime . '</td>
                        <td>' . $status . '</td>
                        
                <td  
       <button class="btn"><a href="./deletea.php?id=' . $id . ' "   class= "text-decoration-none text-light "><?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="red">
  <path d="M10 2L9 3L3 3L3 5L21 5L21 3L15 3L14 2L10 2 z M 4.3652344 7L6.0683594 22L17.931641 22L19.634766 7L4.3652344 7 z" />
</svg></a></button>
      <button class="btn"><a href="./updatea.php?id=' . $id . ' "   class= "text-decoration-none text-light"                data-bs-target="#secondformModal">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="#337bb2">
  <path d="M12 3C7.037 3 3 7.038 3 12L5 12C5 8.14 8.141 5 12 5C14.185097 5 16.125208 6.0167955 17.408203 7.5917969L15 10L21 10L21 4L18.833984 6.1660156C17.184843 4.2316704 14.736456 3 12 3 z M 19 12C19 15.859 15.859 19 12 19C9.8149031 19 7.8747922 17.983204 6.5917969 16.408203L9 14L3 14L3 20L5.1660156 17.833984C6.8151574 19.76833 9.263544 21 12 21C16.963 21 21 16.963 21 12L19 12 z" />
</svg></a></button>

    </td>


                        </tr>
                        ';
                        }
                        ?>


                    </tbody>
                </table>


                <button
                    type="button"
                    class="btn btn-success text-light"
                    style="width: fit-content; background:rgb(207, 134, 77); border:none"
                    data-bs-toggle="modal"
                    title="Popup title"
                    data-bs-target="#formModal">
                    Make Attendance +
                </button>


                <div class="modal fade w-45 p-3 " id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content">

                            <div class="model-header    d-flex flex-row  align-items-center  p-3   justify-content-between">
                                <h1 class="modal-title" id="formModalLabel"><a href="" class="text-dark text-decoration-none fs-2">XYZ</a></h1>

                                <button type="button" class="btn-close border border-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" class="d-flex flex-column p-3 gap-1">
                                    <h1 class="modal-title text-center" id="formModalLabel">Record Employees</h1>

                                    <label for="employee" class="fw-bold">Choose Employee:</label>
                                    <select name="ID" id="" class="form-control">
                                        <option value="disabled selected">choose Employee<!< /option>
                                                <?php
                                                $sql = "SELECT * FROM `EMPLOYEE`";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_assoc($result)) { ?>

                                        <option value="<?= $row['EMPLOYEE_ID'] ?>">
                                            <?= $row['FIRST_NAME'] . " " . $row['LAST_NAME'] ?>
                                        </option>
                                    <?php } ?>


                                    </select>
                                    <label for="date" class="fw-bold">Date</label>
                                    <input type="date" name="DATE" id="" class="form-control" required>
                                    <label for="checkin" class="fw-bold">CheckinTime</label>
                                    <input type="time" name="CHECK_IN_TIME" id="" class="form-control">
                                    <label for="checkin" class="fw-bold">CheckOut</label>
                                    <input type="time" name="CHECK_OUT_TIME" id="" class="form-control">
                                    <label for="status" class="fw-bold">Status:</label>
                                    <select name="STATUS" id="" class="form-control">
                                        <option value="select disabled">choose status</option>
                                        <option value="PRESENT">PRESENT</option>
                                        <option value="ABSENT">ABSENT</option>
                                        <option value="LATE">LATE</option>
                                    </select>
                                    <button class="btn bg-black text-light mt-2" style="width: fit-content; align-self:center" name="submit">Record Employee</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <style>
        table {
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
        }

        body {
            background-color: rgba(196, 203, 206, 0.46);
        }
    </style>
</body>

</html>