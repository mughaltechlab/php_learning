<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP| Loop & conditions</title>
    <style>
        *{
            margin: 0;
            padding : 0;
            box-sizing: border-box;
            color: crimson;
        }
        ::-webkit-scrollbar{
            width: 10px;
        }
        ::-webkit-scrollbar-track{

            background: rgba(0,255,0,.4);
            margin-block: 50px;
            border-radius: 20px;
        }
        ::-webkit-scrollbar-thumb{
            background: rgba(200,200,200,.4);
            border-radius: 20px;
            background: linear-gradient(#e66465,yellow,aqua,#9198e5);
            border: .5px solid white;
        }
        body{
            background: #004;
            text-align: center;
        }
        hr{
            margin: 20px;
        }
        table, td{
            border: 1px solid aqua;
            /* border-collapse: collapse; */
        }
    </style>
</head>
<body>
    <?php
        $employeeData = [
            [ 'name' => 'Aquib' ,'profession' =>  'Full-Stack Dev', 'sallary' => 5000 ],
            [ 'name' => 'Saqib' , 'profession' => 'Vella', 'sallary' => 1000 ],
            [ 'name' => 'Rizwan' , 'profession' => 'Back-end Dev', 'sallary' => 3500 ],
            [ 'name' => 'Saddam' , 'profession' => 'Teacher', 'sallary' => 2900 ],
        ];

        
    ?>
    <h1>PHP| Loop and Conditions</h1>
    <hr>
    <ul>
        <li><h3>IT Office Data</h3></li>
        <?php foreach($employeeData as $emp){ ?>
            
            
            <li><?php echo $emp['name'] ." : " .$emp['profession'] ?></li>
        <?php } ?>
        <select name="sallary" id="">
            <option value="" selected disabled>Sallary > 3000$</option>
            <?php foreach($employeeData as $emp){ ?>
            <?php if ($emp['sallary'] > 3000) { ?>
                <option value="<?php echo $emp['name'] ?>"><?php echo $emp['name'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
        
        <select name="sallary" id="">
            <option value="" selected disabled>Sallary < 3000$</option>
            <?php foreach($employeeData as $emp){ ?>
            <?php if ($emp['sallary'] < 3000) { ?>
                <option value="<?php echo $emp['name'] ?>"><?php echo $emp['name'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </ul>

    <?php
    // <!-- php goto statement -->
    echo "<hr/>";
    echo "goto statement";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    for ($i=0; $i < 10; $i++) { 
        # code...
        if ($i == 7) {
            # code...
            goto title;
        }
        echo "$i <br>";
    }
    title:
        echo "I am Lone Wolf";
    echo "<hr/>";
    echo "recursive fucntion";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    // recursive function
    function timer($n){
        if ($n <= 10) {
            echo $n."<br>";
            # code...
            timer($n + 1);
        }
    }
    timer(1);
    // recursive function factorial of number
    echo "<hr/>";
    echo "recursive fucntion ex: factorial ";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    function factorial($n){
        if ($n == 0) {
            # code...
            return 1;
        } else {
            # code...
            return ($n * factorial($n - 1));
        }
    }
    echo factorial(5);

    // foreach loop with list
    echo "<hr/>";
    echo "foreach loop with list function";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $tech = [
        [1,"html","css","bstrap"],
        [2,"html","css","js"],
        [3,"html","tailwind","react"],
    ];
    echo " <table cellpadding='5px' cellspacing='0' style='width:50%; margin-inline:auto; margin-bottom: 4rem;'> ";
    foreach ($tech as list($id,$b,$c,$d)) {
        # code...
        echo "<tr>";
        echo "<td>$id</td><td>$b</td><td>$c</td><td>$d</td>";
        echo "</tr>";
    }
    echo "</table>";
    // in_array array_search 
    echo "<hr/>";
    echo "in_array array_search ";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $indexArr = ['saqib','saddam','aquib','rizwan'];
    echo "in_array('saddam',['saqib','saddam','aquib','rizwan']) gives 1(true) or 0(false) : ".in_array('saddam',$indexArr)."<br>";
    echo "array_search('saddam',['saqib','saddam','aquib','rizwan']) gives the index of a value in an array : ".in_array('saddam',$indexArr);
    


    ?>

</body>
</html>