<?php
  include("db/config.php");

  if (isset($_GET['viewId'])) {
    # code...
    $id = $_GET['viewId'];

    // $query = "SELECT * FROM employee_two WHERE id=$id";
    $result = mysqli_query($con,"SELECT * FROM employee_two WHERE id=$id");
    if (mysqli_num_rows($result) == 1) {
      # code...
      $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $row['fullname'].'\'s' ?> Details</title>
    <style>
      :root {
      --grd1: rgba(0, 0, 0, 0.4);
      --grd2: rgba(0, 255, 255, 0.267);
      }
      body {
        display: flex;
        flex-direction: column;
        height: 100vh;
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
        color: #6550ef;
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
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        /* overflow: hidden; */
        border: 1px solid #6550ef;
        object-fit: cover;
        padding: 10px;
        background-color: #f3f1ff;
      }
      .img img{
        width: 100px;
        object-fit: fill;
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
        border: 1px solid #6550ef;
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
    </style>
    <!-- <style>
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
    </style> -->
  </head>
  <body>
    <h3>Data</h3>
    <div class="form-div">
      <form action="process.php" method="post" enctype="multipart/form-data">
        <div class="profile-row">
          <div class="" style="display:flex; flex-direction:column; gap:12px;">
            <div class="fullname-div">
              <label for="">Fullname </label>
              <input type="text" name="name" id="name" value="<?php echo $row['fullname'] ?>" readonly/>
            </div>
            <div class="username-div">
              <label for="">Username</label>
              <input type="text" name="username" value="<?php echo $row['username'] ?>" readonly />
            </div>
          </div>
          <div class="img">
            <div class="profile-img"></div>
          </div>
        </div>

        <div class="email-div">
          <label for="">Email</label>
          <input type="text" name="email" value="<?php echo $row['email'] ?>" readonly/>
        </div>
        <div class="password-div">
          <label for="">Gender</label>
          <input type="text" name="password" value="<?php echo $row['gender'] ?>" readonly/>
        </div>
        <div class="religion-div">
          <label for="">Religion</label>
          <input type="text" name="password" value="<?php echo $row['religion'] ?>" readonly/>
        </div>
        <div class="description-div">
          <label for="">Description</label>
          <div class="text-area" name="description"><?php echo $row['description'] ?>
        </div>
        </div>

      </form>
    </div>
    <!-- print button -->
    <!-- <div>
        <button value="submit_register" name="submit" class = "btn">Print</button>
    </div> -->
  <?php
    }else { die("Fetching data error"); }
    }else {
      die("Connection down");
    }
  ?>
  </body>
</html>
