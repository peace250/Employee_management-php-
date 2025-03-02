<?php
require("./connect.php");
require('./check.php');
if (isset($_SESSION['NAME'])) {
    $username =  $_SESSION['NAME'];
} elseif (isset($_COOKIE["user_name"])) {
    $_SESSION['NAME'] = $_COOKIE["user_name"];
    $username = $_SESSION['NAME'];
} else {
    header('location: login.php');
    // exit();
}

// search 

//Fetch employees for dropdown
$employees = $conn->query("SELECT * FROM employee");

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

    <div class="parent d-flex  w-100">

        <div class="left  col-md-4 col-lg-2 left_element fixed-top h-100">
            <?php require("./nav.php") ?>
        </div>
        <div class="right  col-md-8 col-lg-10  right_element d-flex align-items-center justify-content-center  flex-column p-3 " style="margin-left: auto;">



            <form action="dashboard.php" method="POST" class="d-flex border rounded w-100">
                <input type="text" name="search" class="form-control w-100" placeholder="Search by Name..." required>
                <button type="submit" name="submit_search" class="btn" style="background-color: #337bb2;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" style="cursor: pointer;">
                        <path d="M10 2C5.5935666 2 2 5.5935666 2 10C2 14.406433 5.5935666 18 10 18C12.023929 18 13.871701 17.237039 15.283203 15.990234L16 16.707031L16 18L20 22L22 20L18 16L16.707031 16L15.990234 15.283203C17.237039 13.871701 18 12.023929 18 10C18 5.5935666 14.406433 2 10 2 z M 10 4C13.325553 4 16 6.6744469 16 10C16 13.325553 13.325553 16 10 16C6.6744469 16 4 13.325553 4 10C4 6.6744469 6.6744469 4 10 4 z M 7 9 A 1 1 0 0 0 6 10 A 1 1 0 0 0 7 11 A 1 1 0 0 0 8 10 A 1 1 0 0 0 7 9 z M 10 9 A 1 1 0 0 0 9 10 A 1 1 0 0 0 10 11 A 1 1 0 0 0 11 10 A 1 1 0 0 0 10 9 z M 13 9 A 1 1 0 0 0 12 10 A 1 1 0 0 0 13 11 A 1 1 0 0 0 14 10 A 1 1 0 0 0 13 9 z" />
                    </svg>
                </button>
            </form>


            <?php
            $sql = "SELECT * FROM ADMIN";
            $runQ = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($runQ);
            ?>
            <h3><b>ADMIN:</b> <?= $row['ADMIN_NAME'] ?></h3>
            <?php
            ?>

            <div class="container d-flex p-5
