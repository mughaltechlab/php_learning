<?php

    $con = mysqli_connect("localhost","root","","crud") or die("Connection failed") ;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // checking employee name
        if (empty($_POST['empName'])) {
            # code...
            echo "Enter Employee Name";
        }else {
            # code...
            $empName = $_POST['empName'];
            // echo $empName;
            $query  = "INSERT INTO employee(emp_name) VALUES ('{$empName}')";
            $result = mysqli_query($con, $query) or die("Query Failed") ;
            header('location: http://localhost/php_mysql/employee/emp_data.php');
            // echo "<script> window.location.assign('emp_data.php'); </script>";
        }
    }

    mysqli_close($con);
?>