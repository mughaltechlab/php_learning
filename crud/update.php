<?php
  include("db/config.php");

  if (isset($_GET['updateId'])) {
    # code...
    $id = $_GET['updateId'];

    $result = mysqli_query($con,"SELECT * FROM employee_two WHERE id=$id");
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (isset($_POST['update'])) {
            $query = "UPDATE employee_two SET
            id=$id, 
            fullname='{$_POST['fullName']}',	
            username='{$_POST['username']}',
            email='{$_POST['email']}',
            gender='{$_POST['gender']}',
            religion='{$_POST['religion']}',
            description='{$_POST['description']}' WHERE id=$id
            ";
            $result = mysqli_query($con,$query);
            if ($result) {
                # code...
                echo "<script>
                window.alert('Update successfully');
                window.location.assign('index.php');
                </script>";
            }

            
        }
      # code...
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $row['fullname'].'\'s' ?> Details</title>
    <style>
      body {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
        font-size: 22px;
        background-color: #f3f1ff;
        font-family: arial;
      }
      input {
        width: 200px;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
        /* box-shadow: 0 0 5px 0 purple; */
      }
      .text-area {
        width: 200px;
        height: fit-content;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
      }
      .form-div {
        display: flex;
        flex-direction: column;
        background-color: white;
        width: 450px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        padding: 10px;
        font-size: 16px;
        padding: 10px;
        box-shadow: 0 0 5px 0 blue;
      }
      form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        gap: 15px;
        width: 400px;
        padding: 30px;
      }
      .btn {
        margin-top: 30px;
        padding: 5px;
        background-color: #6550ef;
        width: 100px;
        color: white;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: bold;
      }
      .email-div,
      .password-div,
      .religion-div,
      .description-div {
        display: flex;
        justify-content: space-between;
        /* flex-direction: column; */
        align-items: start;
      }
      .fullname-div,
      .username-div {
        display: flex;
        flex-direction: column;
        align-items: start;
      }
      .gender-div,
      .genders {
        display: flex;
        justify-content: space-between;
      }
      .genders {
        display: flex;
        justify-content: space-between;
      }
      .gender-inner {
        display: flex;
        width: 100px;
      }
      h3 {
        color: black;
      }
      a {
        height: 10px;
        width: 50px;
        text-decoration: none;
        color: white;
      }
      .radio {
        width: 30px;
      }
      /* religion  */
      select {
        width: 220px;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
      }
      /* file  */
      .choose-file {
        display: flex;
        flex-direction: column;
      }
      .file-upload-div {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 5px;
      }
      .file-label {
        display: flex;
        justify-content: space-between;
      }
      .file {
        width: 200px;
        padding: 10px;
        border-radius: 10px;
        border: none;
      }
      /* upload btn  */
      .fileupload {
        padding: 8px;
        background-color: lightgreen;
        width: 90px;
        /* color:; */
        border-radius: 7px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        font-size: 12px;
      }
      .img{
        border: 1px solid #6550ef;
        padding: 10px;
        background-color: #f3f1ff;
      }
      .profile-img {
        width: 100px;
        height: 100px;
        background-image: url(<?php echo 'images/'.$row['profile_image'] ?>);
        background-size: cover;
      }
      .profile-row {
        display: flex;
        justify-content: space-between;
      }
    </style>
  </head>
  <body>
    <h3>Data</h3>
    <div class="form-div">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="profile-row">
          <div class="col-6">
            <div class="fullname-div">
              <label for="">Fullname </label>
              <input type="text" name="fullName" id="name" value="<?php echo $row['fullname'] ?>" />
            </div>
            <div class="username-div">
              <label for="">Username</label>
              <input type="text" name="username" value="<?php echo $row['username'] ?>"  />
            </div>
          </div>
          <div class="img">
            <div class="profile-img"></div>
          </div>
        </div>

        <div class="email-div">
          <label for="">Email</label>
          <input type="text" name="email" value="<?php echo $row['email'] ?>" />
        </div>
        <div class="password-div">
          <label for="">Gender</label>
          <input type="text" name="gender" value="<?php echo $row['gender'] ?>" />
        </div>
        <div class="religion-div">
          <label for="">Religion</label>
          <input type="text" name="religion" value="<?php echo $row['religion'] ?>" />
        </div>
        <div class="description-div">
            <label for="">Description</label>
            <textarea class="text-area" name="description" id="" cols="" rows="6"><?php echo $row['description'] ?></textarea>
        </div>

        <!-- update button -->
        <div>
            <button value="update" name="update" class = "btn">Update</button>
        </div>
      </form>
    </div>
  <?php
    }else { die("Fetching data error"); }
    }else {
      die("Connection down");
    }
  ?>
  </body>
</html>
