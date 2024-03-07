<?php
    require_once "config.php";
    session_start();

    // limit of showing rows on a page
    $limit = 5;
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $rowIndex = ($page - 1) * $limit;
    $result = mysqli_query($con,"SELECT * FROM employee_two ORDER BY id DESC LIMIT $rowIndex,$limit ");
    if (mysqli_num_rows($result) >= 1) {
?>
<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Data</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toaster/4.0.1/css/bootstrap-toaster.min.css" integrity="sha512-RLiJ5uLcu8jWxsJBevOZWLU0zWv51vwpha0Gh4jRKOqkcWbVR7+U8kKaiGsMhSua3fIkviCHRClSH+XZYKIoZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
            .actionBtn:hover{
                transform: scale(1.15);
                box-shadow: 0 0 1px ;
            }
            .msg{
                animation: hide 2s linear;
            }
        </style>
    </head>

    <body>
        <?php
            if (isset($_SESSION['register'])) {
                $msg = $_SESSION['register'];
                # code...
                echo "
                <div class='msg'>
                    <div class=' alert alert-success alert-dismissible'>
                        <button class='close' data-dismiss='alert' aria-label='close'>&times;</button>
                        <strong>Success!</strong> $msg.
                    </div>
                </div>
                    ";
                session_unset();
            } else if (isset($_SESSION['delete'])) {
                $msg = $_SESSION['delete'];
                # code...
                echo "
                <div class='msg'>
                    <div class=' alert alert-success alert-dismissible'>
                        <button class='close' data-dismiss='alert' aria-label='close'>&times;</button>
                        <strong>Success!</strong> $msg.
                    </div>
                </div>
                    ";
                session_unset();
            } else if (isset($_SESSION['update'])) {
                $msg = $_SESSION['update'];
                # code...
                echo "
                <div class='msg'>
                    <div class=' alert alert-success alert-dismissible'>
                        <button class='close' data-dismiss='alert' aria-label='close'>&times;</button>
                        <strong>Success!</strong> $msg.
                    </div>
                </div>
                    ";
                session_unset();
            }
        ?>
        <!-- fetch data -->
        
        
        <div class="table container bg-white shadow mt-5 p-2" style="width:80vw">
            <h1 class="display-4 text-center">Employee Data</h1>
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col" colspan="5">
                            <?php 
                                // date_default_timezone_set('Asia/Karachi');
                                // $time = date("d-Y-m h:i:s:A");
                                // echo "$time";
                             ?>
                                <!-- py-0 px-2 position-absolute top-0 start-0 -->
                                <a href="./register.php" class="btn btn-primary ">Add Emp</a>
                                <a href="./db/generateCsv.php" class="btn btn-success float-right">Download in Csv format</a>
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
                            <button class="btn actionBtn p-1"><a href="show.php?viewId=<?php echo $id ?>" class="text-primary text-decoration-none"><i class="bi bi-eye"></i></a></button>
                            <button class="btn actionBtn p-1"><a href='update.php?updateId=<?php echo $id ?>' class='text-success text-decoration-none'><i class="bi bi-pen"></i></a></button>
                            <button class="btn actionBtn p-1"><a href='db/delete.php?deleteId=<?php echo $id ?>' class='text-danger text-decoration-none'><i class="bi bi-trash"></i></a></button>
                        </td>
                        <!-- <td>
                            <button class="btn btn-success"><a href="#?updateId=" class="text-white text-decoration-none" >Update</a></button>
                            <button class="btn btn-danger"><a href='#?deleteId={$id}' class='text-white text-decoration-none'>Delete</button>
                        </td> -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="container-fluid text-center align-items-center position-relative">
                <div class="container w-50 bg-">
                    <?php
                        $result = mysqli_query($con,"SELECT * FROM employee_two");
                        $rows = mysqli_num_rows($result);
                        $totalPages = ceil($rows/$limit);
                        for ($i=1; $i <= $totalPages; $i++) { 
                    ?>
                    <a class="btn text-dark shadow-sm py-0" href="index.php?page=<?php echo $i; ?> "> <?php echo $i ?> </a>
                    <?php
                        }

                    ?>
                </div>
                <!-- <a href="./register.php" class="btn btn-primary py-0 px-2 position-absolute top-0 start-0">Add Emp</a> -->
            </div>
        </div>
<?php
    }
mysqli_close($con);
?>
</body>
<script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    setTimeout(()=>{document.querySelector('.msg').style.display = 'none';}, 2000);
</script>
</html>