justify-content-end
align-items-end
 text-black
 flex-wrap
 ">
                <div class="row gap-3">
                    <div class="child col-lg-3 col-sm-2 p-5 d-flex align-items-center justify-content-between " style="width:230px; height:200px;">
                        <h6 class=" d-flex align-items-center"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26" width="30" height="30" fill="#1d3b52">
                                    <path d="M13 0.1875C5.925781 0.1875 0.1875 5.925781 0.1875 13C0.1875 20.074219 5.925781 25.8125 13 25.8125C20.074219 25.8125 25.8125 20.074219 25.8125 13C25.8125 5.925781 20.074219 0.1875 13 0.1875 Z M 19.734375 9.035156L12.863281 19.167969C12.660156 19.46875 12.335938 19.671875 12.015625 19.671875C11.695313 19.671875 11.34375 19.496094 11.117188 19.273438L7.085938 15.238281C6.8125 14.964844 6.8125 14.515625 7.085938 14.242188L8.082031 13.246094C8.355469 12.972656 8.804688 12.972656 9.074219 13.246094L11.699219 15.867188L17.402344 7.453125C17.621094 7.132813 18.0625 7.050781 18.382813 7.265625L19.550781 8.058594C19.867188 8.273438 19.953125 8.714844 19.734375 9.035156Z" />
                                </svg></span> <span>Present</span>
                        </h6>
                        <h4>
                            <?php
                            $sql = "SELECT COUNT(*) as Total_Present FROM `ATTENDANCE` WHERE STATUS='PRESENT'";
                            $queryRun = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($queryRun);
                            echo "<p>" . $row['Total_Present'] . "</p>"
                            ?>

                        </h4>

                    </div>
                    <div class="child col-lg-3 col-sm-2 p-5 d-flex align-items-center justify-content-between " style="width:230px; height:200px;">
                        <h6 class=" d-flex align-items-center"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30" height="30" fill="#1d3b52">
                                    <path d="M12 0C6.477 0 2 4.477 2 10C2 15.523 6.477 20 12 20C17.523 20 22 15.523 22 10C22 4.477 17.523 0 12 0 z M 12 3C12.553 3 13 3.448 13 4L13 10C13 10.049 12.979656 10.091672 12.972656 10.138672C12.962656 10.210672 12.955687 10.282563 12.929688 10.351562C12.906688 10.411563 12.869937 10.460625 12.835938 10.515625C12.801937 10.570625 12.772516 10.627781 12.728516 10.675781C12.679516 10.728781 12.619547 10.765641 12.560547 10.806641C12.520547 10.834641 12.492266 10.872531 12.447266 10.894531L8.4472656 12.894531C8.3042656 12.965531 8.1519531 13 8.0019531 13C7.6349531 13 7.2814688 12.798266 7.1054688 12.447266C6.8584688 11.953266 7.0587344 11.352469 7.5527344 11.105469L11 9.3828125L11 4C11 3.448 11.447 3 12 3 z M 35.560547 7C33.075547 7 31.060547 9.015 31.060547 11.5C31.060547 13.985 33.075547 16 35.560547 16C38.045547 16 40.060547 13.985 40.060547 11.5C40.060547 9.015 38.045547 7 35.560547 7 z M 31.566406 15.990234C31.494406 15.992234 29.784484 16.044828 28.521484 16.423828L22.013672 18.634766C21.319672 18.911766 20.868203 19.331234 20.658203 19.865234L17.339844 26.119141C16.711844 27.250141 16.978281 28.614094 17.988281 29.371094C18.589281 29.792094 19.342688 29.940484 20.054688 29.771484C20.760687 29.605484 21.36675 29.142141 21.71875 28.494141L24.453125 23.296875L27.896484 21.949219L25.417969 29.560547C24.965969 31.141547 25.378125 32.585344 26.703125 33.902344L34.240234 39.410156L36.683594 48.027344C36.995594 49.127344 37.999844 49.847656 39.089844 49.847656C39.314844 49.847656 39.542531 49.815953 39.769531 49.751953C40.413531 49.569953 40.946484 49.147453 41.271484 48.564453C41.597484 47.981453 41.675141 47.306063 41.494141 46.664062L38.783203 37.099609C38.461203 36.086609 37.846047 35.468641 37.498047 35.181641L33.677734 32.216797L35.658203 25.613281L36.984375 27.777344C37.502375 28.554344 38.271609 29 39.099609 29L46 29C46.74 29 47.445547 28.669797 47.935547 28.091797C48.406547 27.534797 48.608187 26.815187 48.492188 26.117188L48.490234 26.101562C48.246234 24.883563 47.157391 24 45.900391 24L40.578125 24L37.626953 19.238281C36.456953 17.325281 33.971406 15.990234 31.566406 15.990234 z M 25.234375 34.951172L23.787109 37.751953L17.1875 37.251953C15.8875 37.151953 14.687891 38.151172 14.587891 39.451172C14.487891 40.751172 15.487109 41.951734 16.787109 42.052734C16.787109 42.052734 25.187109 42.652344 25.287109 42.652344C26.187109 42.652344 27.086328 42.051953 27.486328 41.251953L28.904297 38.060547L25.746094 35.5L25.662109 35.433594L25.589844 35.359375C25.454844 35.223375 25.351375 35.088172 25.234375 34.951172 z" />
                                </svg>
                            </span><span>Late:</span>
                        </h6>
                        <h4>

                            <?php
                            $sql = "SELECT COUNT(*) as Total_Late FROM `ATTENDANCE` WHERE STATUS='LATE'";
                            $queryRun = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($queryRun);
                            echo "<p>" . $row['Total_Late'] . "</p>"
                            ?>

                        </h4>
                    </div>

                    <div class="child col-lg-3 col-sm-2 p-5 d-flex align-items-center justify-content-between " style="width:230px; height:200px; background:#337bb2 ">

                        <h6><span>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30" height="30" fill="#1d3b52">
                                    <path d="M25,2C12.319,2,2,12.319,2,25s10.319,23,23,23s23-10.319,23-23S37.681,2,25,2z M33.71,32.29c0.39,0.39,0.39,1.03,0,1.42C33.51,33.9,33.26,34,33,34s-0.51-0.1-0.71-0.29L25,26.42l-7.29,7.29C17.51,33.9,17.26,34,17,34s-0.51-0.1-0.71-0.29c-0.39-0.39-0.39-1.03,0-1.42L23.58,25l-7.29-7.29c-0.39-0.39-0.39-1.03,0-1.42c0.39-0.39,1.03-0.39,1.42,0L25,23.58l7.29-7.29c0.39-0.39,1.03-0.39,1.42,0c0.39,0.39,0.39,1.03,0,1.42L26.42,25L33.71,32.29z" />
                                </svg>
                            </span><span>Absent </span>
                            <h4>
                                <?php
                                $sql = "SELECT COUNT(*) as Total_Absent FROM `ATTENDANCE` WHERE STATUS='ABSENT'";
                                $queryRun = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($queryRun);
                                echo "<p>" . $row['Total_Absent'] . "</p>"
                                ?>
                            </h4>
                        </h6>
                    </div>
                    <div class="child col-lg-3 col-sm-2 p-5 d-flex align-items-center justify-content-between" style="width:230px; height:200px;">
                        <h6><span>

                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 26 26" fill="#1d3b52">
                                    <path d="M13.5,3.188C7.805,3.188,3.188,7.805,3.188,13.5S7.805,23.813,13.5,23.813S23.813,19.195,23.813,13.5 S19.195,3.188,13.5,3.188z M19,15h-4v4h-3v-4H8v-3h4V8h3v4h4V15z" />
                                </svg>
                            </span><span>Total:</span>
                            <h4>
                                <?php
                                $sql = "SELECT COUNT(*) as Total_Employees FROM `ATTENDANCE`";
                                $runsql = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($runsql);
                                echo "<p>" . $row['Total_Employees'] . "</p>"
                                ?>
                            </h4>
                        </h6>


                    </div>


                </div>

            </div>
            <h3 style="color:rgba(129, 160, 173, 0.89);"></h3>
            <h2 class="h3  fw-bold pt-5" style="color:#1d3b52">Recent Report Of all the Present Employees!</h2>
            <div class="report pt-5 w-100">
                <form method="POST">
                    <label class="input-label">Select Employee:</label>
                    <select name="employee_id" required>
                        <option value="">-- Select Employee --</option>
                        <?php while ($row = $employees->fetch_assoc()): ?>
                            <option value="<?= $row['EMPLOYEE_ID'] ?>">
                                <?= $row['FIRST_NAME'] . " " . $row['LAST_NAME'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <label>Start Date:</label>
                    <input type="date" name="start_date" required>
                    <label>End Date:</label>
                    <input type="date" name="end_date" required>
                    <button type="submit" name="filter">Filter</button>
                </form>

                <table class="table table-hover w-100 table-striped table-bordered table-responsive" id="table">

                    <thead class="" style="background-color: #337bb2;">
                        <th>Names</th>
                        <th>Date</th>
                        <th>Check_in_Time</th>
                        <th>Check_out_Time</th>
                        <th>Status</th>

                    </thead>

                    <?php

                    //display searched result
                    if (isset($_POST['submit_search'])) {
                        $search = mysqli_real_escape_string($conn, $_POST['search']);
                        $sql = "SELECT * FROM employee INNER JOIN ATTENDANCE ON employee.EMPLOYEE_ID=attendance.EMPLOYEE_ID  WHERE employee.FIRST_NAME LIKE '%$search'";

                        $runQ = mysqli_query($conn, $sql);


                        while ($row = mysqli_fetch_assoc($runQ)) {
                            $date = $row['DATE'];
                            $intime = $row['CHECK_IN_TIME'];
                            $outtime = $row['CHECK_OUT_TIME'];
                            $status = $row['STATUS'];
                            $id = $row['EMPLOYEE_ID'];
                            $name = $row['FIRST_NAME'] . " " . $row['LAST_NAME'];

                            echo "
                            <tr class='table-active'>
                            <td>$name</td>
                            <td>$date</td>
                            <td>$intime</td>
                            <td>$outtime</td>
                            <td>$status</td>
                            </tr>
                            ";
                        }
                    } elseif (isset($_POST['filter'])) {

                        //filter by date
                        $employee_id = $_POST['employee_id'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];
                        // Query to get attendance records
                        $sql = "SELECT * FROM employee INNER JOIN ATTENDANCE ON employee.EMPLOYEE_ID=attendance.EMPLOYEE_ID 
                WHERE employee.EMPLOYEE_ID = '$employee_id'
                AND attendance.DATE BETWEEN '$start_date' AND '$end_date'
                ORDER BY attendance.DATE ASC";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                $date = $row['DATE'];
                                $intime = $row['CHECK_IN_TIME'];
                                $outtime = $row['CHECK_OUT_TIME'];
                                $status = $row['STATUS'];
                                $id = $row['EMPLOYEE_ID'];
                                $name = $row['FIRST_NAME'] . " " . $row['LAST_NAME'];

                                echo "
                <tr class='table-active'>
                <td>$name</td>
                <td>$date</td>
                <td>$intime</td>
                <td>$outtime</td>
                <td>$status</td>
                </tr>
                ";
                            }
                        } else {

                            echo "
                            <script>
                            alert('Employee Not found!');
                            window.location.href= './dashboard.php';
                            </script>
                            ";
                        }
                    } else {
                        $sql = "SELECT * FROM EMPLOYEE INNER JOIN ATTENDANCE ON EMPLOYEE.EMPLOYEE_ID = ATTENDANCE.EMPLOYEE_ID ORDER BY EMPLOYEE.FIRST_NAME ASC,EMPLOYEE.LAST_NAME ASC ";
                        $runQ = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($runQ)) {
                            $date = $row['DATE'];
                            $intime = $row['CHECK_IN_TIME'];
                            $outtime = $row['CHECK_OUT_TIME'];
                            $status = $row['STATUS'];
                            $id = $row['EMPLOYEE_ID'];
                            $name = $row['FIRST_NAME'] . " " . $row['LAST_NAME'];

                            echo "
                                <tr class='table-active'>
                                <td>$name</td>
                                <td>$date</td>
                                <td>$intime</td>
                                <td>$outtime</td>
                                <td>$status</td>
                                </tr>";
                        }
                    }
                    ?>
                </table>
                <button onclick="myfunction()" class="btn text-light" style="background-color: #1d3b52;">Print Report</button>
            </div>
        </div>
    </div>
    <script>
        function myfunction() {
            a = document.getElementById("table");
            b = document.querySelector("btn");



        }
    </script>

    <style>
        body {
            background-color: rgba(196, 203, 206, 0.48);


        }

        .child {
            border-radius: 20px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);
            background: white;
            color: #337bb2;
            color: #1d3b52;

        }

        table {
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2);

        }

        thead {
            background-color: #1d3b52;
        }
    </style>

</body>

</html>