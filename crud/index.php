<?php
    require_once "db/config.php";

    $result = mysqli_query($con,"SELECT * FROM employee_two ORDER BY id DESC");
    if (mysqli_num_rows($result) >= 1) {
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>

    <body>
        <!-- fetch data -->
        <div class="table container">
            <h1 class="display-4 text-center">Employee Data</h1>
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col" colspan="2">
                            <a href="./add_emp.php" class="btn btn-primary">Add Emp</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col" class="col-0">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col" class="col-2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($rows = mysqli_fetch_assoc($result)) {
                            $id = $rows['id'];
                            $username = $rows['username'];
                            $email = $rows['email'];
                            $gender = $rows['gender'];
                    ?>
                    <tr>
                        <th scope="row"> <?php echo $id ?> </th>
                        <td><?php echo $username ?></td>
                        <td><?php echo $email ?></td>
                        <td><?php echo $gender ?></td>
                        <td>
                            <button class="btn"><a href="show.php?viewId=<?php echo $id ?>" class="text-primary text-decoration-none"><i class="bi bi-eye"></i></a></button>
                            <button class="btn"><a href='update.php?updateId=<?php echo $id ?>' class='text-success text-decoration-none'><i class="bi bi-pen"></i></a></button>
                            <button class="btn"><a href='db/delete.php?deleteId=<?php echo $id ?>' class='text-danger text-decoration-none'><i class="bi bi-trash"></i></a></button>
                        </td>
                        <!-- <td>
                            <button class="btn btn-success"><a href="#?updateId=" class="text-white text-decoration-none" >Update</a></button>
                            <button class="btn btn-danger"><a href='#?deleteId={$id}' class='text-white text-decoration-none'>Delete</button>
                        </td> -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="containe text-center">
            
            </div>
        </div>
<?php
    }
mysqli_close($con);
?>
</body>
<script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </html>