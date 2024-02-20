<?php

    $con = mysqli_connect("localhost","root","","crud") or die("Connection failed") ;
    
        # code...
        $query = "SELECT * FROM employee";
        $result = mysqli_query($con,$query) or die("Query Failed");
        if (mysqli_num_rows($result) >= 1) {
            # code...
            $data = mysqli_fetch_assoc($result);
            echo "<pre>";
            print_r($data);
            echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
</head>
<body>
    <!-- fetch data -->
    <div class="table">
        <table>
            <thead>
                <th>Id</th>
                <th>Name</th>
            </thead>
            <tbody>
                <tr>
                    <?php 
                    // foreach ($variable as $key => $value) { 
                        ?>
                    <td><?php
                    //  echo $v['id']
                      ?></td>
                    <td><?php 
                    // echo $v['emp_name'] 
                    ?></td>
                </tr>
                    <?php
                //  } 
                 ?>
            </tbody>
        </table>
    </div>
    <?php
        }

        mysqli_close($con);
    ?>
</body>
</html>