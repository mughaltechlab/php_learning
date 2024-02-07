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
        body{
            background: #004;
            text-align: center;
        }
        hr{
            margin: 20px;
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
</body>
</html>