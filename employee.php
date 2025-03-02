<?php
require("./connect.php");
require('./check.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['FIRST_NAME'];
    $lname = $_POST['LAST_NAME'];
    $gender = $_POST['GENDER'];
    $dob = $_POST['DOB'];
    $phone = $_POST['PHONE_NUMBER'];
    $department = $_POST['DEPARTMENT'];
    $sql = "INSERT INTO `employee` VALUES('','$fname','$lname','$gender','$dob','$phone','$department')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo "
    <script>
    alert('yes')
    </script>
    ";
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


    <div class="parent w-100 d-flex flex-row p-3">
        <div class=" col-md-4 col-lg-2  left_child fixed-top">
            <?php
            require("./nav.php");
            ?>
        </div>
        <div class="p-5 col-md-8 col-lg-10 right_child  d-flex flex-column justify-content-center align-items-center" style="margin-left: auto;">
            <button
                type="button"
                class="btn text-light"
                style="width: fit-content;background:#337bb2"
                data-bs-toggle="modal"
                title="Popup title"

                data-bs-target="#formModal">
                Record New Employee +
            </button>
            <div class="modal fade w-45 p-3 " id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">

                        <div class="model-header    d-flex flex-row  align-items-center  p-3   justify-content-between">
                            <h1 class="modal-title" id="formModalLabel"><a href="" class="text-dark text-decoration-none fs-2">XYZ</a></h1>

                            <button type="button" class="btn-close border border-dark" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="modal-title text-center" id="formModalLabel">Record Employees</h1>
                            <form action="" method="POST" class="d-flex flex-column w-90 p-3">
                                <label for="firstName" class="input-label fw-bold ">FirstName</label>
                                <input type="text" name="FIRST_NAME" id="" class="form-control">
                                <label for="lastname" class="input-label fw-bold ">LastName</label>
                                <input type="text" name="LAST_NAME" id="" class="form-control">
                                <label for="DOB" class="input-label fw-bold ">DOB</label>
                                <input type="date" name="DOB" id="" class="form-control">
                                <label for="" class="input-label fw-bold ">Phone:</label>
                                <input type="number" name="PHONE_NUMBER" id="" class="form-control">
                                <label for="gender" class="input-label fw-bold ">Gender</label>
                                <select name="GENDER" id="" class="form-control">
                                    <option value="select disabled">Gender</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select><br>
                                <label for="Department" class="input-label fw-bold ">Department</label>
                                <input type="text" name="DEPARTMENT" id="" class="form-control">

                                <button class="btn bg-black text-light pt-2" style="width: fit-content; align-self:center" name="submit">Record Employee</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Search Form -->
            <form action="" method="POST" class="d-flex mt-4 w-75 border rounded">
                <input type="text" name="search" class="form-control" placeholder="Search by Name..." required>
                <button type="submit" name="submit_search" class="btn" style="background-color: #337bb2;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" style="cursor: pointer;">
                        <path d="M10 2C5.5935666 2 2 5.5935666 2 10C2 14.406433 5.5935666 18 10 18C12.023929 18 13.871701 17.237039 15.283203 15.990234L16 16.707031L16 18L20 22L22 20L18 16L16.707031 16L15.990234 15.283203C17.237039 13.871701 18 12.023929 18 10C18 5.5935666 14.406433 2 10 2 z M 10 4C13.325553 4 16 6.6744469 16 10C16 13.325553 13.325553 16 10 16C6.6744469 16 4 13.325553 4 10C4 6.6744469 6.6744469 4 10 4 z M 7 9 A 1 1 0 0 0 6 10 A 1 1 0 0 0 7 11 A 1 1 0 0 0 8 10 A 1 1 0 0 0 7 9 z M 10 9 A 1 1 0 0 0 9 10 A 1 1 0 0 0 10 11 A 1 1 0 0 0 11 10 A 1 1 0 0 0 10 9 z M 13 9 A 1 1 0 0 0 12 10 A 1 1 0 0 0 13 11 A 1 1 0 0 0 14 10 A 1 1 0 0 0 13 9 z" />
                    </svg>
                </button>
            </form>

            <?php
            $result = [];
            if (isset($_POST['submit_search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM `employee` WHERE FIRST_NAME LIKE '%$search%' OR LAST_NAME LIKE '%$search%'";
                $runQuery = mysqli_query($conn, $sql);
                if ($runQuery) {
                    while ($row = mysqli_fetch_assoc($runQuery)) {
                        $result[] = $row;
                    }
                } else {
                    die("Query Failed: " . mysqli_error($conn));
                }
            }

            ?>
            <h2 class="h2 text-center p-4">Recorded Employees!</h2>




            <table class="table table-hover w-75 table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No:</th>
                        <th>FIRST_NAME</th>
                        <th>LAST_NAME</th>
                        <th>DOB_NAME</th>
                        <th>PHONE:</th>
                        <th>GENDER</th>
                        <th>DEPARTMENT</th>
                        <th>OPERATIONS</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $index = 0;
                    $sql = "SELECT * FROM `employee` ORDER BY  FIRST_NAME ASC, LAST_NAME ASC";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_array($result)) {

                            $index++;
                            $id = $row["EMPLOYEE_ID"];
                            $fname = $row['FIRST_NAME'];
                            $lname = $row['LAST_NAME'];
                            $dob = $row['DOB'];
                            $phone = $row['PHONE_NUMBER'];
                            $gender = $row['GENDER'];
                            $department = $row['DEPARTMENT'];

                            echo '
<tr>
<td>' . $index . '</td>
    <td>' . $fname . '</td>
    <td>' . $lname . '</td>
    <td>' . $dob . '</td>
    <td>' . $phone . '</td>
    <td>' . $gender . '</td>
    <td>' . $department . '</td>
    <td  
       <button class="btn"><a href="./employee_delete.php?id=' . $id . ' "   class= "text-decoration-none text-light "><?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="red">
  <path d="M10 2L9 3L3 3L3 5L21 5L21 3L15 3L14 2L10 2 z M 4.3652344 7L6.0683594 22L17.931641 22L19.634766 7L4.3652344 7 z" />
</svg></a></button>
      <button class="btn"><a href="./employee_update.php?id=' . $id . ' "   class= "text-decoration-none text-light"><?xml version="1.0" encoding="utf-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="#337bb2">
  <path d="M12 3C7.037 3 3 7.038 3 12L5 12C5 8.14 8.141 5 12 5C14.185097 5 16.125208 6.0167955 17.408203 7.5917969L15 10L21 10L21 4L18.833984 6.1660156C17.184843 4.2316704 14.736456 3 12 3 z M 19 12C19 15.859 15.859 19 12 19C9.8149031 19 7.8747922 17.983204 6.5917969 16.408203L9 14L3 14L3 20L5.1660156 17.833984C6.8151574 19.76833 9.263544 21 12 21C16.963 21 21 16.963 21 12L19 12 z" />
</svg></a></button>

    </td>
</tr>

';
                        }
                    }


                    ?>
                </tbody>

            </table>
        </div>
    </div>
<style>
      body {
            background-color:rgba(196, 203, 206, 0.48);
        }
</style>


</body>

</html>