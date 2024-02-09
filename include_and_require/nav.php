<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: cursive;
        }
        nav{
            width: 100vw;
            background: teal;
            height: 40px;
            align-items: center;
            color: white;
            display: flex;
            justify-content: space-between;
            padding-inline: 20px;
        }
        .logo{
            font-weight: 600;
            font-family: sans-serif;
            text-shadow: 0 0 10px #fc0, 1px 0 1px black;
        }
        a{
            text-decoration: none;
            color: blanchedalmond;
        }
        ul{
            list-style-type: none;
            display: flex;
            gap: 1rem;
            margin-inline-start: 10px;
        }
        li>a{
            border-bottom: 2px solid transparent;
        }
        li>a:hover{
            border-color: rgb(14, 227, 227);
            text-shadow: 0 0 10px #fc0, 1px 0 1px black;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            LoneWolf
        </div>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Items</a></li>
            <li><a href="">About</a></li>
        </ul>
    </nav>
</body>
</html>