<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
</head>
<body>
    <?php

    // 1: print 1 to 10 and 10 to 1
    echo "<h3>Print 1 to 10</h3>";
    for( $i = 1 ; $i <= 10 ; $i++){
        echo "$i <br>";
    }
    echo "<h3>Print 10 to 1</h3>";
    for( $i = 10 ; $i > 0 ; $i--){
        echo "$i <br>";
    }
    /**
     * print this
     *  *
     *  **
     *  ***
     *  ****
     */
    echo "<h3>Pattern 1:  </h3>";
    for ($i=1; $i < 5 ; $i++) { 
        for ($j=1; $j <= $i ; $j++) { 
            echo "*";
        }
        echo "<br>";
    }
    /**
     * print this
     *     *
     *    * *
     *   * * *
     *  * * * *
     */
    echo "<h3>Pattern 2:  </h3>";
    for ($i=1; $i < 5 ; $i++) { 
        for ($k=5; $k > $i ; $k--) { 
            echo "&nbsp;";
        }
        for ($j=1; $j <= $i ; $j++) { 
            echo "* ";
        }
        echo "<br>";
    }
    /**
     * print this
     *  * * * *
     *   * * *
     *    * *
     *     *
     */
    echo "<h3>Pattern 3:  </h3>";
    for($i = 1; $i < 5; $i++){
        for($k = 1; $k <= $i ; $k++){
            echo "&nbsp";
        }
        for ($j= 5; $j > $i ; $j--) { 
            echo "* ";
        }
        echo "<br>";
    }
    /**
     *  array
     */
    $arr = [8,6,10,2];

    //  find max value in an array through function
    echo "<h3>Max value in array:  </h3>";
    function maxValue($x = array()){
        $fake = $x[0];
        for ($i=0; $i < count($x); $i++) { 
            if ($x[$i] > $fake) {
                $fake = $x[$i];
            }
        }
        echo "max : $fake";

    }
    maxValue($arr);
    //  find min value in an array through function
    echo "<h3>Min value in array:  </h3>";
    $arr = [8,6,10,2];
    function minValue($x = array()){
        $fake = $x[0];
        for ($i=0; $i < count($x); $i++) { 
            if ($x[$i] < $fake) {
                $fake = $x[$i];
            }
        }
        echo "min : $fake";

    }
    minValue($arr);
    // sorting an array
    echo "<h3>Sorting an array:  </h3>";
    $sortArr = [5,4,3,2,1,0,-4,-2];
    function sortingArr($arr = array()){
        $el = 0;
        for ($i=0; $i < count($arr); $i++) { 
            for ($j=0; $j < count($arr) ; $j++) { 
              $check = $i + 1;
              if($check < count($arr)){
                if ($arr[$j] > $arr[$i + 1]) {
                    // a = $arr[$j] b= $arr[$i+1]
                    $el = $arr[$j];
                    $arr[$j] = $arr[$i + 1];
                    $arr[$i + 1] = $el;
                }
              }
            }
        }
        print_r($arr);
    }
    sortingArr($sortArr);
    // find n number of max value in an array
    $maxArr = [1,10.5,6,10,12,9,-2];
    echo "<h3>find n number of largest value in an array:</h3>";
    function nfindMax($arr, $key){
        $el = 0;
        for ($i=0; $i < count($arr); $i++) { 
            for ($j=0; $j < count($arr) ; $j++) {
              $check = $i + 1;
              if($check < count($arr)){
                if ($arr[$j] > $arr[$i + 1]) {
                    // a = $arr[$j] b= $arr[$i+1]
                    $el = $arr[$j];
                    $arr[$j] = $arr[$i + 1];
                    $arr[$i + 1] = $el;
                }
              }
            }
        }
        $index = count($arr);
        $check = $index - $key;
        echo $arr[$check];
        
    }
    print_r($maxArr);
    echo "<br>";
    nfindMax($maxArr,1 );

    
    ?>
</body>
</html>