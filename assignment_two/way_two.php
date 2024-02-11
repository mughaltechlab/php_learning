<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="it is other way of getting data from an array">
    <title>Document</title>
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
            margin-inline: auto;
            background: #fff;
        }
        #main-table{
            margin-block: 40px;
        }
        td{
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include('data.php'); ?>

    <!-- start foreach 1 -->
    <?php foreach ($arr1 as $key => $value) { 
        $totalHr = 0;
        echo"<table id='main-table'>";
        // foreach-1-if
        if (is_array($arr1[$key])) {
            # code...
            $inArr1 = $arr1[$key];
            // foreach-2
            // foreach ($inArr1 as $k => $v) {
                # code...
    ?>
      
   
        <!-- project name -->
        <tr>
            <td colspan='3'>
                <?php
                
                    if (isset($inArr1['pName'])) {
                        # code...
                        echo $inArr1['pName'];
                    }
                    else echo "invalid Project Name";
                 
                ?>
            </td>
        </tr>
         <!-- project Desc -->
         <tr>
            <td colspan='3'>
            <?php
                 if (isset($inArr1['pDes'])) {
                    # code...
                    echo $inArr1['pDes'];
                 }
                 else echo "invalid Project Description";
                ?>
            </td>
        </tr>
        <!-- Developers -->
        <?php 
                if (isset($inArr1['dev'])) {
                    if (is_array($inArr1['dev'])) {
                        # code...
                        $dev = $inArr1['dev'];
                        foreach ($dev as $key => $v) {
                            # code...
                            
                            
                            ?>
        <tr> 
            <!-- dev name -->
            <td>

            <?php 
                if (isset($v['name'])) {
                    # code...
                    echo $v['name'];
                }else{
                    echo "empty dev name";
                }
             ?>

            </td>
            <!-- dev hr -->
            <td>

            <?php 
                if (isset($v['hr'])) {
                    # code...
                    $totalHr += $v['hr'];
                    echo $v['hr']." hrs";
                }else{
                    echo "empty dev hr";
                }
             ?>

            </td>
            <!--// * dev timeline -->
            <td style = "padding:0;">

            <?php 
                if (isset($v['timeline'])) {
                    # code...
                    if (is_array($v['timeline'])) {
                        echo "<table style='width:100%;
                                            margin:0;
                                '>";
                        $timeline = $v['timeline'];
                        foreach ($timeline as $key => $v) {
                            # code...
            ?>
                        <tr>
                            <!-- timeline date -->
                            <td>
                                <?php 
                                    if (isset($v['date'])) {
                                        # code...
                                        echo $v['date'];
                                    }else{
                                        echo "empty dev date";
                                    }
                                ?>
                            </td>
                            <!-- timeline hr -->
                            <td>
                                <?php 
                                    if (isset($v['hrs'])) {
                                        # code...
                                        echo $v['hrs'];
                                    }else{
                                        echo "empty dev hrs";
                                    }
                                ?>
                            </td>
                        </tr>
            <?php
                        }
                    echo "</table>";
                    }
                }else{
                    echo "empty dev timeline";
                }
             ?>

            </td>

        </tr>
            <?php
                        } //end foreach $dev
                    } //end if is_array
                } //end if isset 
             ?>
           
        <!-- developers end -->
        <!-- total hours -->
        <tr>
            <td colspan='2'>Total Hr</td>
            <td>
                <?php echo $totalHr; ?>
            </td>
        </tr>
        

        <?php
         }// foreach-1-if-end
        echo "</table>" ;
    }// foreach-1 end
    ?>
    

</body>
</html>