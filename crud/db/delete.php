<?php
    include_once "config.php";
    if (isset($_GET['deleteId'])) {
        $id = $_GET['deleteId'];
        $result = mysqli_query($con,"DELETE FROM employee_two WHERE id=$id");
        if ($result) {
            echo "<script>
                    window.alert('deleted successfully');
                    window.location.assign('../index.php');
                </script>";
        }
    }else {
        die("Network Slow");
    }
?>