<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php | include and require</title>
    <style>
        ol{
            /* margin: 10px 50px; */
        }
        ol li:nth-child(odd) {
            background: #f4f1f1;
        }
        main{
            padding: 10px 50px;
        }
    </style>
</head>
<body>
    <?php
        // when we use include and it didn't find that file so it gives warning and run forward code
        include ("nav.php");
    ?>
    <main>
        <form>
            <h5>Type 0 for biryaani and 1 for chicken</h5>
            <input type="text" name="list" placeholder="enter number">
        </form>
        <?php
            $x = $_REQUEST["list"];
            if ($x == '1') {
                // when we use require and it didn't find that file so it gives fatal error and stop the code
                require ("list-one.php");
            }elseif ($x == '0') {
                require ("list-two.php");
            }else {
                echo "  <h4>Type </h4>
                        <ol>
                            <li>Biryani</li>
                            <li>Chicken</li>
                        <ol>

                    ";
            }
        ?>
    </main>
</body>
</html>