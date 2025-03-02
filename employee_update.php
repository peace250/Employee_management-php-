<?php
require("./connect.php");
require("./nav.php");
$id = $_GET['id'];
$sql = "SELECT * FROM employee WHERE EMPLOYEE_ID = $id";
$result = mysqli_query($conn, $sql);
$run = mysqli_fetch_assoc($result);
$fname = $run['FIRST_NAME'];
$lname = $run['LAST_NAME'];
$dob = $run['DOB'];
$gender = $run['GENDER'];
$phone = $run['PHONE_NUMBER'];
$department = $run['DEPARTMENT'];

if (isset($_POST['submit'])) {
    $fname = $_POST['FIRST_NAME'];
    $lname = $_POST['LAST_NAME'];
    $dob = $_POST['DOB'];
    $gender = $_POST['GENDER'];
    $phone = $_POST['PHONE_NUMBER'];
    $department = $_POST['DEPARTMENT'];
    $sql = "UPDATE 
     `employee`
      SET 
      FIRST_NAME = '$fname',
      LAST_NAME = '$lname',
      DOB ='$dob',
      GENDER ='$gender',
      PHONE_NUMBER ='$phone',
      DEPARTMENT = '$department'
       WHERE 
       EMPLOYEE_ID = $id";

    $result = mysqli_query($conn,$sql);
    if ($result) {
        echo "
        <script>
        alert('Updated successfully!')
        window.location.href='./employee.php'
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

    <form action="" method="POST" class="d-flex flex-column   p-5">
        <h1>Record Employees</h1>
        <label for="firstName">FirstName</label>
        <input type="text" name="FIRST_NAME" id="" class="form-control" value=<?php echo $fname ?>>
        <label for="lastname">LastName</label>
        <input type="text" name="LAST_NAME" id="" class="form-control" value=<?php echo $lname ?>>
        <label for="gender">Gender:</label>
        <select name="GENDER" class="form-control" value=<?php echo $gender ?>>
            <option value="select disabled">Gender</option>
            <option value="Male" <?php if ($gender == 'Male') echo "selected"; ?>>Male</option>
            <option value="Female" <?php if ($gender == 'Female') echo "selected"; ?>>Female</option>
        </select>

        </select><br>
        <label for="DOB">DOB</label>
        <input type="date" name="DOB" id="" class="form-control" value=<?php echo $dob ?>>
        <label for="">Phone:</label>
        <input type="number" name="PHONE_NUMBER" id="" class="form-control" value=<?php echo $phone ?>>
        <label for="Department">Department</label>
        <input type="text" name="DEPARTMENT" id="" class="form-control" value=<?php echo $department ?>>
        <button class="btn bg-black text-light" style="width: fit-content; align-self:center" name="submit">Update Employee</button>
    </form>
</body>

</html>