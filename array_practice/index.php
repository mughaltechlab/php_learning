<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /** 
         * * 3. $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;
         * * Create a PHP script which displays the capital and country name from the above array $ceu. Sort the list by the capital of the country.
         * * Sample Output :
         * * The capital of Netherlands is Amsterdam 
         * * The capital of Greece is Athens 
         */   
        echo "Sorting associated array by value <br>";
        $arr = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;
        asort($arr);
        foreach ($arr as $country => $capital) {
            # code...
            echo "The capital of $country is $capital <br>";
        }
        echo "<hr/>";
        /**
         * $x = array(1, 2, 3, 4, 5);
         * Delete an element from the above PHP array. After deleting the element, integer keys must be normalized.
         * Sample Output :
         * array(5) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) } 
         * array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(5) }
         */
        $x = array(1, 2, 3, 4, 5);
        unset($x[2]);
        $x = array_values($x);
        var_dump($x);
        echo "<hr/>";
        /**
         * 6. Write a PHP script which decodes the following JSON string.
         * Sample JSON code :
         * {"Title": "The Cuckoos Calling",
         * "Author": "Robert Galbraith",
         * "Detail": {
         * "Publisher": "Little Brown"
         * }}
         * Expected Output :
         * Title : The Cuckoos Calling
         * Author : Robert Galbraith
         * Publisher : Little Brown
        */
        function myFunc($value,$key){
            echo "$key : $value <br>";
        }
        $jsonData = '{
                "Title": "The Cuckoos Calling",
                "Author": "Robert Galbraith",
                "Detail": {
                            "Publisher": "Little Brown"
                    }
                    }';
        
        $data = json_decode($jsonData, true);
        array_walk_recursive($data, "myFunc");
        echo "<hr/>";
?>
</body>
</html>