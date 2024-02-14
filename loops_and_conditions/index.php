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
            font-family: monospace;
            letter-spacing: 2px;
        }
        ::-webkit-scrollbar{
            width: 15px;
        }
        ::-webkit-scrollbar-track{

            background: rgba(255,255,200,.4);
            margin-block: 30px;
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
            overflow-x: hidden;
        }
        h4{
            font-family: 'san-sarif';
            font-style: italic;
            animation: move 1s ease-in-out infinite;
            position: relative;
        }
        @keyframes move{
            0%{ left: -10px; }
            100%{ left: 10px; }
            
        }
        hr{
            margin: 20px;
        }
        table, td{
            border: 1px solid aqua;
        }
        td{
            padding: 5px;
        }
        #tag{
            color: yellow;
            animation: anime 1s linear infinite;
        }
        @keyframes anime{
            0%{
                color: red;
            }
            20%{
                color: aqua;
            }
            50%{
                color: violet;
            }
            70%{
                color: indigo;
            }
            100%{
                color: dodgerblue;
            }
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
    // array : key functions
    echo "<hr/>";
    // array_keys()
    echo "Array : Key functions ";
    echo "<hr style='width:50%; margin-inline: auto; ' />";
    echo "array_keys return all keys";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $indexArr = ['saqib'=>'vella','saddam'=>'teacher','aquib'=>'developer','rizwan'=>'bussiness-man'];
    $nindexArrKeys = array_keys($indexArr);
    echo "<pre>";
    print_r($nindexArrKeys);
    echo "<pre>";
    // array intersect functions
    echo "<hr/>";
    //* array_intersect() array_intersect_key() array_intersect_assoc()
    echo "array_intersect, array_intersect_key functions ";
    echo "<hr style='width:50%; margin-inline: auto; ' />";
    echo "array_intersect return same value <br> array_intersect_key return same keys <br> array_intersect_assoc return same key:value;
         ";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $aArr = ['saqib'=>'vella','saddam'=>'teacher','aquib'=>'developer','rizwan'=>'bussiness-man'];
    $aArr2= ['saqib'=>'teacher','saddam'=>'vella','aquib'=>'developer','rizwan'=>'bussiness-man'];
    $aArrKeys = array_intersect($aArr, $aArr2);
    echo "<pre>
        <h4 style='color:aqua;'>array_intersect</h4>";
    print_r($aArrKeys);
    echo "<pre>";
    $aArrKeys = array_intersect_assoc($aArr, $aArr2);
    echo "<pre>
        <h4 style='color:aqua;'>array_intersect_assoc</h4>";
    print_r($aArrKeys);
    echo "<pre>";
    echo "<hr/>";
    // array_column
    echo "<pre>
        <h4 style='color:aqua;'>array_column</h4>";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $aArr = [
        ['saqib'=>'vella','saddam'=>'teacher','aquib'=>'developer','rizwan'=>'bussiness-man'],
        ['saqib'=>'anime lover','saddam'=>'teacher','aquib'=>'developer','rizwan'=>'bussiness-man'],
        ['saqib'=>'owl','saddam'=>'teacher','aquib'=>'developer','rizwan'=>'bussiness-man']
    ];
    $aArrKeys = array_column($aArr,'saqib');
    print_r($aArrKeys);
    echo "</pre>";
    echo "<hr/>";
    // array_sum array_product
    echo "<h4 style='color:aqua;'>array_sum</h4>";
    $aArr = [ 2,4,8,10,12,14,16,18,20 ];
    $aArrKeys = array_sum($aArr);
    echo "<pre>";
    print_r($aArrKeys);
    echo "</pre>";
    echo "<h4 style='color:aqua;'>array_product</h4>";
    $aArr = [ 2,4,8 ];
    $aArrKeys = array_product($aArr);
    echo "<pre>";
    print_r($aArrKeys);
    echo "</pre>";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    // array_fill_keys
    echo "<h4 style='color:aqua;'>array_fill_keys</h4>";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $aArr = [ "a","b","c" ];
    $aArrKeys = array_fill_keys($aArr, "english");
    echo "<pre>";
    print_r($aArrKeys);
    echo "</pre>";
    // array_fill
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    echo "<h4 style='color:aqua;'>array_fill</h4>";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $aArr = [ "a","b","c" ];
    $aArrKeys = array_fill(1 ,4, "english");
    echo "<pre>";
    print_r($aArrKeys);
    echo "</pre>";
    // ARRAY_WALK ARRAY_WALK_RECURSIVE
    // array_walk
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    echo "<h4 style='color:aqua;'>array_walk</h4>";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $aArr = [ 
                "a" =>  "apple" ,
                "b" =>  "babel",
                "c" =>  "camaana",
            ];
    function printKV($v,$k){
        echo "$k : $v <br>";
    }
    array_walk($aArr,'printKV');
    // array_walk_recursive
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    echo "<h4 style='color:aqua;'>array_walk_recursive</h4>";
    echo "<hr style='width:10%; margin-inline: auto; ' />";
    $aArr = [ 
                "a" =>  "apple" ,
                "b" =>  "babel",
                "c" =>  "camaana",
                "d" =>  [
                            'd0' => 'dracula',
                            'd1' => 'alucard',
                        ]
            ];
    function printKV4aArr($v,$k){
        echo "$k : $v <br>";
    }
    array_walk_recursive($aArr,'printKV4aArr');
    // array_map
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     echo "<h4 style='color:aqua;'>array_map</h4>";
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     $aArr = [ 1,2,3,4,5,6,7,8,9,10 ];
     function print4map($v){
        $check = $v % 2;
        echo $check == 0 ? "$v is even <br>" : "$v is odd <br>";
     }
     array_map('print4map',$aArr);
    //  addslashes, stripslashes
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     echo "<h4 style='color:aqua;'>addslashes, stripslashes</h4>";
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     $msg = "I'm 'Lone Wolf'";
     $decode = addslashes($msg);
     $encode = stripslashes($decode);
     echo "msg: I'm 'Lone Wolf' <br>";
     echo "addslashes: <span id='tag'> $decode </span> <br>";
     echo "stripslashes: <span id='tag'> $encode </span> <br>";
    //  addcslashes, stripcslashes
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     echo "<h4 style='color:aqua;'>addcslashes, stripcslashes</h4>";
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     $msg = "Im Lone Wolf";
     $decode = addcslashes($msg, 'o');
     $encode = stripcslashes($decode);
     echo "msg: Im Lone Wolf <br>";
     echo "addcslashes: <span id='tag'> $decode </span> <br>";
     echo "stripcslashes: <span id='tag'> $encode </span> <br>";
    //  htmlentities, html_entity_decode
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     echo "<h4 style='color:aqua;'>htmlentities, html_entity_decode</h4>";
     echo "<hr style='width:10%; margin-inline: auto; ' />";
     $msg = " I'm \<\Lone Wolf>\ ";
     $decode = htmlentities($msg, ENT_QUOTES );
     $encode = html_entity_decode($decode);
     echo "msg: I'm Lone Wolf  <br>";
     echo "htmlentities: <span id='tag'> $decode </span> <br>";
     echo "html_entity_decode: <span id='tag'> $encode </span> <br>";
      //  sha1
      echo "<hr style='width:10%; margin-inline: auto; ' />";
      echo "<h4 style='color:aqua;'>sha1 use for secure password</h4>";
      echo "<hr style='width:10%; margin-inline: auto; ' />";
      $pas = "lonewolf786";
      $pasInBin = sha1($pas, true);
      $pasInHex = html_entity_decode($decode);
      echo "pas: lonewolf786  <br>";
      echo "sha1 return bin: <span id='tag'> $pasInBin </span> <br>";
      echo "shaq return hex: <span id='tag'> $pasInHex </span> <br>";
    ?>


</body>
</html>