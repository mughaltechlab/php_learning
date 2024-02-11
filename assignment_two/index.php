<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php | Assignment two</title>
    <style>
        body{
            background: #f4f4f4;
        }
        table , td{
            border: 1px solid;
            border-collapse: collapse;
            
        }
        table{
            width: 60%;
            text-align: center;
            margin-block: 40px;
            margin-inline: auto;
            background: #fff;
        }
        td{
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include ('data.php'); ?>
    <!-- <table>  -->
        <?php
        
        foreach ($arr1 as $key => $value) {
            echo "<table>";
            if (is_array($arr1[$key])) {
                # code...
                $arr = $arr1[$key];
                foreach ($arr as $key => $value) {
             ?>
         
         <!-- <tr>
            <td colspan="2"> -->
        <?php 
            $hour = 0;
            if (is_array($arr[$key])) {
                # code...
                $inArr = $arr[$key];
                foreach($inArr as $dev => $v){
        ?>
                <!-- <tr> -->
                    <!-- <td> -->
                        <?php 
                            // print_r($inArr[$dev]);
                            echo "<tr>";
                            if (is_array($inArr[$dev])) {
                                
                                # code...
                                foreach ($inArr[$dev] as $key => $value) {
                                    # code...
                                    if (is_array($inArr[$dev][$key])) {
                                        # code...
                                        $timeline = $inArr[$dev][$key];
                                        echo "<td><table>";
                                        foreach ($timeline as $key => $value) {
                                            # code...
                                            if (is_array($timeline[$key])) {
                                                # code...
                                                $inTimeline = $timeline[$key];
                                                echo "<tr>";
                                                foreach ($inTimeline as $k => $v) {
                                                    # code...
                                                    if (is_array($inTimeline[$k])) {
                                                        # code...workingggg
                                                        $inTimelineArr = $inTimeline[$k];
                                                        foreach($inTimelineArr as $k => $v){
                                                            echo "<td>{$inTimelineArr[$k]}</td>";
                                                        }
                                                    } else {
                                                        # code...
                                                        echo "<td>{$inTimeline[$k]} </td>";
                                                    }
                                                    
                                                }
                                                echo "</tr>";

                                            } else {
                                                echo "<td>{$timeline[$key]}</td>";
                                            }
                                        }
                                        echo "</table></td>";

                                    }
                                    else{

                                        echo "<td> <h3> {$inArr[$dev][$key]} </h3> </td>";
                                    }
                                    // if (isset($inArr[$dev]['hr'])) {
                                    //     # code...
                                    //     echo $inArr[$dev]['hr'];
                                    // }
                                    
                                }
                                
                            } else {
                                # code...
                                echo "<td>$inArr[$dev]</td>"; 
                            }
                            echo "</tr>";
                            
                            if (isset($inArr[$dev]['hr'])) {
                                # code...
                                $hour += $inArr[$dev]['hr'];
                                
                            }
                        
                        ?>
                    <!-- </td> -->
                </tr>
        <?php
                }
            }else{

                echo "<tr><td colspan='16'> $arr[$key] </td></tr>";    
            }

        }
    }
    echo "<tr>
            <td colspan='1'>Total</td><td colspan='15'>$hour</td>
        </tr>";

    echo "</table>";
 
}
        ?>
          

    <!-- </table> -->

    
</body>
</html>