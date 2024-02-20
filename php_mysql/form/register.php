<?php
    $conn = mysqli_connect("localhost","root","","crud") or die("Connection failed") ;
    if (isset($_POST['submit'])) {
        # code...
        $uName = $_POST['userName'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $sql = "INSERT INTO user(username, email, password) VALUES ('{$uName}', '{$email}', '{$pass}')";
        $result = mysqli_query($conn, $sql) or die("Query unsuccessful.."   ) ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register yourself</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            position: relative;
            width: 100%;
            height: 100vh;
            background: linear-gradient(rgb(152, 152, 243),salmon);
        }
        .form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 300px;
            height: auto;
        }
        .form form{
            display: flex;
            gap: 10px;
            flex-direction: column;
        }
        form input{
            padding: 12px;
            border-radius: 6px;
            border: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            outline: none;
        }
        input::placeholder{
            color: rgb(197, 191, 191);
        }
        .btn{
            background: rgba(77, 117, 228, 0.792);
            color: white;
            transition: all .45s;
        }
        .btn:hover{
            background: rgba(40, 64, 130, 0.792);
        }
    </style>
</head>
<body>
    <div class="form">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="text" name="userName" id="userName" placeholder="Enter username" >
            <input type="email" name="email" id="email" placeholder="Enter email" required>
            <input type="password" name="pass" id="pass" placeholder="Enter Password" required>
            <input class="btn" type="submit" name="submitRegister" value="Sign Up">
        </form>
    </div>

    <?php
     mysqli_close($conn);
    ?>
</body>
</html>