<?php

$con = mysqli_connect("localhost", "root", "", "crud") or die("Connection failed");

$limit = 5;
if (isset($_GET['page'])) {
    $CurrentPage = $_GET['page'];
} else {
    $CurrentPage = 1;
}

$num_of_rows = ($CurrentPage - 1) * $limit;
$query = "SELECT * FROM employee LIMIT $num_of_rows,$limit";
$result = mysqli_query($con, $query) or die("Query Failed");
if (mysqli_num_rows($result) >= 1) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>
        <!-- fetch data -->
        <div class="table container">
            <h1 class="display-4 text-center">Employee Data</h1>
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col">
                            <a href="./add_emp.php" class="btn btn-primary">Add Emp</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) { 
                        $id = $row['id'];
                    ?>
                    <tr>
                        <th scope="row"><?php echo $id; ?></th>
                        <td><?php echo $row['emp_name']; ?></td>
                        <td>
                            <button class="btn btn-success"><a href="update.php?updateId=<?php echo $id; ?>" class="text-white text-decoration-none" >Update</a></button>
                            <button class="btn btn-danger"><?php echo"<a href='delete.php?deleteId={$id}' class='text-white text-decoration-none'>Delete</a>" ?></button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="containe text-center">
            <?php
                $query = "SELECT * FROM employee";
                $result = mysqli_query($con, $query);
                $rows = mysqli_num_rows($result);
                $total_pages = ceil($rows/$limit);
                for ($i=1; $i <= $total_pages; $i++) { 
                    # code...
                    echo "
                        <a class='border p-2' href='emp_data.php?page=".$i."'>".$i."</a>
                    ";
                }
            ?>
            </div>
        </div>
    <?php } mysqli_close($con); ?>

</body>
<script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </html>