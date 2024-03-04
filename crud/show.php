<?php
  require("config.php");

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        color: #f3f1ff;
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
        object-fit: cover;
        padding: 10px;
        background-color: #f3f1ff;
      }
      .img img{
        /* width: 100px; */
        height: 100px;
        object-fit: cover;
        transition: transform .22s ease-in-out;
      }
      .img img:hover{
        transform: scale(1.1);
      }
      /* .profile-img {
        width: 100px;
        height: 100px;
        background-image: url();
        background-size: cover;
        background-position: center;
      } */
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
      .header{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 450px;
      }
      /* pdf download btn */
     .pdf-btn .button {
      position: relative;
      width: 150px;
      height: 40px;
      cursor: pointer;
      display: flex;
      align-items: center;
      border: 1px solid #17795E;
      background-color: #209978;
      overflow: hidden;
      }

      .pdf-btn .button, .button__icon, .button__text {
        transition: all 0.3s;
      }

      .pdf-btn .button .button__text {
        transform: translateX(22px);
        color: #fff;
        font-weight: 600;
      }

      .pdf-btn .button .button__icon {
        position: absolute;
        transform: translateX(109px);
        height: 100%;
        width: 39px;
        background-color: #17795E;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .pdf-btn .button .svg {
        width: 20px;
        fill: #fff;
      }

      .pdf-btn .button:hover {
        background: #17795E;
      }

      .pdf-btn .button:hover .button__text {
        color: transparent;
      }

      .pdf-btn .button:hover .button__icon {
        width: 148px;
        transform: translateX(0);
      }

      .pdf-btn .button:active .button__icon {
        background-color: #146c54;
      }

      .pdf-btn .button:active {
        border: 1px solid #146c54;
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
        background-image: url(<?
        // php echo 'images/'.$row['profile_image']
         ?>);
        background-size: cover;
      }
      .profile-row {
        display: flex;
        justify-content: space-between;
      }
    </style> -->
  </head>
  <body>
    <div class="header">
      <a href="./index.php"><i class="bi bi-arrow-left"></i></a>
      <h3> View <?php echo $row['fullname'].'\'s Details' ?>  </h3>
    </div>
    <div class="form-div">
      <div style="display: flex; align-items:center; justify-content: space-between; width:100%; color:#f3f1ff;">
        <div style="display: flex;  color:#f3f1ff;">
          <h3> Id #</h3>
          <h3><?php echo "&nbsp;".$row['id'] ?></h3>
        </div>
        <a href='update.php?updateId=<?php echo $id ?>'><i class="bi bi-pen"></i></a>
      </div>
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
            <img src="<?php echo 'images/'.$row['profile_image'] ?>" alt="<?php echo $row['fullname'].'\'s Profile Image' ?>">
            <!-- <div class="profile-img"></div> -->
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
      <div class="container pdf-btn">
        <!-- <form class="" action="./db/generatePdf.php?viewId=<?php $id ?>" method="get"> -->
        <a class="container pdf-btn" href="./db/generatePdf.php?viewId=<?php echo $id ?>">
          <button class="button" type="submit">
            <span class="button__text"> Download</span>
            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35" id="bdd05811-e15d-428c-bb53-8661459f9307" data-name="Layer 2" class="svg"><path d="M17.5,22.131a1.249,1.249,0,0,1-1.25-1.25V2.187a1.25,1.25,0,0,1,2.5,0V20.881A1.25,1.25,0,0,1,17.5,22.131Z"></path><path d="M17.5,22.693a3.189,3.189,0,0,1-2.262-.936L8.487,15.006a1.249,1.249,0,0,1,1.767-1.767l6.751,6.751a.7.7,0,0,0,.99,0l6.751-6.751a1.25,1.25,0,0,1,1.768,1.767l-6.752,6.751A3.191,3.191,0,0,1,17.5,22.693Z"></path><path d="M31.436,34.063H3.564A3.318,3.318,0,0,1,.25,30.749V22.011a1.25,1.25,0,0,1,2.5,0v8.738a.815.815,0,0,0,.814.814H31.436a.815.815,0,0,0,.814-.814V22.011a1.25,1.25,0,1,1,2.5,0v8.738A3.318,3.318,0,0,1,31.436,34.063Z"></path></svg></span>
          </button>
        </a>
        <!-- </form> -->
      </div>
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
