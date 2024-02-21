<?php

    $con = mysqli_connect("localhost", "root", "", "crud") or die("Connection failed");

    # code...
    if (isset($_GET['deleteId'])) {
        $id = $_GET['deleteId'];
        # code...
        $query = "DELETE FROM employee WHERE id=$id " ;
        $result = mysqli_query($con, $query) or die("Query Failed");

        if ($result){
            echo "<script>
                    window.alert('deleted successfully');
                    window.location.assign('emp_data.php');
                </script>";
            // echo "<script> window.location.assign('emp_data.php'); </script>";

            // header('location: emp_data.php');
        } else {
            die(mysqli_error($con));
        }
    }
?>