<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
    <style>
        *{
            font-family: 
        }
        #title{
            margin-inline:auto;
            font-family: monospace;
        }   
        form{
            display:flex;
            flex-direction: column;
            width: 300px;
            margin-inline:auto;
        }
    </style>
</head>
<body>
    <form action="result.php" method="post">
        <h1 id="title">Calculator</h1>
        <input type="text" name="v-one" id="v-one" placeholder="Value 1">
        <input type="text" name="op" id="op" placeholder="operator">
        <input type="text" name="v-two" id="v-two" placeholder="Value 2">
        <input type="submit" value="submit">
    </form>
</body>
</html>