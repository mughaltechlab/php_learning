<?php
    $conn = mysqli_connect("localhost","root","","crud") or die("Connection failed") ;
    if (isset($_POST['submit'])) {
        # code...
        $uName = $_POST['userName'];
        // $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $sql = "SELECT * FROM `user` where  username='$uName' AND password='$pass'";
        $result = $conn->query($sql);
        // $result = mysqli_query($conn, $sql) or die("Query unsuccessful.."   ) ;
        if (mysqli_num_rows($result) == 1) {
            # code...
            echo "ok";
            die();
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uName && $row['password'] === $pass) {
                # code...
                echo "Logged In";
            }
        }
    }

        mysqli_close($conn);
    ?>