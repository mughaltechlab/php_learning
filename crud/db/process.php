<?php
// require_once "config.php";
$con = mysqli_connect('localhost','root','','crud') or die("connection failed");

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo "hello";
    // if (empty($_POST['firstName'])) {
    //     $_SESSION['firstname'] = "Required";
    //     header('location: ../register.php');
    // } 

// todo: working -->>>>>>>>>>>>>>>>
    // if (
    //     isset($_POST['firstName']) ||
    //     isset($_POST['lastName']) ||
    //     isset($_POST['email']) ||
    //     isset($_POST['gender']) ||
    //     isset($_POST['religion']) ||
    //     isset($_POST['description']) 
    // ){
    //     if (isset($_POST['firstName'])) {
    //         $_SESSION['postfirstname'] = $_POST['firstName'];
    //     }  if (isset($_POST['lastName'])) {
    //         $_SESSION['postlastname'] = $_POST['lastName'];
    //     } if (isset($_POST['email'])) {
    //         $_SESSION['postemail'] = $_POST['email'];
    //     } if (isset($_POST['description'])) {
    //         $_SESSION['postdescription'] = $_POST['description'];
    //     } 


    //     header('location: ../register.php');
    //     // die();
    // }
// todo: working complete -->>>>>>>>>>>>>>>>
    # code...
    if (
        empty($_POST['firstName']) ||
        empty($_POST['lastName']) ||
        empty($_POST['email']) ||
        empty($_POST['password']) ||
        empty($_POST['gender']) ||
        empty($_POST['religion']) ||
        empty($_POST['description']) ||
        !isset($_FILES['image']['name'])
    ){
        if (empty($_POST['firstName'])) {
            $_SESSION['firstname'] = "* Required";
        }  if (empty($_POST['lastName'])) {
            $_SESSION['lastname'] = "* Required";
        } if (empty($_POST['email'])) {
            $_SESSION['email'] = "* Required";
        } if (empty($_POST['password'])) {
            $_SESSION['password'] = "* Required";
        } if (empty($_POST['gender'])) {
            $_SESSION['gender'] = "* Required";
        } if (empty($_POST['religion'])) {
            $_SESSION['religion'] = "* Required";
        } if (empty($_POST['description'])) {
            $_SESSION['description'] = "* Required";
        } if (!isset($_FILES['image']['name'])) {
            $_SESSION['image'] = "* Required";
        }

        $encode_arr = urlencode(serialize($_POST));

        header("location: ../register.php?data=$encode_arr");
        // die();
    }
}

if (isset($_POST['register'])) {
   
     if (
        isset($_POST['firstName']) &&
        isset($_POST['lastName']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['gender']) &&
        isset($_POST['religion']) &&
        isset($_POST['description'])
    ) {

        # //* now checking for image
        if (isset($_FILES['image'])) {

            # //* set variables
            $fullName = test_input($_POST['firstName']) . " " . test_input($_POST['lastName']);
            $email = test_input($_POST['email']);
            $password = md5($_POST['password']);
            $gender = test_input($_POST['gender']);
            $religion = test_input($_POST['religion']);
            $desc = test_input($_POST['description']);
            $emailArr = explode('@',$email);    // for username
            $randNum = rand(1000,9999);         // for username
            $userName = $emailArr[0].$randNum;
            # //* file image
            $imgFolder = '../images/';
            $imageName = basename($_FILES["image"]["name"]);
            $imageTmpName = $_FILES["image"]["tmp_name"];
            $targetDir = $imgFolder.$imageName;
            $isUpload = move_uploaded_file($imageTmpName,$targetDir);

            if ($isUpload) {
                # code...
                // echo "upload successfuly";
                $query = "INSERT INTO employee_two (fullname,username,email,password,gender,religion,description,profile_image) VALUE ('{$fullName}','{$userName}','{$email}','{$password}','{$gender}','{$religion}','{$desc}','{$imageName}')";

                $result = mysqli_query($con,$query);
                if ($result) {
                    # code...
                    $_SESSION['register'] = "$fullname added successfuly";
                    header('location: ../index.php');
                }else {
                    die("error in insert query");
                }
            } else {
                echo "sorry there was an error while uploading your file";
            }

            /**
             * echo $fullName."<br>";
             * echo $userName."<br>";
             * echo $email."<br>";
             * echo $password."<br>";
             * echo $gender."<br>";
             * echo $religion."<br>";
             * echo $desc."<br>";
             * echo $imageName."<br>";
             * echo $imageTmpName."<br>";
             */
        }
    } else {
        echo "The End";
        // header('location: ../register.php');
    }
} elseif (isset($_POST['login'])) {
    # code...
   if (isset($_POST['email']) && isset($_POST['password']) ) {
    # code...
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM `employee_two` WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
        // $row = mysqli_fetch_assoc($result);
        $row = $result->fetch_assoc();
        $email = $row['email'];
        // session_start();
        $_SESSION['login_email'] = $email;
        # code...
        header('location: ../index.php');
    }else {
        echo "error in query";
    }
   }
} else {
    echo "Network is slow";
}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>