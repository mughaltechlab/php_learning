<?php
require_once "config.php";
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
            $fullName = $_POST['firstName'] . " " . $_POST['lastName'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $gender = $_POST['gender'];
            $religion = $_POST['religion'];
            $desc = $_POST['description'];
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
                    echo "insert data";
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
    }
} else {
    echo "Network is slow";
}
