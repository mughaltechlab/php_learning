<?php
//   require("config.php");
//   if (isset($_GET['viewId'])) {
//     # code...
//     $id = $_GET['viewId'];

//     // $query = "SELECT * FROM employee_two WHERE id=$id";
//     $result = mysqli_query($con,"SELECT * FROM employee_two WHERE id=$id");
//     if (mysqli_num_rows($result) == 1) {
//       # code...
//       $row = mysqli_fetch_assoc($result);
// ------------------------------------
    // }else { die("Fetching data error"); }
    // }else {
    //   die("Connection down");
    // }
  ?>
<?php
    require("../config.php");
    //* Step 1 Include autoloader 
    require_once 'dompdf/autoload.inc.php';
    //* Step 2 Reference the Dompdf namespace 
    use Dompdf\Dompdf;
    //* Step 3 Instantiate and use the dompdf class 
    // $dompdf = new Dompdf([
    //     "chroot" => __DIR__
    // ]);

    // //* Step 4 Load HTML content
    // $dompdf->loadHtml('<h1>LoneWolf</h1>');

    // //* Step 5 (Optional) Setup the paper size and orientation 
    // $dompdf->setPaper('A4', 'landscape'); 

    // //* Step 6 Render the HTML as PDF 
    // $dompdf->render();

    // //* Step 7 Output the generated PDF to Browser 
    // $dompdf->stream();

    
    //todo: Advanced Usage from step 4
    // With the Dompdf library, you can easily enhance the functionality of PDF creation. The following code generates PDF from an HTML file (pdf-content.html).
    // Get content from HTML file using the file_get_contents() function in PHP.
    // Load HTML content using loadHtml() method of Dompdf class.
    // Control the PDF output using the stream() function of Dompdf class.
    //* $filename – (string) Name of the PDF file.
    //* $options – (array) Header options.
    //* Attachment – 1=download and 0=preview
    define("DOMPDF_ENABLE_REMOTE", false);
    if (isset($_GET['viewId'])) {
        # code...
        $id = $_GET['viewId'];
    
        // $query = "SELECT * FROM employee_two WHERE id=$id";
        $result = mysqli_query($con,"SELECT * FROM employee_two WHERE id=$id");
        if (mysqli_num_rows($result) == 1) {
          # code...
          $row = mysqli_fetch_assoc($result);
          //* Step 4 Load content from html file 
          //   $html = " <div class='header'><h3> {$row['fullname']}'s Detail </h3></div>";
            //  $html = "
            //         <table style='border:1px solid; font-size:30px;'>
            //             <tr>
            //                 <td>Full Name</td>
            //                 <td>{$row['fullname']}</td>
            //             </tr>
            //             <tr>
            //                 <td>Username</td>
            //                 <td>{$row['username']}</td>
            //             </tr>
            //             <tr>
            //                 <td>Email</td>
            //                 <td>{$row['email']}</td>
            //             </tr>
            //             <tr>
            //                 <td>Gender</td>
            //                 <td>{$row['gender']}</td>
            //             </tr>
            //             <tr>
            //                 <td>Religion</td>
            //                 <td>{$row['religion']}</td>
            //             </tr>
            //             <tr>
            //                 <td>Description</td>
            //                 <td>{$row['description']}</td>
            //             </tr>
            //         </table>
            //     ";
            
            // echo $image;
        
        $html = file_get_contents('./pdf_form.html');
        $html = str_replace('{{id}}', $row['id'],$html);
        $html = str_replace('{{image}}', "../images/{$row['profile_image']}",$html);
        $html = str_replace('{{fullname}}', $row['fullname'],$html);
        $html = str_replace('{{username}}', $row['username'],$html);
        $html = str_replace('{{email}}', $row['email'],$html);
        $html = str_replace('{{gender}}', $row['gender'],$html);
        $html = str_replace('{{religion}}', $row['religion'],$html);
        $html = str_replace('{{description}}', $row['description'],$html);
        

        $dompdf = new Dompdf([
            "chroot" =>  $_SERVER["DOCUMENT_ROOT"]
        ]);
        $dompdf->loadHtml($html); 

        //* Step 5 (Optional) Setup the paper size and orientation 
        $dompdf->setPaper('A4', 'landscape'); 

        //* Step 6 Render the HTML as PDF 
        $dompdf->render(); 

        //* Step 7 Output the generated PDF (1 = download and 0 = preview) 
        $dompdf->stream($row['username'], array("Attachment" => 0));

    }
}

?>