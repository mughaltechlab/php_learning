<?php
    require_once "../config.php";
    session_start();
    if (isset($_GET['deleteId'])) {
        $id = $_GET['deleteId'];
        $result = mysqli_query($con,"DELETE FROM employee_two WHERE id=$id");
        if ($result) {
            $_SESSION['delete'] = "delete successfuly";
            echo header('location: ../index.php');
        }
    }else {
        die("Network Slow");
    }
?>