<?php
    require_once "../config.php";

    // *step2: set filename and delimiter
    date_default_timezone_set('Asia/Karachi');
    $filename = "users_". date('d-m-Y_H_i_s').".csv";
    $delimiter = ",";

    // echo $filename;
    // *step3: open memory file fopen('php://memory','w');
    // ? here 'php://memory' => This memory file will be used to store the CSV data before it's sent to the client for download.
    $f = fopen('php://memory','w');

    // *step4 header row
    $fields = array('ID','Fullname','Email','Gender');

    fputcsv($f,$fields,$delimiter);
    
    // *step5 query the database => execute a query to select all records from table
    $query = "SELECT * FROM employee_two";
    $result = mysqli_query($con,$query);
    if (mysqli_num_rows($result) > 0) {
        # code...
        while( $row = $result->fetch_assoc() ){

            // *step6 fetching data from db
            $lineData = array($row['id'],$row['fullname'],$row['email'],$row['gender']);
            // arrayP($lineData);

            // *step7 save each row in csv file
            fputcsv($f,$lineData,$delimiter);
        }
    }

    // *step8 move file pointer in the beginning after set all rows
    fseek($f,0);
    
    // *step8 header('Content-Type: text/csv'): This line sets the HTTP header Content-Type to text/csv. It informs the browser that the content being sent is of type CSV. Browsers typically use this information to handle the content appropriately.
    header('Content-Type: text/csv');

    // *step9 header('Content-Disposition: attachement; filename=".$filename.";') This line sets the Content-Disposition header with the value attachment, which prompts the browser to download the content as an attachment rather than displaying it directly. The filename parameter specifies the suggested filename for the downloaded file, which is constructed using the variable $filename.
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
    
    // *step10 fpassthru($f): This function outputs the content of the memory file handle ($f) directly to the browser. It sends the CSV data stored in memory to the client's browser for download.
    fpassthru($f);

    // *step11 exist(): This function terminates the script execution immediately after sending the CSV file. It prevents any additional PHP code from being executed, ensuring that only the CSV file is sent to the user's browser.
    exit();

    // function for printing an array
    function arrayP($arr = array()){
        echo "<pre>" ;
        print_r($arr);
        echo "</pre>" ;
    }
?>