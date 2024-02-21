<?php

    $con = mysqli_connect("localhost","root","","crud") or die("Connection failed") ;
    $id = $_GET['updateId'];
    $query = "SELECT * FROM employee WHERE id=$id";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($result) ;
    if (isset($_GET['updateId'])) {
        # code...
        $id = $_GET['updateId'];

        if (isset($_POST['update'])) {

            $name = $_POST['empName'];

            $query = "UPDATE employee SET id=$id, emp_name='$name' WHERE id=$id";
            $result = mysqli_query($con,$query);
            if ($result) {
                # code...
                echo "<script>
                    window.alert('Update successfully');
                    window.location.assign('emp_data.php');
                </script>";
            } else {
                die(mysqli_error($con));
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Data</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="empName" placeholder="Enter employee name" value="<?php echo $row['emp_name']; ?>" >
        <button type="submit" id="submit" name="update" class="btn">UPDATE</button>
        <!-- <input type="submit"  value="submit"> -->
    </form>

<?php
    mysqli_close($con);
?>
</body>
</html>