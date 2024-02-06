<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php
          echo  $_POST['v-one']. " ".$_POST['op']." ".$_POST['v-two']."= "  ;
    //    $result =  $_POST["v-one"] $_POST["op"] $_POST["v-two"];
    switch($_POST['op']){
        case '+':
            $result = $_POST["v-one"] + $_POST["v-two"];
            echo  $result;
            break;
        case '-':
            $result = $_POST["v-one"] - $_POST["v-two"];
            echo  $result;
            break;
        case '*':
            $result = $_POST["v-one"] * $_POST["v-two"];
            echo  $result;
            break;
        case '**':
            $result = $_POST["v-one"] ** $_POST["v-two"];
            echo  $result;
            break;
        case '/':
            $result = $_POST["v-one"] / $_POST["v-two"];
            echo  $result;
            break;
        case '%':
            $result = $_POST["v-one"] % $_POST["v-two"];
            echo  $result;
            break;
        default:
            echo "INVALID";
            break;

    }
    // if ($_POST["op"] == '+') {
    //     $result = $_POST["v-one"] + $_POST["v-two"];
    //     # code...
    //     echo  $_POST["v-one"] . $_POST["op"] .$_POST["v-two"]." = " .$result;
    // } elseif ($_POST["op"] == '-') {
    //     $result = $_POST["v-one"] - $_POST["v-two"];
    //     # code...
    //     echo  $_POST["v-one"] . $_POST["op"] .$_POST["v-two"]." = " .$result;
    // } elseif ($_POST["op"] == '*') {
    //     $result = $_POST["v-one"] * $_POST["v-two"];
    //     # code...
    //     echo  $_POST["v-one"] . $_POST["op"] .$_POST["v-two"]." = " .$result;
    // } elseif ($_POST["op"] == '/') {
    //     $result = $_POST["v-one"] / $_POST["v-two"];
    //     # code...
    //     echo  $_POST["v-one"] . $_POST["op"] .$_POST["v-two"]." = " .$result;
    // } elseif ($_POST["op"] == '**') {
    //     $result = $_POST["v-one"] ** $_POST["v-two"];
    //     # code...
    //     echo  $_POST["v-one"] . $_POST["op"] .$_POST["v-two"]." = " .$result;
    // } elseif ($_POST["op"] == '%') {
    //     $result = $_POST["v-one"] % $_POST["v-two"];
    //     # code...
    //     echo  $_POST["v-one"] . $_POST["op"] .$_POST["v-two"]." = " .$result;
    // }
    ?>
</body>
</html>