
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
            background: rgba(38, 175, 114, 0.792);
            transition: all .45s;
            color: white;
        }
        .btn:hover{
            background: rgba(23, 109, 71, 0.792);
        }
    </style>
</head>
<body>
    <div class="form">
        <form action="process.php" method="post">
            <input type="text" name="userName" id="text" placeholder="Enter Username">
            <input type="password" name="pass" id="pass" placeholder="Enter Password">
            <input class="btn" type="submit" name="submitLogin" value="Sign In">
        </form>
    </div>
    
</body>
</html>