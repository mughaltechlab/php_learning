<?php
    $name = 'user';
    $val = 'lonewolf';
    setcookie($name,$val,time() + (05),'/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php|set cookie </title>
</head>
<body>
    <?php echo $_COOKIE[$name]; ?>
</body>
</html>