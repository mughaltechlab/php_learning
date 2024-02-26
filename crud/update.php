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
                $_SESSION['update'] = "$id update successfully";
                header("location: ./index.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      :root {
        --grd1: rgba(0, 0, 0, 0.4);
        --grd2: rgba(0, 255, 255, 0.267);
      }
      body {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 10px;
        font-size: 22px;
        background: linear-gradient(110deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 300%);
        font-family: arial;
      }
      body::after{
        content: 0;
      }
      input {
        width: 60%;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
        /* box-shadow: 0 0 5px 0 purple; */
      }
      .text-area {
        width: 60%;
        height: fit-content;
        padding: 10px;
        border-radius: 10px;
        background-color: #f3f1ff;
        border: none;
      }
      .form-div {
        display: flex;
        flex-direction: column;
        /* background-color: white; */
        /* background: rgba(0, 212, 255, .4); */
        background: rgba(200,200,200, .3);
        width: 450px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        padding: 10px;
        font-size: 16px;
        padding: 10px;
        /* box-shadow: 0 0 20px rgba(2, 0, 36, .4), inset 0 0 20px rgba(200, 200, 255, .3) ; */
        background: rgba(0, 0, 0, 0.4);
        box-shadow: 0 0 15px 0 rgba(200, 200, 200, .2),
                    0 0 15px 0 rgba(200, 200, 200, .2);
        color: rgb(185, 180, 180);
        transition: transform .55s ease-in-out;
      }
      .form-div:hover {
        /* background: linear-gradient(10deg,var(--grd1),var(--grd1),var(--grd2),var(--grd1),var(--grd1)); */
        transition: background .22s linear;
        animation: shade .55s ease-in-out reverse;
        animation-delay: 1s;
        animation-timing-function: linear;
      }

      @keyframes shade {
        0% {
          background: linear-gradient(10deg, var(--grd2), var(--grd1), var(--grd1), var(--grd1), var(--grd1));
        }

        25% {
          background: linear-gradient(10deg, var(--grd1), var(--grd2), var(--grd1), var(--grd1), var(--grd1));
        }

        50% {
          background: linear-gradient(10deg, var(--grd1), var(--grd1), var(--grd2), var(--grd1), var(--grd1));
        }

        75% {
          background: linear-gradient(10deg, var(--grd1), var(--grd1), var(--grd1), var(--grd2), var(--grd1));
        }

        100% {
          background: linear-gradient(10deg, var(--grd1), var(--grd1), var(--grd1), var(--grd1), var(--grd2));
        }
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
        justify-content: space-between;
        align-items: start;
      }
      .profile-row input{
        width: 40%;
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
        color: #f3f1f1;
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
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        border: 1px solid #6550ef;
        padding: 10px;
        background-color: #f3f1ff;
      }
      .img img{
        width: 100%;
        filter: contrast(1.1);
        transition: transform .22s ease-in-out;
      }
      .img img:hover{
        transform: scale(1.1);
      }
      .profile-img {
        width: 100px;
        height: 100px;
        background-image: url(<?php echo 'images/'.$row['profile_image'] ?>);
        background-size: cover;
        background-position: center;
      }
      .profile-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .update-btn-div{
        text-align: start;
      }
      .update-btn-div .btn{
        width: 100%;
        border: 1px solid var(--grd2);
        background: var(--grd2);
        height: 30px;
        box-shadow:inset 1px -1px 1px rgb(253, 253, 253);
        transition: background .35s ease-in-out;
      }
      .update-btn-div .btn:hover{
        /* background: #1e0b95; */
        border: 1px solid var(--grd2);
        box-shadow: 1px 1px 1px rgb(253, 253, 253);
        transition: background .22s linear;
        animation: shade .55s ease-in-out reverse;
        animation-timing-function: linear;
        background: var(--grd1);
      }
      @keyframes shade {
        0% {
          background: linear-gradient(10deg, var(--grd2), var(--grd1), var(--grd1), var(--grd1), var(--grd1));
        }

        25% {
          background: linear-gradient(10deg, var(--grd2), var(--grd2), var(--grd1), var(--grd1), var(--grd1));
        }

        50% {
          background: linear-gradient(10deg, var(--grd2), var(--grd2), var(--grd2), var(--grd1), var(--grd1));
        }

        75% {
          background: linear-gradient(10deg, var(--grd2), var(--grd2), var(--grd2), var(--grd2), var(--grd1));
        }

        100% {
          background: linear-gradient(10deg, var(--grd2), var(--grd2), var(--grd2), var(--grd2), var(--grd2));
        }
      }
      .header{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 450px;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <h3> Update Form </h3>
      <a href="<?php echo $_SERVER['HTTP_REFERER']?>"><i class="bi bi-x-lg"></i></a>
    </div>
    <div class="form-div">
      <div style="display: flex;  width:100%; color:#f3f1ff;">
        <h3> Id #</h3>
        <h3><?php echo "&nbsp;".$row['id'] ?></h3>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="profile-row">
          <div class="input-div" style="display:flex; flex-direction:column; gap:12px;">
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
            <img src="<?php echo 'images/'.$row['profile_image'] ?>" alt="<?php echo $row['fullname'].'\'s Profile Image' ?>">
            <!-- <div class="profile-img"></div> -->
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
        <div class="update-btn-div">
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